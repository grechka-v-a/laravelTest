@extends ('layout')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <h3 class="col-lg-12 mb-4 text-center">Create new Ad</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{action('AdvertsController@store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input name="title" class="form-control" id="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="5" class="form-control" id="desc" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
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