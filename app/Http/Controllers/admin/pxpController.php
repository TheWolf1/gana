<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pxp;
use App\Servicio;

class pxpController extends Controller
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
        $pxps = Pxp::join('tb_servicio','servicio_id','=','pxp_servicio_id')->get();

        return view('admin.pxp.index',compact('servicios','pxps'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $pxp = new Pxp();
        $pxp->pxp_servicio_id = $request->Service;
        $pxp->pxp_perfil = $request->Dispositivos;
        $pxp->pxp_precio = $request->Precio;

        $pxp->save();

        return redirect('admin/Pxp');
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

        Pxp::where('pxp_id',$request['idenServicio'])->update([
            'pxp_servicio_id' => $request['ServiceA'],
            'pxp_perfil' => $request['DispositivosA'],
            'pxp_precio' => $request['PrecioA'],
        ]);
        return redirect('admin/Pxp');
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
        Pxp::where('pxp_id',$id)->delete();
        return redirect('admin/Pxp');
    }
}
