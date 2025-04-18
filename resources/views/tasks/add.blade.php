@extends("layouts.default")

@section('content')
<div class="d-flex align-items-center">
    <div class="container card shadow-sm" style="max-width: 500px;margin-top: 100px;margin-left: 500px;">
        <div class="fs-3 fw-bold text-center">
            Add new task
        </div>
        <form class="p-3" action="{{ route("tasks.add.post") }}" method="post">
            @csrf 
            <div class="mb-3">
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3 mt-1">
                <input type="datetime-local" class="form-control" name="deadline">
            </div>
            <div class="mb-3">
                <textarea class="form-control" rows="3" name="description"></textarea>
            </div>

            @if (session() -> has("success"))
            <div class="alert alert-success">
                {{ session() -> get("success") }}
            </div>
            @endif

            @if (session("error"))
            <div class="alert alert-danger">
                {{ session("error")}}
            </div>
            @endif

            <button class="btn btn-success rounded-pill" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection