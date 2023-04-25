<?php

require_once 'Task.php';
require_once 'index.php';


class TaskController
{

    public function create()
    {
        include('views/tasks/create.html');
    }

    /**
     * @return void
     */
    public function store()
    {
        if (empty($_POST['name']) || empty($_POST['task'])) {
            header('Location: list-tasks');
            exit;
        } else {
            $title = $_POST['name'];
            $task = $_POST['task'];

            $tasks = new Task();

            $tasks->insertData($title, $task);

            header('Location: list-tasks');
        }
    }

    public function index()
    {
        $tasks =  new Task();
        $allTasks = $tasks->getData('tasks');
        include('views/tasks/index.html');
    }

    public function edit()
    {
        $id = $_POST['id'];
        $tasks = new Task();
        $task = $tasks->getTaskById($id);

       // var_dump($task);

        include('views/tasks/edit.html');
    }

    public function update()
    {

        $title = $_POST['name'];
        $task = $_POST['task'];
        $id = $_POST['id'];

        $tasks = new Task();

        $tasks->updateData($title, $task, $id);

        header('Location: list-tasks');
    }

    public function delete()
    {
        $id = $_POST['id'];

        $tasks = new Task();

        $tasks->deleteData($id);

        header('Location: list-tasks');
    }

}





