<?php

$session = Yii::$app->session;

foreach (['success', 'error', 'warning', 'info'] as $type):

    if ($session->hasFlash($type)):
?>

    <div class="flash-message alert alert-<?= $type ?> alert-dismissible fade show"
         role="alert">

        <?= htmlspecialchars(
            $session->getFlash($type),
            ENT_QUOTES,
            'UTF-8'
        ) ?>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
        </button>
    </div>

<?php
    endif;

endforeach;
?>

<script>
    setTimeout(function () {
        document.querySelectorAll('.flash-message').forEach(function (message) {
            message.classList.remove('show');

            setTimeout(function () {
                message.remove();
            }, 150);
        });
    }, 1000);
</script>

<style>
    .flash-message {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    min-width: 300px;
    max-width: 400px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}
</style>