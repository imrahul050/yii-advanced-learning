<?php
use yii\helpers\Url;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student Manager – Template</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet"  href="<?= Yii::getAlias('@web') ?>/student_temp/style.css">

</head>
<body>


<?= $this->render('_header') ?>

<main class="container">
<?= $content ?>
</main>
<?= $this->render('_flash') ?>




<?= $this->render('_footer') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= Yii::getAlias('@web') ?>/student_temp/script.js" ></script>

</body>
</html>
