<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usuario;
use App\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles  = Rol::all();
        $usuarios = Usuario::join('tb_rol','tb_rol.rol_id','user_rol_id')->get();
        return view('admin.Usuario.index',compact('roles','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $user = new Usuario();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->telefono = $request['telefono'];
        $user->user_rol_id = $request['rol'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect('admin/Usuario');
    }

    public function cargarDinero(Request $request){

        $cajaActual = Usuario::select('caja')->where('id',$request['idrecargar'])->first();

        $sum = $cajaActual->caja + $request['txtCargar'];

        Usuario::where('id',$request['idrecargar'])->update([
            'caja'=>$sum
        ]);
        
        return "todo salio bien ".$sum;
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
        Usuario::where('id',$request['IdenUser'])->update([
            'name'=>$request['nameA'],
            'telefono'=>$request['telefonoA'],
            'caja'=>$request['cajaA'],
            'email'=>$request['emailA'],
            'user_rol_id'=>$request['rolA']
        ]);
        return redirect('admin/Usuario');
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
        Usuario::where('id',$id)->delete();
        return redirect('admin/Usuario');
    }
}
