<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($page > 1) { ?>
        <li class="page-item"><a class="page-link" href="<?= \yii\helpers\Url::toRoute([
            'site/currencies',
            'page' => $page - 1
        ]) ?>">Previous</a></li>
        <?php } ?>
        <?php
        $paginator = \app\service\Paginator::paginate($page, $perPage, $count);
        for ($i = 0; $i < count($paginator); ++$i) {
            $pages = $paginator[$i];
        ?>
            <?php foreach ($pages as $pageItem) { ?>
                <?php if ($pageItem === $page) { ?>
        <li class="page-item active" aria-current="page">
            <a class="page-link"><?= $pageItem ?><span class="sr-only">(current)</span></a>
        </li>
                <?php } else { ?>
        <li class="page-item"><a class="page-link" href="<?= \yii\helpers\Url::toRoute([
            'site/currencies',
            'page' => $pageItem
        ]) ?>"><?= $pageItem ?></a></li>
                <?php } ?>
            <?php } ?>
                <?php if ($i < count($paginator) - 1) { ?>
                    <li class="page-item"><a class="page-link">...</a></li>
                <?php } ?>
        <?php } ?>
        <?php if ($page < $pagesCount) { ?>
        <li class="page-item"><a class="page-link" href="<?= \yii\helpers\Url::toRoute([
            'site/currencies',
            'page' => $page + 1
        ]) ?>">Next</a></li>
        <?php } ?>
    </ul>
</nav>
