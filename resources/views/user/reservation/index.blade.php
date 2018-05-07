
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Menu</title>
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

        <li class="active"><a href="/user/reservation"><i class="fa fa-user"></i> <span>Reservation</span><span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
           </span> 
        
         </a></li>

        </li>
        <li class="">
          <a href="/user/{{(Auth::user()->username)}}">
            <i class="fa fa-handshake-o"></i> <span>Users</span>
                        
          </a>

        </li>
        @if(Auth::user()->level == 'user')
        <li class="">
          <a href="/user/costumer/@foreach($costumer as $data)@if($data->user_id == Auth::user()->username){{$data->id}}@endif
          @endforeach">
            <i class="fa fa-handshake-o"></i> <span>Data Pribadi</span>
                        
          </a>

        </li>
        @endif
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

    @foreach ($reservation as $data)
        <div class="col-md-12">
          <!-- Box Comment -->
          <div class="box box-default">
            <div class="box-header with-border">
              <div class="user-block">
                <span class="username">Kode Pesanan -
                <a href="/admin/reservation/{{$data->id}}">{{$data->reservation_code}}</a><br>
                </span>
              </div>
              <!-- /.user-block -->

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Kode Pesanan</th>
			      <th scope="col">Nama Kendaraan</th>
			      <th scope="col">Jam Pesan</th>
			      <th scope="col">Tanggal Pesan</th>
			      <th scope="col">Nama Customer</th>
			      <th scope="col">Kode Kursi</th>
			      <th scope="col">Rute Dari</th>
			      <th scope="col">Rute Menuju</th>
			      <th scope="col">Jam Keberangkatan</th>
			      <th scope="col">Harga</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>{{$data->reservation_code}}</td>
			      <td>@foreach($transportation as $data2)
			      @if($data2->id == $data->rute->transportation_id)
			      {{$data2->code}}
			      @endif
			      @endforeach</td>
			      <td>{{$data->reservation_at}}</td>
			      <td>{{$data->reservation_date}}</td>
			      <td>{{$data->costumer->name}}</td>
			      <td>{{$data->seat_code}}</td>
			      <td>{{$data->rute->rute_form}}</td>
			      <td>{{$data->rute->rute_to}}</td>
			      <td>{{$data->rute->depart_at}}</td>
			      <td>{{$data->rute->price}}</td>
			    </tr>
			  </tbody>
			</table>

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
      {{$reservation->appends(Request::only('keyword'))->links()}}
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



