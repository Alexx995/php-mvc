<?php

require_once 'controllers/TaskController.php';

require_once 'index.php';

require_once('konektor.php');
$konekcija=(new mysqlconnector())->connectToMysql();

class Task extends mysqlconnector
{
    public function getData($table){
        $sql = "SELECT * FROM $table";
        $result = $this->connectToMysql()->query($sql);
        $arr = [];
        while($row=$result->fetch_assoc()){
            $arr[] = $row;
        }
        return $arr;
    }

    public function insertData($title, $task)
    {
        $sql = "INSERT INTO tasks (name, task) VALUES ('$title', '$task')";
        return $this->connectToMysql()->query($sql);
    }

    public function updateData($title, $task, $id)
    {
        $sql = "UPDATE tasks SET name='$title', task='$task' WHERE id='$id'";
        return $this->connectToMysql()->query($sql);

    }

    public function getTaskById($id) {
        $sql = "SELECT * FROM tasks WHERE id='$id'";
        $result = $this->connectToMysql()->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }
    public function deleteData($id)
    {
        $sql = "DELETE FROM tasks WHERE id='$id'";
        return $this->connectToMysql()->query($sql);
    }

}

//$obj = new Task();
//
//$r = $obj->getData('tasks');
//
//print_r($r);



