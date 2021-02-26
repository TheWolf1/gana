@extends('layout')


@section('titulo')
    Usuarios
@endsection

@section('styles')
    
@endsection

@section('contenido')


<div class="row" id="cancel-row">
      
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        
        <div class="widget-content widget-content-area br-6">
            
            <div class="d-flex">
                <h3 class="mr-3">Usuario</h3> 
                
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalCrearUsuario">Agregar nuevo usuario</button>
            </div>
            <div class="table-responsive mb-4 mt-4">
                
                <table id="ServiciosID" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cargo</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Caja</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->rol_nombre}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->telefono}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>${{$usuario->caja}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark btn-sm">Abrir</button>
                                    <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                      <a class="dropdown-item" href="#" onclick="actualizarUsuario({{$usuario->id}},'{{$usuario->rol_id}}','{{$usuario->name}}','{{$usuario->telefono}}','{{$usuario->email}}',{{$usuario->caja}})">Actualizar</a>
                                      <a class="dropdown-item" href="#" onclick="openCargar({{$usuario->id}},'{{$usuario->name}}')">Recargar</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="{{route('Usuario_eliminar',$usuario->id)}}">Eliminar</a>
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


<!-- Modal de crear usuarios -->
<div class="modal fade" id="modalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  x
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Crear_usuario') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                        <div class="col-md-6">
                            <select class="form-control" name="rol" id="rol">
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->rol_id}}">{{$rol->rol_nombre}}</option>
                                @endforeach
                            </select>

                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                        <div class="col-md-6">
                            <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
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

<!-- Modal cargar dinero -->
<div class="modal fade" id="modalCargarDinero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recargar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  x
                </button>
            </div>
            <div class="modal-body">
                <p>ID: <span id="IdentRecargar"></span></p> 
                <h4>¿Cuanto deseas recargar a <span id="nombreRecargar"></span>?</h4>
                <form id="formEnviarRecarga">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="txtCargar" id="idCargar" placeholder="Ejemplo: 20.50">
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


<!-- Modal actualizar usuario -->
<div class="modal fade" id="modalActualizarUSer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  x
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('actualizar_usuario') }}">
                    @csrf
                    <input type="text" id="IdenUser" name="IdenUser" hidden>
                    <div class="form-group row">
                        <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                        <div class="col-md-6">
                            <select class="form-control" name="rolA" id="rolA">
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->rol_id}}">{{$rol->rol_nombre}}</option>
                                @endforeach
                            </select>

                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nameA" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="nameA" type="text" class="form-control @error('nameA') is-invalid @enderror" name="nameA" value="{{ old('nameA') }}" required autocomplete="nameA" autofocus>

                            @error('nameA')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefonoA" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                        <div class="col-md-6">
                            <input id="telefonoA" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefonoA" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emailA" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                        <div class="col-md-6">
                            <input id="emailA" type="email" class="form-control @error('email') is-invalid @enderror" name="emailA" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cajaA" class="col-md-4 col-form-label text-md-right">{{ __('caja') }}</label>

                        <div class="col-md-6">
                            <input id="cajaA" type="text" class="form-control @error('caja') is-invalid @enderror" name="cajaA" value="{{ old('caja') }}" required autocomplete="caja" autofocus>

                        </div>
                    </div>
                    
                  
                
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('#ServiciosID').DataTable( {
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



    //Esta funcion es con la que se crea las recargas

    var nombreRecargar;
    var identRecarga;

    function openCargar(id, nombre){

        nombreRecargar = nombre;
        identRecarga = id;

        $("#nombreRecargar").text(nombre);
        $("#IdentRecargar").text(id)
        $("#modalCargarDinero").modal('show');
    }

    $("#formEnviarRecarga").submit((e)=>{
        e.preventDefault();
        var datos = $("#formEnviarRecarga").serialize()+"&name="+nombreRecargar+"&idrecargar="+identRecarga;
        $.ajax({
            url: "{{route('cargar_dinero')}}",
            type: "POST",
            data: datos,
            success:function(res){
                $("#modalCargarDinero").modal('hide');
                $("#ServiciosID").load(" #ServiciosID");
                
            },
            error:function(e){
                alert(e);
            }
        });
        
    });

    //Actualizar usuarios
    function actualizarUsuario(id,rol,name,telf,email,caja){
        $("#IdenUser").val(id);
        $("#rolA").val(rol);
        $("#telefonoA").val(telf);
        $("#emailA").val(email);
        $("#nameA").val(name);
        $("#cajaA").val(caja);
        $("#modalActualizarUSer").modal("show");
    }

</script>
@endsection