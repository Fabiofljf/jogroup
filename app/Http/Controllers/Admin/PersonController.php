<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Model\Person;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all people - no view
        $people = DB::table('people')
            ->orderBy('people.surname', 'Asc')
            ->get();

        $currentYear = Carbon::now()->format('Y');
        //dd($currentYear);

        $birthYear = DB::table('people')
            ->select('people.date_of_birth')   
            ->get();
        //dd($birthYear);

        
        $year = [];
        foreach($birthYear as $key => $value){
            $personDate = $value->date_of_birth;
            $personDate = Carbon::createFromFormat('d/m/Y', $personDate)->format('Y');
            //dd($personDate[$key]);
            $years = $currentYear - $personDate;
            //$year = $years['key'];
            //array_push($year, $birthYear);
        }
       //dd($years);


        return view('admin.person.index', compact('people', 'years'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('admin.person.show', compact('person'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.person.create');
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
        return view('admin.person.edit', compact('person'));
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
