<?php
$pager->setSurroundCount(2)
?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-end mb-0">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previousPage') ?>">
                    <i class="fa fa-angle-left"></i>
                    <span aria-hidden="true" class="sr-only"><?= lang('Pager.previous') ?></span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) :  ?>
            <li class="page-item <?= $link['active'] ? 'active"' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>" <?= $link['active'] ? 'style="background-color: #1174EF;"' : '' ?>>
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.nextPage') ?>">
                    <i class="fa fa-angle-right"></i>
                    <span aria-hidden="true" class="sr-only"><?= lang('Pager.next') ?></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>