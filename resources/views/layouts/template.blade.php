<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMEQUI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	   <!--  Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

  </head>
  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/dashboard')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b style="font-family: Arial, Helvetica, sans-serif;">SIMEQUI</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs"> {{ Auth::user()->email }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      
                      <center><h5 style="color: #000;">{{ Auth::user()->name }}</h5></center>
                      <center><small style="color: #000;">{{ Auth::user()->rol }}</small></center>
                      <center><a href="{{url('user/profile')}}"><button class="btn btn-danger"><i class="fa fa-cog" aria-hidden="true"></i>PERFIL</button></a></center>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">CERRAR SESION</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">&nbsp;</li>

            <li>
              <a href="{{url('/dashboard')}}">
                <i class="fa fa-user"></i>
                <span>DASHBOARD</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>OPERACIÓN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('operacion/orden_servicio')}}"><i class="fa fa-circle-o"></i>ORDEN DE SERVICIO</a></li>
                <li><a href="{{url('operacion/informes')}}"><i class="fa fa-circle-o"></i>INFORMES</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                <span>FACTURACIÓN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('facturacion/cotizacion')}}"><i class="fa fa-circle-o"></i> COTIZACION</a></li>
                <li><a href="{{url('facturacion/facturacion')}}"><i class="fa fa-circle-o"></i> FACTURACION</a></li>
                <li><a href="{{url('facturacion/informes')}}"><i class="fa fa-circle-o"></i> INFORMES</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>ADMINISTRACIÓN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('administracion/empresa')}}"><i class="fa fa-circle-o"></i> EMPRESA</a></li>
                <li><a href="{{url('administracion/clientes')}}"><i class="fa fa-circle-o"></i> CLIENTES</a></li>
                <li><a href="{{url('administracion/equipos')}}"><i class="fa fa-circle-o"></i> EQUIPOS</a></li>
                <li><a href="{{url('administracion/items')}}"><i class="fa fa-circle-o"></i> ITEMS</a></li>
                <li><a href="{{url('administracion/consecutivos')}}"><i class="fa fa-circle-o"></i> CONSECUTIVOS</a></li>
              </ul>
            </li>

            @if(Auth::user()->rol == 'ADMINISTRADOR')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                <span>SEGURIDAD</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('seguridad/usuarios')}}"><i class="fa fa-circle-o"></i>USUARIOS</a></li>
                <li><a href="{{url('seguridad/roles')}}"><i class="fa fa-circle-o"></i>ROLES</a></li>
              </ul>
            </li>
            @endif
            
 <!--
            <li>
              <a href="{{url('compras/create')}}">
                <i class="fa fa-th"></i>
                <span>Compras</span>
              </a>
            </li>
            <li>
              <a href="{{url('compras/ingreso')}}">
                <i class="fa fa-server"></i>
                <span>Listado de Compras</span>
              </a>
            </li>
            <!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('compras/ingreso')}}"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href="{{url('compras/proveedor')}}"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
          
            <li>
              <a href="{{url('ventas/cliente')}}">
                <i class="fa fa-user"></i>
                <span>Clientes</span>
              </a>
            </li>
            <li>
              <a href="{{url('ventas/create')}}">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
              </a>
            </li>
            <li>
              <a href="{{url('ventas/venta')}}">
                <i class="fa fa-server"></i>
                <span>Listado de Ventas</span>
              </a>
            </li>
            <!--
            <li class="treeview">
            <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('ventas/venta')}}"><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li><a href="{{url('ventas/cliente')}}"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>
                     
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('seguridad/usuario')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>--> 
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">SIMEQUI</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                             @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 
        </div>
        <strong>Copyright &copy;  <a href=""></a>.</strong> All rights reserved.
      </footer>
      <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="{{asset('js/app.js')}}"></script>
    @yield('script')
    <script type="text/javascript">
        $('#password_last').keyup(comprobar);
        $('#cpassword').keyup(verificar);
        $('#cconfirm').keyup(verificar);
        $('#btn-np').hide();
        function verificar() {


          password = $('#cpassword').val();
          confirm = $('#cconfirm').val();

          if (password != "" & confirm != "") {

            if (password != confirm) {
              $('#cconfirmar').html('LAS CONTRASEÑAS NO COINCIDEN');
              $('#btn-np').hide();
            }else{
              $('#cconfirmar').html('');
              $('#btn-np').show();
            }
          }
        }
        

        function comprobar() {

          password_last = $('#password_last').val();
          if (password_last != "") {
            $.get("/comprobarPassword/"+password_last,function(response) {
              if (response == false) {
                $('#error_pl').html('LA CONTRASEÑA NO ES CORRECTA');
                $('#btn-np').hide();
              }else{
                $('#error_pl').html('');
                $('#btn-np').show();
              }
            });
          }

        }
      
    </script>

    
  </body>
</html>