@extends('layouts.main')

@section('title', 'Tasks Home')

@section('content')

    <div class="row justify-content-center mb-3">
        <div class="col-sm-4">
            <a href="{{route('task.create')}}" class="btn btn-block btn-success">Create Task</a>
        </div>
    </div>

    @if($tasks->count() == 0)
         <p class="lead text-center">There are no tasks created</p>

    @else
         @foreach($tasks as $task)

          <div class="row">
            <div class="col-sm-12">
               <h3> {{ $task->name }} </h3>
               <small> {{$task->created_at}}</small>
               <hr>
            <p>{{ $task->description}}</p>
            
                <h5> Due Date: {{$task->due_date}} </h5>

                {!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <button type="submit" class="btn btn-sm btn-danger ">Delete</button>
                {!! Form::close() !!}
                
      
            </div>
         </div>
    

         @endforeach
    @endif

    <div class="row justify-content-center">
        <div class="col-sm-6 text-center">
            {{ $tasks->links()}}
        </div>
    </div>

@endsection