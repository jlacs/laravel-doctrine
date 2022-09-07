<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('task', [TaskController::class, 'index']);
Route::get('add', [TaskController::class, 'add']);
Route::post('create', [TaskController::class, 'postAdd']);
Route::get('toggle/{id}', [TaskController::class, 'getToggle']);
Route::get('delete/{id}', [TaskController::class, 'getDelete']);

Route::get('test-add', function (\Doctrine\ORM\EntityManagerInterface $em) {
    $task = new \App\Entities\Task('Make test app', 'Create the test application for the Sitepoint article.');

    $em->persist($task);
    $em->flush();

    return 'added!';
});

Route::get('test-find', function (\Doctrine\ORM\EntityManagerInterface $em) {
    /* @var \App\Entities\Task $task */
    $task = $em->find(App\Entities\Task::class, 1);

    return $task->getName() . ' - ' . $task->getDescription();
});