<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    {{-- Datos Usuario --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
  
        </ul>
  
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
  
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      {{-- <a class="dropdown-item" href="{{ route('profile')}}"><p>Mi Perfil</p></a>  --}}
                      <hr>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li></li>
            @endguest
        </ul>
    </div>
    <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>  -->

    <!-- <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li> --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul> -->
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(121,9,82,1) 33%, rgba(57,157,177,1) 100%) !important;">
    <!-- Brand Logo -->
    <a href="/" class="pt-3">
        <img src="/images/logo_original.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="display: block;opacity: .8;width: 64%;margin: auto;">


        {{-- <span class="brand-text font-weight-light"></span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if( Auth::user()->imagen == '')
                <img img src="images/default-person.jpg" class="img-circle elevation-2" alt="Usuario" height="250px" width="250px">
              @else
                <img src="/{{ Auth::user()->imagen }}" class="img-circle elevation-2" alt="Usuario" height="250px" width="250px"
                    style="display: block;margin: 0 auto;">
              @endif            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Escritorio</p>  
                    </a>
                </li>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>Almacen
                          <i class="right fas fa-angle-left"></i>    
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/articulos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Artículo</p>
                            </a>
                        </li>
                        @if(Auth::user()->rol == 'admin')
                        <li class="nav-item">
                            <a href="/categorias" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/subcategorias" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub-Categorias</p>
                            </a>
                        </li>
                       @endif
                    </ul>
                </li>
                
            
            <li class="nav-item has-treeview">
                <a class="nav-link" href="/favoritos">
                  <i class="fa fa-heart nav-icon" aria-hidden="true"></i>
                    <p>Favoritos 💥</p>                
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="/novedades" class="nav-link">
                  <i class="fa fa-star nav-icon" aria-hidden="true"></i>
                    <p>Novedades</p>                
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="/promociones" class="nav-link">
                  <i class="fa fa-thumbs-o-up nav-icon" aria-hidden="true"></i>
                    <p>Promociones ✨</p>                
                </a>
            </li>
            <li class="nav-item has-treeview">
                  <a class="nav-link">
                    <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
                      <p>Ventas
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="/venta" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ventas Pendientes</p>
                          </a>
                      </li>
                     
                     <li class="nav-item">
                          <a href="/getVentaConfirmada" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ventas Confirmadas</p>
                          </a>
                      </li>
                  </ul>
              </li>

              {{-- <li class="nav-item has-treeview">
                <a class="nav-link">
                  <i class="fa fa-file nav-icon" aria-hidden="true"></i>
                    <p>Facturación
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/charts/chartjs.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dosificación</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/charts/flot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Datos</p>
                        </a>
                    </li>
                   
                </ul>
            </li> --}}
            <!-- <li class="nav-item has-treeview">
              <a class="nav-link">
                <i class="fa fa-th-list nav-icon" aria-hidden="true"></i>
                  <p>Reportes</p>                
              </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="pages/charts/chartjs.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Dosificación</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/charts/flot.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Datos</p>
                      </a>
                  </li>       
                </ul> 
            </li> -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Usuarios
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    
                    <li class="nav-item">
                        <a href="/cliente_get" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/getDespacho" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Despacho</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/registerDespacho" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Registrar Despacho</p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="/registerClient" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Registrar Cliente</p>
                        </a>
                    </li>
                   <!--  <li class="nav-item">
                        <a href="/proveedor" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Provedores</p>
                        </a>
                    </li> -->
                   
                </ul>
            </li>
            {{-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-compress"></i>
                  <p>Anulación</p>  
              </a>
            </li> --}}
            <!-- <li class="nav-item has-treeview">
                <a href="/logout" class="nav-link">
                    <i class="nav-icon fas fa-door-closed"></i>
                    <p>Cerrar Sesión</p>  
                </a>
            </li> -->
        </ul>
    </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>