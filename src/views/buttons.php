<?php
/* @var $buttons array */
?>
<ul class="box ul-4 text-c bg-white">
    <?php foreach ($buttons as $button): ?>
        <li>
            <a href="<?= $button['url']; ?>">
                <img src="/uploads/<?= $button['image']; ?>">
            </a>
            <a class="index-menu-text" href="<?= $button['url']; ?>">
                <?= $button['title']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>