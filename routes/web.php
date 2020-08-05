<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//get tasks
$router->get('/api/tasks', 'TaskController@index');
//create task
$router->post('/api/tasks', 'TaskController@create');
//update tasks
$router->put('/api/tasks/{taskId}', 'TaskController@update');
//delete task
$router->delete('/api/tasks/{taskId}','TaskController@delete');
//get a task
$router->get('/api/tasks/{taskId}', 'TaskController@detail');
