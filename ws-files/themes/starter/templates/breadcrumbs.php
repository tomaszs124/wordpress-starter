<?php

global $post;

$ancestors = get_post_ancestors($post);
?>

<div class="breadcrumbs">
    <ul class="breadcrumbs__list">
        <li class="breadcrumbs__item">
            <a class="breadcrumbs__link" href="<?= get_home_url() ?>">
                <?= __('Home', 'manybottles') ?>
            </a>
            <span class="breadcrumbs__separator">></span>
        </li>
        <?php if ($ancestors) : ?>
            <?php foreach ($ancestors as $ancestor) : ?>
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="<?= get_the_permalink($ancestor) ?>">
                        <?= get_the_title($ancestor) ?>
                    </a>
                    <span class="breadcrumbs__separator">></span>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
        <li class="breadcrumbs__item">
            <?= get_the_title($post); ?>
        </li>
    </ul>
</div>