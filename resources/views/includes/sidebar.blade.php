<div class="sidebar-wrapper sidebar-theme">
            
    <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>
    
    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> GANA </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu">
                
                <a href="{{route('home')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span> Inicio</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="mail"></i>
                        <span> Correos</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> Correos libres </a>
                    </li>
                    <li>
                        <a href="{{route('Correo')}}"> Todos los correos </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                
                <a href="{{route('Pxp')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="check"></i>
                        <span>Precip x producto</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                
                <a href="{{route('servicio')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="check"></i>
                        <span>Servicio</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                
                <a href="{{route('Usuario')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="users"></i>
                        <span> Usuarios</span>
                    </div>
                </a>
            </li>


            
        </ul>
    </nav>

</div>