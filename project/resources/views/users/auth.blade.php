@extends ('layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <h3 class="col-lg-12 mb-4 text-center">Please login</h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="/login">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input name="password" type="password" class="form-control" id="pwd" required>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-success">Login \ Register</button>
                </div>
            </form>
            @if(count($errors))
            <div class="mt-4">
                <ul class="list-unstyled">
                    @foreach($errors->all() as  $error)
                        <li class="alert alert-danger mt-2">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection