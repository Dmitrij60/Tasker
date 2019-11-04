<?php

class SiteController
{
    /**
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        $sort = 'id';
       // self::checkAdmin();
        $taskList = array();
        if (isset($_POST['submit'])) {
            $sort = $_POST['sort'];
        }
        $taskList = Task::getTaskListForPagination($page, $sort);
        $total = Task::getTotalTasks();
        $pagination = new Pagination($total,  $page, 3,'page-');
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}