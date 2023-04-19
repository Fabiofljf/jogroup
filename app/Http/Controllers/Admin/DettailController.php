<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Person;
use App\Model\Dettail;

class DettailController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dettails = DB::table('dettails')
            ->join('people', 'dettails.person_id', '=', 'people.id')
            ->select('people.*', 'dettails.*')
            ->orderBy('people.surname', 'Asc')
            ->get();
        //dd($dettails);

        return view('admin.dettail.index', compact('dettails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = Person::all();

        return view('admin.dettail.create', compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Dettail $dettail)
    {
        //dd($request->validate());
        //Richiesta e validazione dati
        $val_data = $request->validate(
            [
                'person_id' => 'required',
                'school' => 'required',
                'argoment' => 'required',
                'title' => 'required',
                'year_from' => 'required',
                'year_to' => 'required',
                'vote' => 'nullable'
            ]
        );

        // Salvataggio i dati nel db
        Dettail::create($val_data);

        // try {
        // } catch (Exception $e) {
        //     //...and do whatever you want 
        //     return response()->view('errors.page_23000');
        // }

        // Reindirizzamento
        return redirect()->route('admin.dettail.index')->with('message', 'Nuovo profilo user creato con successo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('admin.dettail.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PersonRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Person $person)
    {
        //dd($request->validated());
        //Richiesta e validazione dati
        $data = $request->validated();

        // Salvataggio i dati nel db
        $person->update($data);

        // Reindirizzamento
        return redirect()->route('admin.person.index')->with('message', "Profilo user \"$person->id\" modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        // Richiesta di cancellazione
        $person->delete();

        // Reidirizzamento con messaggio di cancellazione
        return redirect()->back()->with('message', "Utente \"$person->id\" eliminato con successo");
    }
}
