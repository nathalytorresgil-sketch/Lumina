<!-- app/views/menu.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lumina</title>
    <link rel="stylesheet" href="../public/css/dashboard.css">
</head>

<body>
    <div class="container">
        
        <!-- ========== SIDEBAR ========== -->
        <div class="navigation">
            <ul>
                <li>
                    <a href="/ilumina/public/dashboard">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Lumina</span>
                    </a>
                </li>

                <li>
                    <a href="/ilumina/public/dashboard">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Panel Principal</span>
                    </a>
                </li>

                <li>
                    <a href="/ilumina/public/gestionUsuarios">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Gestión de usuarios</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="layers-outline"></ion-icon>
                        </span>
                        <span class="title">Gestión de productos</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Gestión de pedidos</span>
                    </a>
                </li>

                <li>
                    <a href="/ilumina/public/auth/logout">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========== MAIN ========== -->
        <div class="main">

            <!-- TopBar -->
            <div class="topbar">
                <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
                <div class="search"><label><input type="text" placeholder="Buscar..."><ion-icon name="search-outline"></ion-icon></label></div>
                <div class="user"><img src="/ilumina/public/img/customer01.jpg" alt=""></div>
            </div>

            <!-- ========== CONTENIDO DINÁMICO ========== -->
            <div class="contenido-dashboard">
                <?= $contenido ?>
            </div>

        </div>
    </div>

    <script src="/ilumina/public/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
