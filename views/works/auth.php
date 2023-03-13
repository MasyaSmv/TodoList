<?php
require './../views/layouts/main.php' ?>

    <header>
        <div class="container">
            <h1 class="h1 text-center">Авторизация</h1>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="/users/auth" method="post">
                        <div class="form-group">
                            <label for="login">Логин:</label>
                            <input type="text" name="login" id="login" class="form-control" placeholder="admin"
                                   required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="123"
                                   required="required">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block btn-success" name="log_in" type="submit" value="Войти">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </section>

<?php
require './../views/layouts/bottom.php' ?>