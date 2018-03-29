<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Advert;

class AdvertsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $adverts = Advert::paginate(5);

        return view('adverts.index', compact('adverts'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function create()
    {

        return view('adverts.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $user = Auth::user();

        $advert = Advert::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $user->id,
            'created_at' => new \DateTime(),
        ]);

        return redirect()->action('AdvertsController@show', [$advert]);

    }


    /**
     * Display the specified resource.
     *
     * @param Advert $advert
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Advert $advert)
    {

        return view('adverts.show', compact(['advert']));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Advert $advert
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Advert $advert)
    {

        return view('adverts.edit', compact('advert'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $advert = Advert::find($id);

        $advert->timestamps = false;
        $advert->title = $request->input('title');
        $advert->description = $request->input('description');

        $advert->save();

        return redirect()->action('AdvertsController@show', [$advert]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $advert = Advert::find($id);

        $advert->delete();

        return redirect('/');

    }
}