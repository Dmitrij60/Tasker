<?php


class TaskController
{
    public function actionCreate()
    {
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['content'] = $_POST['content'];
            $errors = false;
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }
            if (!User::checkEmail($options['email'])) {
                $errors[] = 'Неправильный email';
            }
            if ($errors == false) {
                $id = Task::createTask($options);

                echo "<br><br><br><p>Задача добавлена.</p>";
            }
        }
        require_once(ROOT . '/views/task/create.php');
        return true;
    }
}