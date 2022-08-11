<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMyFirstModelRequest;
use App\Http\Requests\UpdateMyFirstModelRequest;
use App\Models\MyFirstModel;

class MyFirstModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MyFirstModel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMyFirstModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMyFirstModelRequest $request)
    {
        $model = new MyFirstModel();
        $model->name = $request['name'];
        $model->type = $request['type'];
        $model->save();
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param MyFirstModel $myFirstModel
     * @return \Illuminate\Http\Response
     */
    public function show(MyFirstModel $myFirstModel)
    {
        return MyFirstModel::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MyFirstModel $myFirstModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MyFirstModel $myFirstModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMyFirstModelRequest  $request
     * @param MyFirstModel $myFirstModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMyFirstModelRequest $request, MyFirstModel $myFirstModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MyFirstModel $myFirstModel
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy(MyFirstModel $myFirstModel)
    {
        $myFirstModel->deleteOrFail();
    }
}
