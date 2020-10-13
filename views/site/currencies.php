<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Rate</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item) { ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->name ?></td>
            <td><?= $item->rate ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->render('paginator', [
    'page' => $page,
    'perPage' => $perPage,
    'count' => $count,
    'pagesCount' => $pagesCount
]) ?>