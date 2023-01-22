<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id', 'desc')->paginate(4);

        $data = [
            'comics' => $comics
        ];

        // dd($data);

        return view('pages.comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //validate
        $request->validate(
            [
                'title' => 'required|max:50',
            ],
            [
                'title.required' => 'Attenzione! Il campo title è obbligatorio',
                'title.max:50' => 'Attenzione! Il campo non deve superare i 50 caratteri'
            ]
        );

        $new_record = new Comic();
        $new_record->fill($data);
        // $new_record->title = $data['title'];
        // $new_record->description = $data['description'];
        // $new_record->thumb = $data['thumb'];
        // $new_record->price = $data['price'];
        // $new_record->series = $data['series'];
        // $new_record->sale_date = $data['sale_date'];
        // $new_record->type = $data['type'];
        $new_record->save();

        return redirect()->route('comics.show', $new_record->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elem = Comic::findOrFail($id);
        // dd($singolo_elem);
        return view('pages.comics.show', compact('elem') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        return view('pages.comics.edit', compact('comic'));
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
        $data = $request->all();
        $comic = Comic::findOrFail($id);
        $comic->update($data);

        return redirect()->route('comics.show', $comic->id)->with('success', "Hai modificato con successo il fumetto:
            $comic->title");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index')->with('success', "hai cancellato con successo il fumetto: $comic->title");
    }
}
