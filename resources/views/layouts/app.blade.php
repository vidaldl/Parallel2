<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Parallel Cloud</title>

  <!-- Custom fonts for this template-->

  <!-- <link href="{{ asset('css/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> -->
  <link href="{{ asset('lib/fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset('lib/realCSS/css/font-icons.css') }}" type="text/css" />
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
  @yield('css')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @auth
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Parallel <sup>Dashboard</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('menu.index')}}">
          <i class="fas fa-fw fa-compass"></i>
          <span>Editar Menu</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('files')}}">
          <i class="fad fa-fw fa-file-upload"></i>
          <span>Archivos</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Contenido
      </div>
      <!-- <li class="nav-item active ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Artículos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Editar Artículos</h6>
            <a class="collapse-item" href="{{ route('posts.index') }}"><i class="fas fa-fw fa-edit"></i>&nbsp;Artículos</a>
            <a class="collapse-item" href="{{ route('trashed-posts.index') }}"><i class="fas fa-fw fa-trash"></i>&nbsp;Papelera</a>
            <a class="collapse-item" href="{{ route('tags.index') }}"><i class="fas fa-fw fa-hashtag"></i>&nbsp;Etiquetas</a>
            <a class="collapse-item" href="{{ route('categories.index') }}"><i class="fas fa-fw fa-tags"></i>&nbsp;Categorias</a>
          </div>
        </div>
      </li> -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
          <i class="fas fa-fw fa-tools"></i>
          <span>Servicios</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Editar Servicios</h6>
            <a class="collapse-item" href="{{ route('servicios.index') }}"><i class="fas fa-fw fa-wrench"></i>&nbsp;Servicios</a>
            <a class="collapse-item" href="{{ route('trashed-servicios.index') }}"><i class="fas fa-fw fa-trash"></i>&nbsp;Papelera</a>
          </div>
        </div>
      </li>


      <li class="nav-item active ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePortfolio" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-concierge-bell"></i>
          <span>Portfolio</span>
        </a>
        <div id="collapsePortfolio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('portfolioItems.index') }}"><i class="fas fa-fw fa-edit"></i>&nbsp;Artículos</a>
            <a class="collapse-item" href="{{ route('portfolioCategories.index') }}"><i class="fas fa-fw fa-tags"></i>&nbsp;Categorías</a>
          </div>
        </div>
      </li>

      <!-- P Shop -->

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Modulos
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('pshop.index')}}">
          <i class="fas fa-fw fa-store"></i>
          <span>PShop</span></a>
      </li>
      <hr class="sidebar-divider">

      <!-- //P Shop -->



      <!-- REAL STATE PROJECT -->
      <!-- <div class="sidebar-heading">
       Bienes Raíces Real Estate
     </div>

     <li class="nav-item active">
       <a class="nav-link" href="{{route('properties.index')}}">
         <i class="fas fa-fw fa-building"></i>
         <span>Propiedades</span></a>
     </li>


     <li class="nav-item active">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#properties" aria-expanded="true" aria-controls="properties">
         <i class="fas fa-fw fa-tools"></i>
         <span>Mantenimiento</span>
       </a>
       <div id="properties" class="collapse" aria-labelledby="Properties" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Propiedades</h6>
           <a class="collapse-item" href="{{route('cities.index')}}"><i class="fas fa-fw fa-map-pin"></i>&nbsp;Sectores</a>
           <a class="collapse-item" href="{{route('features.index')}}"><i class="fas fa-fw fa-chair"></i>&nbsp;Datos Generales</a>


         </div>
       </div>
     </li> -->
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->


    @endauth
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            @guest
            <a class="nav-link" href="{{ route('login') }}"><span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ __('Login') }}</span></a>


            <!-- Nav Item - User Information -->
            @if (Route::has('register'))
            @endif
            @else
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
                <img class="img-profile rounded-circle" src="{{ Gravatar::src(Auth::user()->username) }}">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                 Perfil
               </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  {{ __('Salir') }}
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" id="parentDiv">
          @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
          @endif
          @if(session()->has('warning'))
            <div class="alert alert-warning">
              {{ session()->get('warning') }}
            </div>
          @endif
          @if(session()->has('error'))
            <div class="alert alert-danger">
              {{ session()->get('error') }}
            </div>
          @endif
          <!-- Page Heading -->


          <!-- Content Row -->

            @yield('content')

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Siscop 2019</span>
          </div>
        </div>
      </footer>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->







  <!-- height script-->

  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- <script src="{{ asset('lib/fontawesome/js/all.css') }}"></script> -->


  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  @yield('script')

</body>

</html>
