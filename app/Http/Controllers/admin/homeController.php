<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pxp;
use App\Servicio;
use App\Usuario;
use App\Correo;
use App\Cliente;


class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Pxp::join('tb_servicio','servicio_id','=','pxp_servicio_id')->get();
        $clientes = Cliente::join('tb_pxp','pxp_id','=','cliente_pxp_id')
        ->join("tb_correo","correo_id","=","cliente_correo_id")
        ->join('tb_servicio','servicio_id','=', 'tb_pxp.pxp_servicio_id')->get();
       
        return view('admin.home.index',compact('productos','clientes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $precio = Pxp::select('pxp_precio')->where('pxp_id',$request['producto'])->get()->first();
        $caja = auth()->user()->caja;
        $sum = $caja - $precio->pxp_precio;
        if($sum >= 0){

            $producto = Pxp::where('pxp_id',$request['producto'])->get()->first();
            $correo = Correo::where('correo_servicio_id',$producto['pxp_servicio_id'])
            ->where('perfil','>=',$producto['pxp_perfil'])->orderBy('perfil','ASC')->get()->first();

            $sumCorreo = $correo->perfil - $producto->pxp_perfil;

            
            Correo::where('correo_id',$correo->correo_id)->update([
                'perfil' => $sumCorreo
            ]);
            //Crear nuevo cliente
            $cliente = new Cliente();
            $cliente->cliente_creador_id = Auth()->user()->id;
            $cliente->cliente_pxp_id = $request['producto'];
            $cliente->cliente_correo_id = $correo['correo_id'];
            $cliente->cliente_nombre = $request['nombre'];
            $cliente->cliente_telefono = $request['telefono'];
            $cliente->save();

            Usuario::where('id',auth()->user()->id)->update([
                'caja' => $sum
            ]);
            return response()->json($correo, 200);
        }else{
            return "no puedes comprarlo";
        }

        //return "hola mundo".$caja;
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
        Cliente::where("cliente_id",$request->identCliente)->update([
            "cliente_nombre" => $request->nombreA,
            "cliente_telefono" => $request->telefonoA
        ]);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idC, $per)
    {
        //
        $PerfilesC = Correo::where("correo_id",$idC)->get()->first();
        $sum = $PerfilesC->perfil +$per;
        Correo::where("correo_id",$idC)->update([
            'perfil'=>$sum
        ]);
        Cliente::where("cliente_id",$id)->delete();
        return redirect('/home');
    }
}
