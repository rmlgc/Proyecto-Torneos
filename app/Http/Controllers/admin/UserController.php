<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Crypt;

use App\User;
use App\Aka;
use App\Mc;
use App\Http\Controllers\Controller;

use App\Fileentry;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role','!=','admin')->get();
        $mc=User::where('role','mc')->get();

        return view('admin.users.listar')
            ->withUsers($users)
            ->withMc($mc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth()->user()->role != "admin" && $request->named != Auth()->user()->id ){
            return back();
        }


        $mc = new Mc;

        $mc->id_user = $request->named;
        $mc->email = $request->email;
        $mc->description = $request->description;

        $mc->save();

        $aka = new Aka;

        $mc = Mc::where('id_user', $request->named)->first();

        $aka->id_mc = $mc->id;
        $aka->name = $request->name;
        $aka->selected = 1;
        $aka->save();

        return back();

    }

    /**
     * Cambia la url Id por nombre.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parseId($id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $profileMC = Mc::where('id_user', $id)
        ->with("getAka")
        ->with("getMc")
        ->first();

        if($profileMC==null){
            $user= User::find($id);
            return view('admin.users.perfil')
                ->with('user', $user)
                ->with('mc', null);
        }
            $mc=$profileMC->getMc;
            $aka=$profileMC
                ->getAka
                ->where('selected', 1)
                ->first();
            $user=$profileMC->getMc;

        return view('admin.users.perfil')
            ->with('aka', $aka)
            ->with('user', $user)
            ->with('mc', $mc);


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
    public function update(Request $request)
    {

        if(Auth()->user()->role != "admin" && $request->named != Auth()->user()->id ){
            return back();
        }

        if ($request->submit=="user") {

            $idUser = $request->named;
            $user = User::find($idUser);


            if ($request->name != null || trim($request->name) != "") {
                $user->name = $request->name;
            }
            if ($request->surname != null || trim($request->surname) != "") {
                $user->surname = $request->surname;
            }
            if ($request->file('icon') != null || trim($request->file('icon')) != "") {
                $path = $request->file('icon');

                $orrginalNameIcon = $path->getClientOriginalName();

                $nameIcon = $path->storeAs(
                    'img-up/users/'.$idUser.'/user-icon', $idUser."-".$orrginalNameIcon
                );
                $user->picture = $nameIcon;
            }

            $user->save();

            return back();

        }



        if ($request->submit=="competitor") {

            $idUser = $request->named;

            $mc = Mc::where('id_user', $idUser)
            ->with("getAka")
            ->with("getMc")
            ->first();

            $aka=$mc
                ->getAka
                ->where('selected', 1)
                ->first();

            if ($request->name != null || trim($request->name) != "") {
                $aka->name = $request->name;
            }
            if ($request->description != null || trim($request->description) != "") {
                $mc->description = $request->description;
            }
            if ($request->email != null || trim($request->email) != "") {
                $mc->email = $request->email;
            }



            $aka->save();
            $mc->save();

            return back();

        }

        if ($request->submit=="password") {


            $idUser = $request->named;

            $user = User::find($idUser);


            $pwdMsg=true;
            if ($request->login != null || trim($request->name) != "") {
                $user->email = $request->login;
            }

            if ($request->description != null || trim($request->description) != "") {
                $pwdMsg=false;
            }
            if ($request->email != null || trim($request->email) != "") {
                $pwdMsg=false;
            }

            if( $pwdMsg ){
                if($request->password===$request->repassword){
                    $user->password = bcrypt($request->password);
                }
            }


            if($request->confirm == "on"){

                $user->save();
            }


            return back();

        }

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
