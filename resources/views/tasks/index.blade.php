@extends('layouts.main')

@section('title', 'Tasks Home')

@section('content')

    <div class="row justify-content-center">
        <div class="row col-sm-4">
            <a href="{{route('task.create')}}" class="btn btn-clock btn-success">Create Task</a>
        </div>
    </div>
    @foreach($tasks as $task)

        <div class="row">
            <div class="col-sm-12">
               <h3> {{ $task->name }} </h3>
               <small> {{$task->created_at}}</small>
               <hr>
            <p>{{ $task->description}}</p>
            
                <h5> {{$task->due_date}} </h5>
            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-primary">edit</a>
                
      
            </div>
        </div>
    

    @endforeach

    <div class="row justify-content-center">
        <div class="col-sm-6 text-center">
            {{ $tasks->links()}}
        </div>
    </div>

@endsection