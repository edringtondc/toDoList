@extends('layouts.main')

@section('title', 'Create Task')

@section('content')

    <div class="row">
        <col-sm-12>
            <h1>Create Task</h1>

            @component('component.taskForm')
            @endcomponent

            
        </col-sm-12>
    </div>

@endsection