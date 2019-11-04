<?php

class AdminController extends AdminBase
{
    /**
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        $sort = 'id';
        self::checkAdmin();
        $taskList = array();
        if (isset($_POST['submit'])) {
            $sort = $_POST['sort'];
        }
        $taskList = Task::getTaskListForPagination($page, $sort);
        $total = Task::getTotalTasks();
        $pagination = new Pagination($total,  $page, 3,'page-');
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $task = Task::getTaskById($id);
        if (isset($_POST['submit'])) {
            $options['content'] = $_POST['content'];
            if (isset($_POST['status'])) {
                $options['status'] = 'Задача выполнена';
            } else {
                $options['status'] = $task['status'];
            }
            if($task['content'] === $options['content']){
                $options['adm_status'] = $task['adm_status'];
            }else {
                $options['adm_status'] = $_POST['adm_status'];
            }
            if (Task::updateTaskById($id, $options)) {
                header("Location: /admin/task/page-1");
            }
        }
        require_once(ROOT . '/views/admin/update.php');
        return true;
    }
}