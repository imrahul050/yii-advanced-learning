<?php

use yii\helpers\Url;

/** @var yii\data\Pagination $pagination */
?>

<?php if ($pagination->pageCount > 1): ?>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 border-top">

    <span class="small text-muted">
        Showing
        <?= $pagination->offset + 1 ?>
        -
        <?= min(
            $pagination->offset + $pagination->limit,
            $pagination->totalCount
        ) ?>
        of <?= $pagination->totalCount ?> records
    </span>

    <ul class="pagination pagination-sm mb-0">

        <!-- Previous -->
        <li class="page-item <?= $pagination->getPage() == 0 ? 'disabled' : '' ?>">

            <a class="page-link"
               href="<?= $pagination->getPage() > 0
                   ? $pagination->createUrl($pagination->getPage() - 1)
                   : '#' ?>">
                Previous
            </a>

        </li>


        <!-- Page numbers -->
        <?php for ($page = 0; $page < $pagination->pageCount; $page++): ?>

            <li class="page-item <?= $pagination->getPage() == $page ? 'active' : '' ?>">

                <a class="page-link"
                   href="<?= $pagination->createUrl($page) ?>">
                    <?= $page + 1 ?>
                </a>

            </li>

        <?php endfor; ?>


        <!-- Next -->
        <li class="page-item <?= $pagination->getPage() >= $pagination->pageCount - 1 ? 'disabled' : '' ?>">

            <a class="page-link"
               href="<?= $pagination->getPage() < $pagination->pageCount - 1
                   ? $pagination->createUrl($pagination->getPage() + 1)
                   : '#' ?>">
                Next
            </a>

        </li>

    </ul>

</div>

<?php endif; ?>