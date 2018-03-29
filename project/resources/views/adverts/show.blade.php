@extends ('layout')

@section('content')

    <div class="container">
        <div class="row  mt-4">
        @auth
            @if( Auth::user()->id == $advert->user_id )
                <div class="col-lg-1">
                    <a href="{{ action('AdvertsController@edit', $advert->id) }}" class="btn btn-primary">Edit</a>
                </div>
                <div class="col-lg-1">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>
                    <form id="delete-form" action="{{action('AdvertsController@destroy', $advert->id)}}" method="POST" style="display: none;">
                        @method('delete')
                        @csrf
                    </form>
                </div>
            @endif
        @endauth
    </div>
        <div class="row  mt-4">
            <div class="col-lg-4">
                <h5>{{  ucfirst($advert->title) }}</h5>
            </div>
        </div>
        <div class="row  mt-4">
            <div class="col-lg-12">
                <span>{{ $advert->description }}</span>
            </div>
        </div>
        <div class="row  mt-4">
            <div class="col-lg-4">
                <span>{{  ucfirst($advert->user()->first()->name) }}</span>
            </div>
        </div>
        <div class="row  mt-4">
            <div class="col-lg-4">
                <span>{{  $advert->created_at }}</span>
            </div>
        </div>
    </div>

@endsection