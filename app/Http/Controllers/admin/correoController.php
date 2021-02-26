<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Correo;
use App\Servicio;


class correoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicios = Servicio::all();
        $correos = Correo::join('tb_servicio','servicio_id','=','correo_servicio_id')
        ->join('users','id','=','correo_creador_id')->get();
        
        return view('admin.correo.index',compact('servicios','correos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $correo = new Correo();
        $correo->correo_creador_id = auth()->user()->id;
        $correo->correo_servicio_id = $request['Service'];
        $correo->correo_correo = $request['Correo'];
        $correo->correo_password = $request['Password'];
        $correo->perfil = $request['Perfiles'];
        $correo->fecha_finaliza = $request['fechaFin'];
        $correo->save();

        return redirect('admin/Correo');
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
    public function update(Request $request)
    {
        //
        
        Correo::where('correo_id',$request['IdentCorreo'])->update([
            'correo_servicio_id' => $request['ServiceA'],
            'correo_correo' => $request['CorreoA'],
            'correo_password' => $request['PasswordA'],
            'perfil' => $request['PerfilesA'],
            'fecha_finaliza' => $request['fechaFinA'],
        ]);

        return redirect('admin/Correo');
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
        Correo::where('correo_id',$id)->delete();
        return redirect('admin/Correo');
    }
}
