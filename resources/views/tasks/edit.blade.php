@extends('layouts.main')

@section('title', 'Create Task')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1>Edit Task</h1>
            {!! Form::model($task, ['route'=> ['task.update', $task->id ], 'method' => 'PUT']) !!}
            @component('component.taskForm')
            @endcomponent

            {!! Form::close() !!}
        </div>


    </div>

@endsection