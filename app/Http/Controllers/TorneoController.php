<?php

namespace App\Http\Controllers;

use App\tournamentLevel;
use App\Tournaments;
use App\Events;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level  = tournamentLevel::all();
        return view('admin/torneo/index')
            ->withLevel($level);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        if ($request->submit) {
            return redirect('admin');
        }

        $nameExist = Tournaments::chkName($request->name)->first();

        if ($nameExist) {
            $Error ="El Torneo ya existe";
            return redirect('add-torneo')
                ->withErrors($Error)
                ->withInput();
        }

        $torneo = new Tournaments;

        $torneo->id_creator = $request->user()->id;
        $torneo->name = $request->name;
        $torneo->slug = str_slug($request->name);

        $date = explode(' - ', $request->date);
        $torneo->dateIni = date("Y-m-d", strtotime($date[0]));
        $torneo->dateFin = date("Y-m-d", strtotime($date[1]));

        $torneo->promoter = $request->sponsor;
        $torneo->host_organization = $request->host;

        $torneo->type= "open";
        if ($request->type == "private") {
            $torneo->type= "invitation";
        }

        $torneo->save();

        $data['message'] = 'Torneo '.$request->name.' creado';
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $torneo = Tournaments::where('slug',$slug)->first();
        if($torneo==null){
            $Error ="El Torneo No existe";
            return redirect('admin')
                ->withErrors($Error)
                ->withInput();
        }

        $eventos = Events::where('id_tournament',$torneo->id)->get();
        return view('admin/evento/listar')
        ->withEventos($eventos);

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
    public function destroy(request $request, $slug)
    {
        //

        if($request->user()->role != "admin"){

            $Error ="No tienes permiso para esto";
            return redirect('add-torneo')
                ->withErrors($Error)
                ->withInput();
        }

        Tournaments::where('slug', $slug)->delete();

        return redirect('/admin');
    }
}
