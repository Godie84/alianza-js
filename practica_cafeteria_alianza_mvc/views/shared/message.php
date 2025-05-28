<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="alert alert-<?= htmlspecialchars($type) ?> text-center" role="alert" style="max-width: 400px;">
        <?= htmlspecialchars($message) ?>
        <br>
        Serás redirigido en <span id="countdown">5</span> segundos.
    </div>
</div>

<script>
    let seconds = 5; // Tiempo de espera inicial
    const countdown = document.getElementById('countdown'); // Elemento que muestra el tiempo restante

    const interval = setInterval(() => {
        seconds--; // Resta 1 segundo
        countdown.textContent = seconds; // Actualiza el número en pantalla
        if (seconds <= 0) {
            clearInterval(interval); // Detiene el temporizador
            window.location.href = "<?= htmlspecialchars($redirectUrl) ?>"; // Redirige al usuario
        }
    }, 1000); // Cada 1000 milisegundos (1 segundo)
</script>


<?php require_once __DIR__ . '/../layout/footer.php'; ?>
