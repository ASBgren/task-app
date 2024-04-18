<?php
declare(strict_types=1);

use App\Controllers\AddTaskController;
use App\Controllers\CompletedTasksController;
use App\Controllers\CompleteTasksController;
use App\Controllers\DeleteTaskController;
use App\Controllers\DisplayEditFormController;
use App\Controllers\EditTaskController;
use App\Controllers\TaskController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    //demo code - two ways of linking urls to functionality, either via anon function or linking to a controller


    $app->get('/', TaskController::class);
    $app->post('/tasks/add', AddTaskController::class);
    $app->post('/tasks/completed/{id}', CompleteTasksController::class);
    $app->get('/completedTasks', CompletedTasksController::class);
    $app->get('/completedTasks/{id}', DeleteTaskController::class);
    $app->get('/editTask/{id}', DisplayEditFormController::class);
    $app->post('/editTask/{id}', EditTaskController::class);


};
