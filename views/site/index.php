<?php if (file_exists('./views/layouts/header.php')) include(ROOT . './views/layouts/header.php'); ?>
<main role="main" class="container">
    <br> <br> <br>
    <div class="starter-template">
        <div class="content-start-page">
            <a href="/task/create"
            <button class="btn btn-secondary my-2 my-sm-0"
                    type="submit">Добавить задачу
            </button>
            </a>
            <h2>Список задач:</h2>
            <form action="#" method="post">
                <select name="sort">
                    <option value="name">Имя</option>
                    <option value="email">Email</option>
                    <option value="status">Статус</option>
                </select>
                <input type="submit" name="submit" value="Сортировать">
            </form>
            <table class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Задача</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Изменена</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($taskList as $taskItem): ?>
                    <tr>

                        <th scope="row"><?php echo $taskItem['id']; ?></th>
                        <td><?php echo $taskItem['name']; ?></td>
                        <td><?php echo $taskItem['email']; ?></td>
                        <td><?php echo $taskItem['content']; ?></td>
                        <td><?php echo $taskItem['status']; ?></td>
                        <td><?php echo $taskItem['adm_status']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $pagination->get(); ?>
        </div>
    </div>
</main>
<?php if (file_exists('./views/layouts/footer.php')) include(ROOT . '/views/layouts/footer.php'); ?>
