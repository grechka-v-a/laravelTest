<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ action('UsersController@login') }}">
            @csrf
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group mb-0">
                        <label for="name">Name:</label>
                        <input name="name" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group mb-0">
                        <label for="pwd">Password:</label>
                        <input name="password" type="password" class="form-control" id="pwd" required>
                    </div>
                </div>
                <div class="col-lg-2 d-flex align-items-end">
                    <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success">Login \ Register</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@if(count($errors))
<div class="row">
    <div class="col-lg-12">
        <div class="mt-4">
            <ul class="list-unstyled">
                @foreach($errors->all() as  $error)
                    <li class="alert alert-danger mt-2">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
