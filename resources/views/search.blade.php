<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Traveling Around Indonesian</title>
</head>
<body>
  <!-- CSS List-->
    <link rel="stylesheet" href="/css/app.css" async defer>
    <link rel="stylesheet" href="/css/venobox.css" async defer>
    <link rel="stylesheet" href="/css/animate.min.css" async defer>
    <link rel="stylesheet" href="/css/font-awesome.min.css" async defer>
  <link rel="stylesheet" href="/css/merlin.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/modal.css">


    <section id="home" class="page">
    <div class="hitam">
      <div class="container">
      <div class="login">
    @if (Auth::guest())
    <a href="#" class="btn btn-blue" data-toggle="modal" data-target="#myModal">Login</a>

      <a href="#" class="btn btn-blue" data-toggle="modal" data-target="#myModal2">Create An Account</a>
    @else
      @if(Auth::user()->level == 'admin')

        <a href="/user/{{Auth::user()->username}}" class="btn btn-blue">
                  <img src="\images\default.jpg" alt="" height="20px" width="20px" style="border-radius:50%;">
           Profile</a>
        <a href="/admin/costumer" class="btn btn-blue">Menage Data</a>
        <a href="{{ route('logout') }}" class="btn btn-blue"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
      @elseif(Auth::user()->level == 'user')
        <a href="/user/{{Auth::user()->username}}" class="btn btn-blue">
                  <img src="\images\default.jpg" alt="" height="20px" width="20px" style="border-radius:50%;">
           Profile</a>

        <a href="{{ route('logout') }}" class="btn btn-blue"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
      @endif
    @endif
      </div>
        <div class="content cover text-center">
          <div class="row">
            <div class="col-lg-12">
              <img class="logozomato" src="" alt=""><br>

              <h2>Traveling aroung Indonesia more easily, Book the ticket now! </h2>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Traveling Login!</b></h3>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
              <fieldset>
                
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> 
                <h4><b>Username</b></h4>                     
                  <input class="form-control" placeholder="Username" name="username" type="text" required>
                  @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                   @endif
                  </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <h4><b>Password</b></h4>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                 @endif
              </div>
              <div class="checkbox">
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                </div>
              <input class="btn btn-lg btn-mas btn-block" type="submit" value="Masuk"><br>
              <p align="center" id="privacy">Dengan melanjutkan laman ini, Anda setuju dengan <a href="#"><u>Syarat dan Ketentuan</u></a>,<a href="#"> <u>Kebijakan Cookie</u></a>, <a href="#"><u>Kebijakan Privasi dan</u></a> <a href="#"><u>Kebijakan Konten</u></a> Traveling. </p>
            </fieldset>
              </form>
      </div>
    </div>

  </div>
</div>
        <!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Traveling Register!</b></h3>
      </div>
      <div class="modal-body">
            <form accept-charset="UTF-8"  method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
              <fieldset>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <h4><b>Username</b></h4>
                <input class="form-control" placeholder="Username" name="username" type="text" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <h4><b>E-Mail</b></h4>
                <input class="form-control" placeholder="E-Mail" name="email" type="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <h4><b>Full Name</b></h4>
                  <input class="form-control" placeholder="Full Name" name="name" type="text" value="{{ old('name') }}" required autofocus>
                  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                  @endif
                </div>
              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <h4><b>Address</b></h4>
                <input class="form-control" placeholder="Address"  name="address" value="{{ old('address') }}" required autofocus type="text">
                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <h4><b>Phone</b></h4>
                <input class="form-control" placeholder="Phone" name="phone" type="number" value="{{ old('phone') }}" required>
                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                <h4><b>Gender</b></h4>
                            <select name="gender" class="form-control"  value="{{ old('gender') }}" required autofocus>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif

                                
                        </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <h4><b>Password</b></h4>
                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <h4><b>Confirm Password</b></h4>
                <input class="form-control" placeholder="Password" name="password_confirmation" type="password" value="" required>
              </div>

              <input class="btn btn-lg btn-mas btn-block" type="submit" value="REGISTER"><br>
              <p align="center" id="privacy">Dengan melanjutkan laman ini, Anda setuju dengan <a href="#"><u>Syarat dan Ketentuan</u></a>,<a href="#"> <u>Kebijakan Cookie</u></a>, <a href="#"><u>Kebijakan Privasi dan</u></a> <a href="#"><u>Kebijakan Konten</u></a> Traveling. </p>
            </fieldset>
              </form>
      </div>
    </div>

  </div>
