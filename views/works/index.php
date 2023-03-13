<?php require './../views/layouts/main.php' ?>
<header class="mt-4 mb-4">
    <div class="container">
        <h1 class="h1 text-center">To Do List</h1>
        <div class="row mt-4">
            <div class="col-6">
                <a class="btn btn-block btn-info" href="/works/create">Создать задачу</a>
            </div>
            <div class="col-6">
                <a class="btn btn-block btn-warning" href="/works/auth">Авторизация</a>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div style="height: 400px;overflow: auto;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Почта</th>
                                <th>Описание</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($works as $index => $work) : ?>
                            <tr>
                                <td><?php echo $index+1; ?></td>
                                <td><?php echo $work->name; ?></td>
                                <td><?php echo $work->email; ?></td>
                                <td><?php echo $work->description ?></td>
                                <td>
                                    <a href="/works/edit?id=<?php echo $work->id; ?>" class="btn btn-success">Редактировать</a>
                                    <a href="/works/delete?id=<?php echo $work->id; ?>" class="btn btn-danger delete-work">Удалить</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require './../views/layouts/bottom.php' ?>