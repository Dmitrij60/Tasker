<?php

class Task
{
    const SHOW_BY_DEFAULT = 3;

    /**
     * Returns an array of blog items
     */
    /*public static function getTaskList($count = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name, email, content, status, adm_status FROM task '
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count);
        $taskList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['name'] = $row['name'];
            $taskList[$i]['email'] = $row['email'];
            $taskList[$i]['content'] = $row['content'];
            $taskList[$i]['status'] = $row['status'];
            $taskList[$i]['adm_status'] = $row['adm_status'];
            $i++;
        }
        return $taskList;
    }*/

    /**
     * @param int $page
     * @param string $sort
     * @return array
     */
    public static function getTaskListForPagination($page = 1, $sort = 'id')
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $task = array();
        $result = $db->query("SELECT id, name, email, content, status, adm_status FROM task "
            . "ORDER BY ".$sort
            . " LIMIT " . self::SHOW_BY_DEFAULT
            . " OFFSET " . $offset);
        $i = 0;

        while ($row = $result->fetch()) {
            $task[$i]['id'] = $row['id'];
            $task[$i]['name'] = $row['name'];
            $task[$i]['email'] = $row['email'];
            $task[$i]['content'] = $row['content'];
            $task[$i]['status'] = $row['status'];
            $task[$i]['adm_status'] = $row['adm_status'];
            $i++;
        }
        return $task;
    }


    /**
     * @param $id
     * @return mixed
     */
    public static function getTaskById($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM task WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
    }


    /**
     * @param $options
     * @return int|string
     */
    public static function createTask($options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO task '
            . '(name, email, content)'
            . 'VALUES '
            . '(:name, :email, :content)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateTaskById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE task
            SET 
                content = :content, 
                status = :status, 
                adm_status = :adm_status                    
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_STR);
        $result->bindParam(':adm_status', $options['adm_status'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getTotalTasks()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM task');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getSortTaskList($count = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name, email, content, status, adm_status FROM task '
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count);
        $taskList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['name'] = $row['name'];
            $taskList[$i]['email'] = $row['email'];
            $taskList[$i]['content'] = $row['content'];
            $taskList[$i]['status'] = $row['status'];
            $taskList[$i]['adm_status'] = $row['adm_status'];
            $i++;
        }
        return $taskList;
    }


}
