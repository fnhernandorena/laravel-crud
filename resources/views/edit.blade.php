@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Edit task</h2>
        </div>
        <div>
            <a href="{{route('tasks.index')}}" class="btn btn-primary">Go back</a>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>An error has ben ocurred!</strong> <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  

    <form action="{{route('tasks.update', $task)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Task:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Tarea" value="{{$task->title}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción...">{{$task->description}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Due date:</strong>
                    <input type="date" name="due_date" class="form-control" id=""  value={{$task->due_date}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>State:</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Select the state --</option>
                        <option value="Pending" @selected("Pending"==$task->status)>Pending</option>
                        <option value="In progress" @selected("In progress"==$task->status)>In progress</option>
                        <option value="Completed" @selected("Completed"==$task->status)>Completed</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
</div>
@endsection