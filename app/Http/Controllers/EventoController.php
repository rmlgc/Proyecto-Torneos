<?php

namespace App\Http\Controllers;

use App\Venues;
use App\Tournaments;
use App\TypeCategory;
use App\TematicaCategory;
use App\PatronesCategory;
use App\Events;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $zonas = Venues::all();
        $torneos = Tournaments::all();
        $tematicaCategory = TematicaCategory::all();
        $patronesCategory = PatronesCategory::all();

        return view('admin/evento/index')
        ->withZonas($zonas)
        ->withTorneos($torneos)
        ->withTematicaCategory($tematicaCategory)
        ->withPatronesCategory($patronesCategory);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //

        if ($request->submit =="add") {

            return redirect('admin');
        }
        if($request->submit =="createZona"){
            $this->createZona($request);
        }



        $nameExist = Events::chkName($request->name)->first();

        if ($nameExist) {
            $Error ="El Torneo ya existe";
            return redirect('add-torneo')
                ->withErrors($Error)
                ->withInput();
        }

        $idTorneo = Tournaments::where('name', $request->torneo)->first();
        $idZona = Venues::where('venue_name', $request->zona)->first();

        $evento = new Events;

        $evento->id_creator = $request->user()->id;
        $evento->name = $request->nameEvento;
        $evento->slug = str_slug($request->nameEvento);


        $evento->dateIni = date($request->date);

        $evento->promoter = $request->sponsor;
        $evento->host_organization = $request->host;
        $evento->venue_id = $idZona->id;
        $evento->id_tournament = $idTorneo->id;


        $evento->save();

        $data['message'] = 'Evento '.$request->nameEvento.' creado';
        return redirect('admin')
            ->with($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createZona(request $request)
    {

        $zona = new Venues;

        $zona->venue_name = $request->zona;
        $zona->address = $request->direction;
        $zona->details = $request->description;
        $zona->latitude = $request->latitude;
        $zona->longitude = $request->longitude;


        $zona->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
