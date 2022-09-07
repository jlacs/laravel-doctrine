<?php

namespace App\Http\Controllers;

use App\Entities\Task;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;

class TaskController extends Controller
{
    public function index(EntityManagerInterface $em)
    {
        $tasks = $em->getRepository(Task::class)->findAll();

        return view('task', [
            'tasks' => $tasks
        ]);
    }

    public function add()
    {
        return view('add');
    }

    public function postAdd(Request $request, EntityManagerInterface $em)
    {
        $task = new Task(
            $request->name,
            $request->description
        );

        $em->persist($task);
        $em->flush();

        return redirect('add')->with('success_message', 'Task added successfully!');
    }

    public function getToggle(EntityManagerInterface $em, $taskId)
    {
        /* @var Task $task */
        $task = $em->getRepository(Task::class)->find($taskId);

        $task->toggleStatus();
        $newStatus = ($task->isDone()) ? 'done' : 'not done';

        $em->flush();

        return redirect('/task')->with('success_message', 'Task successfully marked as ' . $newStatus);
    }

    public function getDelete(EntityManagerInterface $em, $taskId)
    {
        $task = $em->getRepository(Task::class)->find($taskId);

        $em->remove($task);
        $em->flush();

        return redirect('/task')->with('success_message', 'Task successfully removed.');
    }
}