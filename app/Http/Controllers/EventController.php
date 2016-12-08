<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Auth;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isadmin'], ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Event::orderBy('id','desc')->paginate(10);
        return view('events.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:5',
                'description' => 'required|min:10'
            ],
            [
                'name.required' => 'Titre requis',
                'name.min' => 'Le titre doit contenir au moins 5 caractères',
                'description.required' => 'Description requise',
                'description.min' => 'La description de l\'évènement doit contenir au moins 10 caractères'
            ]);
        $event = new Event();
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        $event->fill($input)->save();
        return redirect()
            ->route('event.index')
            ->with('success', 'L\'évènement a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|min:5',
                'name' => 'required|min:10'
            ],
            [
                'name.required' => 'Titre requis',
                'name.min' => 'Le titre doit contenir au moins 5 caractères',
                'description.required' => 'La description de l\'article est requise',
                'description.min' => 'La description de l\'article doit contenir au moins 10 caractères'
            ]);
        $event = Event::findOrFail($id);
        $input = $request->input();
        $event->fill($input)->save();
        return redirect()->route('event.show', $id)
            ->with('success', 'L\'évènement a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()
            ->route('event.index')
            ->with('success', 'L\'évènement a bien été supprimé.');
    }
}