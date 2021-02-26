@extends('layout')


@section('titulo')
    Correos nuecos
@endsection

@section('styles')
    <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('contenido')


<div class="row" id="cancel-row">
      
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        
        <div class="widget-content widget-content-area br-6">
            
            <div class="d-flex">
                <h3 class="mr-3">Correos</h3> 
                
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalCrearCorreo">Agregar nuevo correo</button>
            </div>
            <div class="table-responsive mb-4 mt-4">
                
                <table id="CorreoID" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Servicio</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Periles</th>
                            <th>Fecha finaliza</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($correos as $correo)
                        <tr>
                            <td>{{$correo->servicio_nombre}}</td>
                            <td>{{$correo->correo_correo}}</td>
                            <td>{{$correo->correo_password}}</td>
                            <td>{{$correo->perfil}}</td>
                            <td>{{$correo->fecha_finaliza}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark btn-sm">Abrir</button>
                                    <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                      <a class="dropdown-item" href="#" onclick="actualizarEmail({{$correo->correo_id}}, {{$correo->servicio_id}}, '{{$correo->correo_correo}}', '{{$correo->correo_password}}', {{$correo->perfil}}, '{{$correo->fecha_finaliza}}')">Actualizar</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="{{route('eliminar_Correo',$correo->correo_id)}}">Eliminar</a>
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

<!-- Modal para crear un nuevo correo -->
<div class="modal fade" id="modalCrearCorreo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear nuevo correo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  x
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('crear_correo')}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="Service" id="Service">
                            @foreach ($servicios as $servicio)
                                <option  value="{{$servicio->servicio_id}}">{{$servicio->servicio_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" id="Correo" class="form-control" name="Correo" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <input type="text" id="Password" class="form-control" name="Password" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                        <input type="number" id="Perfiles" class="form-control" name="Perfiles" placeholder="Perfiles">
                    </div>

                    <div class="form-group">
                        <input id="fechaFin" name="fechaFin" value="2019-09-04" class="form-control flatpickr flatpickr-input" type="text" placeholder="Seleccionar fecha.." readonly="readonly">
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




<!-- Modal para actualizar un correo -->
<div class="modal fade" id="modalActualizarMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar correo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  x
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('actualizar_correo')}}" method="POST" class="form">
                    @csrf
                    <input type="text" id="IdentCorreo" name="IdentCorreo" hidden>
                    <div class="form-group">
                        <select class="form-control" name="ServiceA" id="ServiceA">
                            @foreach ($servicios as $servicio)
                                <option  value="{{$servicio->servicio_id}}">{{$servicio->servicio_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" id="CorreoA" class="form-control" name="CorreoA" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <input type="text" id="PasswordA" class="form-control" name="PasswordA" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                        <input type="number" id="PerfilesA" class="form-control" name="PerfilesA" placeholder="Perfiles">
                    </div>

                    <div class="form-group">
                        <input id="fechaFinA" name="fechaFinA" value="2019-09-04" class="form-control flatpickr flatpickr-input" type="text" placeholder="Seleccionar fecha.." readonly="readonly">
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
<script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
<script>
    $("#fechaFin").flatpickr({
        defaultDate: "today",
        locale: {
        firstDayOfWeek: 1,
        weekdays: {
          shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
          longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],         
        }, 
        months: {
          shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
          longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
      }
    });

    $("#fechaFinA").flatpickr({
        defaultDate: "today",
        locale: {
        firstDayOfWeek: 1,
        weekdays: {
          shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
          longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],         
        }, 
        months: {
          shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
          longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
      }
    });

    $('#CorreoID').DataTable( {
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


    //Actualizar producto

    function actualizarEmail(id, servicio, correo, pass, perfil, fechaF){
        $("#IdentCorreo").val(id);
        $("#ServiceA").val(servicio);
        $("#CorreoA").val(correo);
        $("#PasswordA").val(pass);
        $("#PerfilesA").val(perfil);
        $("#fechaFinA").val(fechaF);
        $("#modalActualizarMail").modal("show");

    }
</script>
@endsection