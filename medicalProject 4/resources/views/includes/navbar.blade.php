 <!-- ======= Header ======= -->
 <div id="topbar" class="d-flex align-items-center fixed-top"></div>
  
 <header id="header" class="fixed-top">
   <div class="container d-flex align-items-center">

     <a href="{{route('/')}}" class="logo me-auto"><img src="{{ asset('assets/img/OurHealth1.png') }}" width="100" height="200" alt="" class="img-fluid"></a>
     <h1 class="logo me-auto"><a href="/">OurHealth</a></h1>

     <nav id="navbar" class="navbar order-last order-lg-0">
       <ul>
         <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
         <li><a class="nav-link scrollto" href="#about">About</a></li>
         <li><a class="nav-link scrollto" href="#services">Services</a></li>
         <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
         <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

         
         @if (Session::has('loginId'))
          <li><span><strong>{{ $data->nom.' '.$data->prenom }}</strong></span></li>
          <li><a href="{{ route('logout') }}">Logout <i class="bi bi-box-arrow-right"></i></a></li>

         @else
          <li><a href="{{ Route('UserRegister') }}">Register </a></li>
          <li><a href="{{ Route('Login') }}">Login <i class="bi bi-box-arrow-in-left"></i></a></li>
         @endif
         
       </ul>
       <i class="bi bi-list mobile-nav-toggle"></i>
     </nav><!-- .navbar -->

     @if (Session::has('loginId'))

       @if($data->profil=="Patient")
         <a href="/dashboardP" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
       @elseif($data->profil=="Doctor")
         <a href="/dashboardD" class="appointment-btn scrollto"><span class="d-none d-md-inline">Your</span> Appointments</a>
       
       @endif

     @else
      <a href="{{ Route('Login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
     @endif

   </div>
 </header><!-- End Header -->