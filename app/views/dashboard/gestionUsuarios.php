<?php ob_start(); ?>

<h1>Bienvenido al Panel</h1>
<p>Aquí puedes gestionar el sistema.</p>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../menu.php'; ?>
