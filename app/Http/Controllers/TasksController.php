<?php

namespace App\Http\Controllers;

use App\Repository\TaskRepository;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TaskRepository $taskRepository)
    {
        return $taskRepository->findAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRepository $taskRepository, Request $request)
    {
        $taskRepository->createOne($request->all());
        return response("ok");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TaskRepository $taskRepository, int $id)
    {
        return $taskRepository->findOne($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRepository $taskRepository, Request $request, int $id)
    {
        $taskRepository->updateOne($id, $request->all());
        return response("updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
