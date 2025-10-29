<?php
require_once __DIR__ . '/../../config/conexion.php';

class AuthController
{
    public function showLogin()
    {
        require __DIR__ . '/../views/home/login.php';
    }

    public function login()
    {
        session_start();
        global $conn;

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: /ilumina/public/login");
            exit;
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT id, nombre, rol, password FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();

            if (password_verify($password, $usuario['password'])) {

                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_rol'] = strtoupper($usuario['rol']);

                if ($usuario['rol'] === 'ADMINISTRADOR') {
                    header("Location: /ilumina/public/dashboard");
                    exit;
                } elseif ($usuario['rol'] === 'CLIENTE') {
                    header("Location: /ilumina/public/");
                    exit;
                } else {
                    header("Location: /ilumina/public/login?error=rol");
                    exit;
                }
            }
        }

        header("Location: /ilumina/public/login?error=1");
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /ilumina/public/login");
        exit;
    }

    public function showRegister()
    {
        require __DIR__ . '/../views/home/registro.php';
    }

    public function register()
    {
        global $conn;

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: /ilumina/public/registro");
            exit;
        }

        $nombre   = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $correo   = trim($_POST['correo']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // 1) Validar si el correo ya existe
        $sqlCheck = "SELECT id FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sqlCheck);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            header("Location: /ilumina/public/registro?error=correo");
            exit;
        }

        // 2) Insertar usuario
        $sqlInsert = "INSERT INTO usuarios (nombre, apellido, correo, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bind_param("ssss", $nombre, $apellido, $correo, $password);

        if ($stmt->execute()) {

            // AUTLOGIN
            session_start();
            $_SESSION['usuario_id']     = $conn->insert_id;
            $_SESSION['usuario_nombre'] = $nombre;
            $_SESSION['usuario_rol']    = 'CLIENTE'; // por defecto

            header("Location: /ilumina/public/");
            exit;
        } else {
            header("Location: /ilumina/public/registro?error=1");
            exit;
        }
    }

}
