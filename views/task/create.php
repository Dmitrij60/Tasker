<?php if (file_exists('./views/layouts/header.php')) include(ROOT . './views/layouts/header.php'); ?>
<main role="main" class="container">
    <br> <br> <br>
    <div class="starter-template">
        <div class="content-start-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 padding-right">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form">
                            <h2>Создать задачу</h2>
                            <form action="#" method="post">
                                <input type="text" class="form-control" placeholder="Имя"
                                       required autofocus name="name" value=""/>
                                <input type="email" class="form-control" placeholder="Email адрес"
                                       required autofocus name="email" value=""/>
                                <textarea name="content" placeholder="Задача" class="form-control" required></textarea>
                                <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block"
                                       value="Создать"/>
                            </form>
                        </div>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php if (file_exists('./views/layouts/footer.php')) include(ROOT . '/views/layouts/footer.php'); ?>
