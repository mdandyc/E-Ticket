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
      <form action="/rute/search" method="get" class="sidebar-form">
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
        <small><a href="/admin/rute/create" class="btn btn-default">Input</a></small>
        <small><a href="/admin/rute/pdf" class="btn btn-default">Make a Report!</a></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">

    @foreach ($rute as $data)
        <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-default">
            <div class="box-header with-border">
              <div class="user-block">
                <span class="username">Rute ID -
                <a href="/admin/rute/{{$data->id}}">{{$data->id}}</a><br>
                </span>
              </div>
              <!-- /.user-block -->

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  <p><b>Rute Form : </b>{{$data->rute_form}}</p>
              <p><b>Rute To : </b>{{$data->rute_to}}</p>
              <p><b>Depart At : </b>{{$data->depart_at}}</p>
              <p><b>Price : </b>{{$data->price}}</p>
              <p><b>Transportation Code : </b>{{$data->transportation->code}}</p>
              <p><b>Transportation Description : </b>{{$data->transportation->description}}</p>
              <p><b>Seat Qty : </b>{{$data->transportation->seat_qty}}</p>

              <form action="/admin/rute/{{$data->id}}" method="post" onSubmit="if(!confirm('Are you sure want to delete this?')){return false;}">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <a href="/admin/rute/{{$data->id}}/edit" type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> Edit</a>
              <button type="submit" class="btn btn-default btn-xs btn-danger" value="Delete"><i class="fa fa-times"></i>Delete</button>
              </form>
              <span class="pull-right text-muted">
              Created At - {{$data->created_at}}</span>

            </div>
            <!-- /.box-footer -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <!-- /.col -->

        @endforeach
      </div>
      <center>
      {{$rute->appends(Request::only('keyword'))->links()}}
      </center>
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



