<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEMEQUI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!--  Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome 
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Boostrap select 
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. 
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">-->
    <link rel="stylesheet" href="{{asset('css/test.css')}}">

  </head>
  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SEMEQUI</b></span>
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
                  <span class="hidden-xs"> Usuario</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      
                      <small>Diohandres Hernandez</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Cerrar</a>
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
            <li class="header"></li>

            <li>
              <a href="{{url('compras/proveedor')}}">
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
                <li><a href="{{url('almacen/articulo')}}"><i class="fa fa-circle-o"></i> Orden de Servivio</a></li>
                <li><a href="{{url('almacen/categoria')}}"><i class="fa fa-circle-o"></i> Informes</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>FACTURACIÓN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('almacen/articulo')}}"><i class="fa fa-circle-o"></i> Cotización</a></li>
                <li><a href="{{url('almacen/categoria')}}"><i class="fa fa-circle-o"></i> Facturación</a></li>
                <li><a href="{{url('almacen/categoria')}}"><i class="fa fa-circle-o"></i> Inforemes</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>ADMINISTRACIÓN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('administracion/empresa')}}"><i class="fa fa-circle-o"></i> Empresa</a></li>
                <li><a href="{{url('administracion/clientes')}}"><i class="fa fa-circle-o"></i> Clientes</a></li>
                <li><a href="{{url('administracion/equipos')}}"><i class="fa fa-circle-o"></i> Equipos</a></li>
                <li><a href="{{url('administracion/items')}}"><i class="fa fa-circle-o"></i> Items</a></li>
                <li><a href="{{url('administracion/consecutivos')}}"><i class="fa fa-circle-o"></i> Consecutivos</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>SEGURIDAD</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('almacen/articulo')}}"><i class="fa fa-circle-o"></i>Usuario</a></li>
                <li><a href="{{url('almacen/categoria')}}"><i class="fa fa-circle-o"></i>Roles</a></li>
              </ul>
            </li>
            
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
                  <h3 class="box-title">Sistema de Ventas</h3>
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

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>

    
  </body>
</html>