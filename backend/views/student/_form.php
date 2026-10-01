<?php

use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Student $student
 */

$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
        'class' => 'panel needs-validation',
        'id' => 'studentForm',
    ],
    'enableClientValidation' => false,
]);
?>

<!-- =========================
     PERSONAL DETAILS
========================= -->
<div class="form-section">

    <h2>Personal details</h2>

    <p class="hint">
        Use the name exactly as it appears on official documents.
    </p>

    <div class="row g-3">

        <div class="col-md-12">

            <label class="form-label" for="first">
                Full name
            </label>

            <input id="first" type="text" name="Student[name]"
                class="form-control <?= $student->hasErrors('name') ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars($student->name ?? '', ENT_QUOTES, 'UTF-8') ?>"
                placeholder="Enter full name">

            <?php if ($student->hasErrors('name')): ?>
                <div class="invalid-feedback d-block">
                    <?= htmlspecialchars(
                        $student->getFirstError('name'),
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>
            <?php endif; ?>

        </div>

    </div>

</div>


<!-- =========================
     CONTACT DETAILS
========================= -->
<div class="form-section">

    <h2>Contact Details</h2>

    <div class="row g-3">

        <!-- EMAIL -->
        <div class="col-md-6">

            <label class="form-label" for="email">
                Email
            </label>

            <input id="email" type="email" name="Student[email]"
                class="form-control <?= $student->hasErrors('email') ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars($student->email ?? '', ENT_QUOTES, 'UTF-8') ?>"
                placeholder="name@example.com">

            <?php if ($student->hasErrors('email')): ?>
                <div class="invalid-feedback d-block">
                    <?= htmlspecialchars(
                        $student->getFirstError('email'),
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>
            <?php endif; ?>

        </div>


        <!-- PHONE -->
        <div class="col-md-6">

            <label class="form-label" for="phone">
                Phone
            </label>

            <input id="phone" type="tel" name="Student[phone]"
                class="form-control <?= $student->hasErrors('phone') ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars($student->phone ?? '', ENT_QUOTES, 'UTF-8') ?>"
                placeholder="+91 98765 43210">

            <?php if ($student->hasErrors('phone')): ?>
                <div class="invalid-feedback d-block">
                    <?= htmlspecialchars(
                        $student->getFirstError('phone'),
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>
            <?php endif; ?>

        </div>

    </div>

</div>


<!-- =========================
     PROFILE IMAGE
========================= -->
<div class="form-section">

    <h2>Profile Image</h2>

    <div class="row g-3">

        <div class="col-md-12">

            <label class="form-label" for="profile">
                Profile Image
            </label>

            <input id="profile" type="file" name="Student[imageFile]"
                class="form-control <?= $student->hasErrors('imageFile') ? 'is-invalid' : '' ?>"
                accept=".jpg,.jpeg,.png,.webp">

            <?php if ($student->hasErrors('imageFile')): ?>
                <div class="invalid-feedback d-block">
                    <?= htmlspecialchars(
                        $student->getFirstError('imageFile'),
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>
            <?php endif; ?>


            <?php if (!empty($student->profile)): ?>

                <div class="mt-2">

                    <small class="text-muted">
                        Current image:
                    </small>

                    <br>

                    <img src="<?= Yii::getAlias('@web/uploads/students/' . $student->profile) ?>" alt="Profile Image"
                        width="100" height="100" style="object-fit: cover;" class="rounded border">

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>


<!-- =========================
     FORM ACTIONS
========================= -->
<div class="form-actions">

    <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-ghost">
        Cancel
    </a>

    <button type="submit" class="btn btn-brand" id="saveBtn">
        Save student
    </button>

</div>


<?php ActiveForm::end(); ?>