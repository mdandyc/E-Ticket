@if($costumer->user_id == Auth::user()->username)
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Costumer Menu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/userstyle.css') }}">
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

      <!-- search form (Optional) -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->

        <li class=""><a href="/user/reservation"><i class="fa fa-user"></i> <span>Reservation</span>
        
         </a></li>

        </li>
        <li class="">
          <a href="/user/{{(Auth::user()->username)}}">
            <i class="fa fa-handshake-o"></i> <span>Users</span>
                        
          </a>

        </li>
        <li class="active">
          <a href="/user/costumer/{{(Auth::user()->username)}}">
            <i class="fa fa-handshake-o"></i> <span>Data Pribadi</span><span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
           </span> 
                        
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

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
    <br>
    <br>
    <br>
    <br>
    <div class="container">
<form action="/user/costumer/{{$costumer->id}}" method="POST">
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
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" class="form-control" value="{{$costumer->name}}">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" placeholder="Address" class="form-control" value="{{$costumer->address}}">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{$costumer->phone}}">
    </div>
    <div class="form-group">
        <label>Gender</label>
        <select name="gender" id="" class="form-control">
          <option value="Laki-Laki" 
          @if($costumer->gender == 'Laki-Laki')
          selected
          @endif>Laki-Laki</option>
          <option value="Perempuan"
          @if($costumer->gender == 'Perempuan')
          selected
          @endif
          >Perempuan</option>
        </select>
    </div>


    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="_method" value="put">
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


