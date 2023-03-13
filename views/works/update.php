<?php require './../views/layouts/main.php' ?>

<header>
    <div class="container">
        <h1 class="h1 text-center">Редактирование задачи</h1>
    </div>
</header>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="/works/edit?id=<?php echo $work->id ?>" method="post">
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Название..." required="required" value="<?php echo $work->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="example@example.com" value="<?php echo $work->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Описание" value="<?php echo $work->description; ?>">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-success" type="submit" value="Update">
                    </div>
                    <div class="form-group mt-4">
                        <a class="btn btn-block btn-warning" href="/works">Вернуться</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require './../views/layouts/bottom.php' ?>