</div>
    <div id="navbar-top">
      <nav class="navbar navbar-default navbar-static" role="navigation">
        <div class="container">
        <div class="row">
          <div class="col-md-12 navbar-height">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Traveling</a>
          </div>
          <div class="login2">
    @if (Auth::guest())
    <a href="#" class="btn warna" data-toggle="modal" data-target="#myModal">Login</a>

      <a href="#" class="btn warna" data-toggle="modal" data-target="#myModal2">Create An Account</a>
    @else
      @if(Auth::user()->level == 'admin')

        <a href="/user/{{Auth::user()->username}}" class="btn warna">
                  <img src="\images\default.jpg" alt="" height="20px" width="20px" style="border-radius:50%;">
           Profile</a>
        <a href="/admin/costumer" class="btn warna">Menage Data</a>
        <a href="{{ route('logout') }}" class="btn warna"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
      @elseif(Auth::user()->level == 'user')
        <a href="/user/{{Auth::user()->username}}" class="btn warna">
                  <img src="\images\default.jpg" alt="" height="20px" width="20px" style="border-radius:50%;">
           Profile</a>

        <a href="{{ route('logout') }}" class="btn warna"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
      @endif
    @endif
      </div>

    <!-- <form class="navbar-form" role="search">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Tipe Hidangan" name="srch-term" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form> -->
            </div>
            </div>
        </div>
      </nav>
    </div>
    <section id="services" class="page">
    <div class="container">
        <div class="content text-center">
          <div class="heading">
            <h2><b></b></h2>
          </div>
          <div class="row">
            <div class="container searchform2">
            <div class="heading">
            <br><br>
            <h2><b>Cari Tiketmu!</b></h2>
            <div class="border"></div>
            <p>Pilih tiket sesuai dengan perjalanan anda, kenyamanan anda adalah tanggung jawab kami.</p>
          </div><br><br>
          <div class="container">
          <div class="row">
          <div class="col-md-12">
            <form action="/search" method="get">
            <div class="col-md-8"  style="margin-left:120px">
        <div class="dropdown">
          <select class="form-control" name="keyword" style="height:40px">
                                <option disabled selected>Jenis Transportasi</option>
                                <option value="2">Pesawat</option>
                                <option value="1">Kereta Api</option>
                           <i class="fa fa-location-arrow" aria-hidden="true"></i>

          <span class="caret"></span>
           </select>
        </div>
            
        </div>
        <div class="search">
          <div class="flex-shrink-0 plr0i col-md-2">
            <button id="search_button" class="btn btn-cyan cari" type="submit">Pilih
          </div>
          </div>
          </form>
          </div>
          </div>
          </div>
          
              <form action="/search" method="get">
          <div class="collapse navbar-collapse"  style="margin-left:120px">
          
        <div class="col-md-4">
        <div class="dropdown">
          <select class="form-control" name="rute_form" style="height:40px">
                                <option disabled selected>Berangkat Dari</option>
                                @foreach($rute as $data2)
                                  <option value="{{$data2->rute_form}}">{{$data2->rute_form}}</option>
                                @endforeach
                           <i class="fa fa-location-arrow" aria-hidden="true"></i>

          <span class="caret"></span>
           </select>
        </div>
        </div>
        <div class="col-md-5">

  <div class="search">
          <select class="form-control" name="rute_to" style="height:40px">
                                <option disabled selected>Berangkat Ke</option>
                                @foreach($rute as $data2)
                                  <option value="{{$data2->rute_to}}">{{$data2->rute_to}}</option>
                                @endforeach
                           <i class="fa fa-location-arrow" aria-hidden="true"></i>

          <span class="caret"></span>
           </select>
          


          </div>
          </div>
          <div class="search">
          <div class="flex-shrink-0 plr0i col-md-2">
            <button id="search_button" class="btn btn-cyan cari" type="submit">Cari
          </div>
          </div>
          </div>
                </form>
                <div class="heading">
            <br><br>
            <h2><b>Hasil Pencarian Anda!</b></h2>
            <div class="border"></div>

          </div><br><br>
    		<div class="container">
                  <div class="col-md-11" style="margin-left:40px;">
                @foreach ($rute as $data)
                <br>
    			<table class="table" style="background-color:#fff; border-radius:3px;">
    			<thead>
    				<tr>
    					<th scope="col">Nama Transportasi</th>
    					<th scope="col">Berangkat Dari</th>
    					<th scope="col">Berangkat Ke</th>
    					<th scope="col">Jam Berangkat</th>
    					<th scope="col">Deskripsi</th>
    					<th scope="col">Jumlah Kursi</th>
    					<th scope="col" rowspan="1">Harga</th>
    				</tr>
    			</thead>
    				<tbody>
    				<tr>
    					<td>{{$data->transportation->code}}</td>
    					<td>{{$data->rute_form}}</td>
    					<td>{{$data->rute_to}}</td>
    					<td>{{$data->depart_at}}</td>
    					<td>{{$data->transportation->description}}</td>
    					<td>{{$data->transportation->seat_qty}}</td>
    					<td>{{$data->price}}</td>
    					<td>
    	@if (Auth::guest())
    		<input type="submit" value="Pesan!" class="btn btn-primary" onclick="alert('Harap login sebelum memesan tiket!');">
		@else
		<form action="/search/create" method="POST" onSubmit="if(!confirm('Apakah anda yakin ingin memesan tiket ini??')){return false;}">
		    	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		    	<div class="hide" style="display:none;">
		        <input type="text" name="reservation_at" placeholder="Reservation At" class="form-control" value="">

		        <input type="date" name="reservation_date" placeholder="Reservation Date" class="form-control">
		        <input type="hidden" name="costumer_id" value="@foreach($costumer as $cost)@if($cost->user_id == Auth::user()->username){{$cost->id}}@endif @endforeach">
		        <select name="costumer_id" id="" class="form-control">
		        	@foreach($costumer as $data2)
		        	<option value="{{$data2->id}}">{{$data->name}}</option>
		        	@endforeach
		        </select>

		        <input type="text" name="seat_code" placeholder="Seat Code" class="form-control">
		        <input type="hidden" value="{{$data->id}}" name="rute_id">
		        <input type="hidden" value="{{Auth::user()->username}}" name="user_id">
		    <input type="hidden" name="_token" value="{{csrf_token()}}">
		    </div>
		    <input type="submit" value="Pesan!" class="btn btn-primary">
		</form>
		@endif

    					</td>
    				</tr>
    				</tbody>
    			</table>
        @endforeach
      <center>
      {{$rute->appends(Request::only('keyword'))->links()}}
      </center>
    			</div>
    		</div>

			 

    
    </section>
