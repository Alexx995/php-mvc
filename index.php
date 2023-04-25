
<?php


require_once 'controllers/Taskcontroller.php';
require_once 'Task.php';


// Define routes
$routes = [
    'store-task' => 'TaskController@store',
    'create-task' => 'TaskController@create',
    'list-tasks' => 'TaskController@index',
    'edit-task' => 'TaskController@edit',
    'update-task' => 'TaskController@update',
    'delete-task' => 'TaskController@delete',

];

// Get requested path
$path = $_SERVER['QUERY_STRING'];
$path = rtrim($path, '/'); // Remove trailing slash
$path = strtok($path, '?'); // Remove query string

// Check if route exists for the path
if (array_key_exists($path, $routes)) {
    // Extract controller and action from the route string
    list($controller, $action) = explode('@', $routes[$path]);

    // Require controller file
    require_once 'controllers/' . $controller . '.php';

    // Instantiate controller object
    $controllerObj = new $controller();

    // Call action method
    $controllerObj->$action();
} else {
    // Handle 404 error
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
}


//
//$model =  new Task();
//
//$r = $model->getData('tasks');
//
//$taskController = new TaskController($model);
//
//$taskController->getData('tasks');


?>











