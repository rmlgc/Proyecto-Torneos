<?php

namespace App\Http\Controllers;

use App\ZonaEvento;
use App\Venues;
use Illuminate\Http\Request;

class ZonaEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/zonaEvento/index');
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

        $nameExist = Venues::chkName($request->name)->first();

        if ($nameExist) {
            $Error ="El nombre ya existe";
            return redirect('add-zona')
                ->withErrors($Error)
                ->withInput();
        }

        $zona = new Venues;

        $zona->venue_name = $request->name;
        $zona->address = $request->direction;
        $zona->details = $request->description;
        $zona->latitude = $request->latitude;
        $zona->longitude = $request->longitude;

        $zona->save();

        $data['message'] = 'Zona '.$request->name.' creada';
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
     * @param  \App\ZonaEvento  $zonaEvento
     * @return \Illuminate\Http\Response
     */
    public function show(ZonaEvento $zonaEvento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ZonaEvento  $zonaEvento
     * @return \Illuminate\Http\Response
     */
    public function edit(ZonaEvento $zonaEvento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ZonaEvento  $zonaEvento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZonaEvento $zonaEvento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ZonaEvento  $zonaEvento
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZonaEvento $zonaEvento)
    {
        //
    }
}
