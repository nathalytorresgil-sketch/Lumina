<?php
session_start();

$conn = new mysqli("localhost", "root", "", "ilumina");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificamos si la acción es logout
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

    // Finalmente destruir la sesión
    session_destroy();

    // Redirigir al login
    header("Location: login.php?mensaje=sesion_cerrada");
    exit();
}

// Si no es logout, entonces intentamos login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        header("Location: login.php?error=1");
        exit();
    }
}

$conn->close();
?>
