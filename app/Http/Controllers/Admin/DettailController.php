<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('admin.dettail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PersonRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request, Person $person)
    {
        //dd($request->validated());
        //Richiesta e validazione dati
        $data = $request->validated();

        $date_of_birth = $request->date_of_birth;
        $date_of_birth = Carbon::createFromFormat('Y-m-d', $date_of_birth)->format('d/m/Y');
        $data['date_of_birth'] = $date_of_birth;

        // Salvataggio i dati nel db
        Person::create($data);

        // try {
        // } catch (Exception $e) {
        //     //...and do whatever you want 
        //     return response()->view('errors.page_23000');
        // }

        // Reindirizzamento
        return redirect()->route('admin.person.index')->with('message', 'Nuovo profilo user creato con successo');
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
