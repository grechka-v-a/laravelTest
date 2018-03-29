@extends ('layout')

@section('content')

    <div class="container">
        @auth
        <div class="row">
            <div class="col-lg-10 text-right mt-4">
                <h5 class="mb-0 mt-2">Welcome: {{ ucfirst(Auth::user()->name) }}</h5>
            </div>
            <div class="col-lg-2 text-right mt-4">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default">Logout</a>
                <form id="logout-form" action="{{ action('UsersController@logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
        </div>
        @endauth
        @guest
            @include('users.auth')
        @endguest
        <div class="row mt-2 mb-5">

            @auth
                <div class="col-lg-4">
                    <a href="{{ action('AdvertsController@create') }}" class="btn btn-success">Create Ad</a>
                </div>
            @endauth

        </div>
        @if(count($adverts))
            <div class="row mb-2 border-bottom border-success">
                <div class="col-lg-2">
                    <h5>Title</h5>
                </div>
                <div class="col-lg-4">
                    <h5>Description</h5>
                </div>
                <div class="col-lg-2">
                    <h5>Author</h5>
                </div>
                <div class="col-lg-2">
                    <h5>Created at</h5>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            @foreach($adverts as $advert)

            <div class="row mb-2">
                <div class="col-lg-2 rounded-left border border-right-0 border-secondary">
                    <a href="{{ action('AdvertsController@show', $advert->id) }}">{{ $advert->title }}</a>
                </div>
                <div class="col-lg-4 border-top border-bottom border-secondary">
                    <span>{{ $advert->description }}</span>
                </div>
                <div class="col-lg-2 border-top border-bottom border-secondary">
                    <span>{{ ucfirst($advert->user()->first()->name) }}</span>
                </div>
                <div class="col-lg-2 rounded-right border border-left-0 border-secondary">
                    <span>{{ $advert->created_at }}</span>
                </div>

                @auth
                    @if( Auth::user()->id == $advert->user_id )
                        <div class="col-lg-1">
                            <a href="{{ action('AdvertsController@edit', $advert->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                        <div class="col-lg-1">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>
                            <form id="delete-form" action="{{ action('AdvertsController@destroy', $advert->id) }}" method="POST" style="display: none;">
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
            @endforeach
        @endif
        <div class="row mt-3">
            <div class="col-lg-12">
                {{ $adverts->links() }}
            </div>
        </div>

    </div>

@endsection