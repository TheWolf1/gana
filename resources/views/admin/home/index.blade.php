@extends('layout')


@section('titulo')
 Inicio
@endsection

@section('styles')
    
@endsection

@section('contenido')


<div class="row" id="cancel-row">
      
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        
        <div class="widget-content widget-content-area br-6">
            
            <div class="d-flex">
                <h3 class="mr-3">Usuarios no pagos</h3> 
                
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalCrearUsuarios">Agregar nuevo usuario</button>
            </div>
            <div class="table-responsive mb-4 mt-4">
                
                <table id="UsuariosNoPagos" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Servicio</th>
                            <th>Correo</th>
                            <th>Fecha finaliza</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->cliente_nombre}}</td>
                                <td>{{$cliente->cliente_telefono}}</td>
                                <td>{{$cliente->servicio_nombre}} {{$cliente->pxp_perfil}} disp x ${{$cliente->pxp_precio}}</td>
                                <td>{{$cliente->correo_correo}}</td>
                                <td>{{$cliente->fecha_finaliza}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark btn-sm">Abrir</button>
                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                          <a class="dropdown-item" href="#">Pagar</a>
                                          <a class="dropdown-item" href="#">Actualizar</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="{{route('eliminar_Usuario',['idU'=>$cliente->cliente_id,'idC'=>$cliente->correo_id,'per'=>$cliente->pxp_perfil])}}">Eliminar</a>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                        @endforeach  

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="modalCrearUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear nuevo cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  x
                </button>
            </div>
            <div class="modal-body">
                <form id="formCreateUser" class="form">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" id="producto" name="producto">
                            @foreach ($productos as $producto)
                                <option value="{{$producto->pxp_id}}">{{$producto->servicio_nombre}} {{$producto->pxp_perfil}} dispositivos por ${{$producto->pxp_precio}}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                    </div>

                    <div class="form-group">
                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
            </div>
        </div>
    </div>
</div>





@endsection

@section('script')
<script>
    $('#UsuariosNoPagos').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn' },
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7 
    } );


    $("#formCreateUser").submit((e)=>{
        e.preventDefault();
        let datos = $("#formCreateUser").serialize();
        $.ajax({
            type:"post",
            url:"{{route('Crear_Usuario')}}",
            data: datos,
            success:function(res){
                $("#UsuariosNoPagos").load(" #UsuariosNoPagos");
                $("#modalCrearUsuarios").modal("hide");
                console.log(res);
                
            },
            error:function(e){
                console.log(e);
            }
        });
    });
</script>
@endsection