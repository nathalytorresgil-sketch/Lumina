document.getElementById('formRegistro').addEventListener('submit', function(e) {
    const nombre    = document.getElementById('nombre').value.trim();
    const apellido  = document.getElementById('apellido').value.trim();
    const correo    = document.getElementById('correo').value.trim();
    const password  = document.getElementById('password').value.trim();
    const password2 = document.getElementById('password2').value.trim();
    const msgError  = document.getElementById('msgError');

    msgError.innerHTML = ""; // limpiar mensajes

    // Validar campos vacíos
    if (!nombre || !apellido || !correo || !password || !password2) {
        e.preventDefault();
        msgError.textContent = "Todos los campos son obligatorios.";
        return;
    }

    // Validar correo
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regexCorreo.test(correo)) {
        e.preventDefault();
        msgError.textContent = "Ingresa un correo válido (ejemplo@correo.com).";
        return;
    }

    // Validar password longitud
    if (password.length < 8) {
        e.preventDefault();
        msgError.textContent = "La contraseña debe tener mínimo 8 caracteres.";
        return;
    }

    // Validar confirmación
    if (password !== password2) {
        e.preventDefault();
        msgError.textContent = "Las contraseñas no coinciden.";
        return;
    }
});
