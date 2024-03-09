@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Laravel and PHP app</h2>
        </div>
        <div>
            <a href="{{route('tasks.create')}}" class="btn btn-primary">Create Task</a>
        </div>
    </div>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
        <p>{{Session::get('success')}}</p>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Task</th>
                <th>Description</th>
                <th>Date</th>
                <th>State</th>
                <th>Accion</th>
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td class="fw-bold">{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                {{$task->due_date}}
                </td>
                <td>
                    @if ($task->status === 'Pending')
                    <span class="badge bg-danger fs-6">{{$task->status}}</span>
                    @elseif ($task->status === 'In progress')
                    <span class="badge bg-warning fs-6">{{$task->status}}</span>
                    @else
                    <span class="badge bg-success fs-6">{{$task->status}}</span>
                    @endif
                </td>
                <td>
                    <a href="tasks/{{$task->id}}/edit" class="btn btn-warning">Edit</a>

                    <form action="{{route('tasks.destroy', $task)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </table>
        {{$tasks->links()}}
    </div>
</div>
@endsection