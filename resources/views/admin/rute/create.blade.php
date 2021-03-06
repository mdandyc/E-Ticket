@if(Auth::user()->level == 'admin')
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Menu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ URL::asset('css/skin-blue.min.css') }}">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <script src="https://use.fontawesome.com/75341ac20c.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>V</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Tra</b>vel</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><i class="fa fa-user-circle" aria-hidden="true"></i> {{(Auth::user()->name)}}</span>

            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
          
                  <img src="\images\default.jpg" class="img-circle" alt="User Image"><br>
                <p> - {{(Auth::user()->name)}}
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a>


                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        
                  <img src="\images\default.jpg" class="img-circle" alt="User Image"><br>
        </div>
        <div class="pull-left info">
          <a href=""><h5>User!</h5></a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="/admin/rute/search" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="keyword" class="form-control" placeholder="Search Branch Name..." required>
          <span class="input-group-btn">
              <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
         {{-- @if (Auth::user()->role !== 'admin') --}}
        <li class=""><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span>
        
         </a></li>
        <li class="">
          <a href="/admin/costumer">
            <i class="fa fa-handshake-o"></i> <span>Costumer</span>
          </a>
        </li>
      {{-- @else --}}
        <li class=""><a href="/admin/reservation"><i class="fa fa-user"></i> <span>Reservation</span>
        
         </a></li>
        <li class="active">
          <a href="/admin/rute"><i class="fa fa-user-circle"></i> <span>Rute</span><span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
           </span> 
          </a>
        </li>
        <li class="">
          <a href="/admin/transportasi">
            <i class="fa fa-book"></i> <span>Transportation</span>
          </a>
        </li>
        <li class="">
          <a href="/admin/transportasitype">
            <i class="fa fa-newspaper-o"></i> <span>Transpotation Type</span>
                        
          </a>

        </li>
        <li class="">
          <a href="/admin/user">
            <i class="fa fa-handshake-o"></i> <span>Users</span>
                        
          </a>

        </li>
      </ul>
      {{-- @endif --}}
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Detail
        <small><a href="/admin/rute/create">Input</a></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">

    <div class="container">
<form action="/admin/rute" method="POST">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    
    <div class="form-group">
        <label>Rute Form</label>
        <input type="text" name="rute_form" placeholder="Rute Form" class="form-control">
    </div>
    <div class="form-group">
        <label>Rute To</label>
        <input type="text" name="rute_to" placeholder="Rute To" class="form-control">
    </div>
    <div class="form-group">
        <label>Depart At</label>
        <input type="text" name="depart_at" placeholder="Depart At" class="form-control">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" placeholder="Price" class="form-control">
    </div>
    <div class="form-group">
        <label>Transportation Code</label>
        <select name="transportation_id" id="" class="form-control">
        	@foreach($transportation as $data)
        	<option value="{{$data->id}}">{{$data->code}}</option>
        	@endforeach
        </select>
    </div>


    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit" value="SUBMIT" class="btn btn-primary">
</form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
   <strong>© Powered By<a href="#">  </a>2017</strong> .
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('js/app.js') }}"></script>
<!-- ownerLTE App -->
<script src="{{ URL::asset('js/Adminlte.min.js') }}"></script>

</body>
</html>
@else
<script type="text/javascript">
  window.location = "/404";
</script>
@endif



