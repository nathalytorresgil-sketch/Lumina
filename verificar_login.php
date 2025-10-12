<?php
session_start();

$conn = new mysqli("localhost", "root", "", "ilumina");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// ==================== LOGOUT ====================
if (isset($_GET['logout'])) {
    // Destruir todas las variables de sesión
    $_SESSION = array();

    // Eliminar cookie de sesión si existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destruir sesión y redirigir
    session_destroy();
    header("Location: login.php?mensaje=sesion_cerrada");
    exit();
}

// ==================== LOGIN ====================
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        if (password_verify($password, $usuario['password'])) {
            // Guardar datos en la sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_rol'] = strtoupper($usuario['rol']); // por si está en minúsculas

            // Redirigir según el rol
            if ($usuario['rol'] === 'ADMINISTRADOR') {
                header("Location: dashboard.php");
                exit();
            } elseif ($usuario['rol'] === 'CLIENTE') {
                header("Location: index.php");
                exit();
            } else {
                // Rol desconocido
                header("Location: login.php?error=rol_no_valido");
                exit();
            }
        } else {
            header("Location: login.php?error=1"); // Contraseña incorrecta
            exit();
        }
    } else {
        header("Location: login.php?error=1"); // Usuario no encontrado
        exit();
    }
}

$conn->close();
?>