<!--footer start from here-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter"> 
        <img src="/images/jajanjalanlogo.png" width="80"></div>
        <p>Jajan Jalan Kuliner Restaurant Di Indonesia</p>
        <p><i class="fa fa-map-pin"></i> Jln Cicadas</p>
        <p><i class="fa fa-phone"></i> Phone : +91 9999 878 398</p>
        <p><i class="fa fa-envelope"></i> E-mail : info@Traveling.com</p>
        
      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">OTHER</h6>
        <ul class="footer-ul">
          <li><a href="#"> Career</a></li>
          <li><a href="#"> Privacy Policy</a></li>
          <li><a href="#"> Terms & Conditions</a></li>
          <li><a href="#"> Client Gateway</a></li>
          <li><a href="#"> Ranking</a></li>
          <li><a href="#"> Case Studies</a></li>
          <li><a href="#"> Frequently Ask Questions</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">LATEST POST</h6>
        <div class="post">
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote><a href=""><i class="fa fa-facebook"></i> Facebook</a>
            </blockquote>
            <blockquote><a href=""><i class="fa fa-twitter"></i> Twitter</a>
            </blockquote>
            <blockquote><a href=""><i class="fa fa-instagram"></i> Instagram</a>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>© Powered By<a href="http://karismatech.com/"> Karismatech </a>2017</p> .
    </div>
  </div>
</div>
  <!-- Javascript List -->
     <script src="/js/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/isotope.pkgd.min.js"></script>
    <script src="/js/imagesloaded.min.js"></script>
    <script src="/js/jquery.scrollTo.min.js"></script>
    <script src="/js/jquery.nav.min.js"></script>
    <script src="/js/jquery.appear.min.js"></script>
    <script src="/js/venobox.min.js"></script>
    <script src="/js/merlin.js"></script>
</body>
</html>