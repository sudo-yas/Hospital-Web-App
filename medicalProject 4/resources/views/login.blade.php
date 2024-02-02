

<html>
  
  <!--head-->
  <head>
    <title>Login</title>
    @include('includes.header')
  </head>
  
  
  
  <body>
    <!-- ======= Header ======= -->
     @include('includes.navbar')
  
  
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  
  <div class="container">
    <div class="row">
  
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"      data-aos="fade-up" data-aos-delay="200">
        <h1 class="text-dark">Login Page</h1>
        <h2 class="text-dark">Happy for your subscription to our plateforme</h2>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <p class="text-dark">if you dont have account</p> <br>
          <a href=" {{ Route('UserRegister') }} " class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
  
    </div>
  </div>
  
  </section>
  <!--end hero -->
  
  
  
  
  <main id="main">
        <!-- ======= login Section ======= -->
        <section >
          <div class="container">
            <div class="row">
              <div class="form-group">
  
              <form action="{{ Route('Login') }}" method="POST">
  
                @if(Session::get('fail'))
                <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                </div>
                @endif
  
  
                @csrf
  
                <h2 class="text-dark">Login</h2>
  
                <label class="text-dark" for=""> Email : </label> 
                  <input type="text" class="form-control" name="email">
                  @if ($errors->has('email'))
                  <div class="error bg-danger text-light">
                      {{ $errors->first('email')}}
                  </div>
                  @endif
  
                <label class="text-dark" for=""> Password : </label> 
                  <input type="password" class="form-control" name="password">
                  @if ($errors->has('password'))
                  <div class="error bg-danger text-light">
                    {{ $errors->first('password') }}
                  </div>
                  @endif
          
                <div class="d-flex justify-content-center justify-content-lg-start">
                  <input type="submit" class="btn btn-get-started btn-primary " value="Login">
                </div>
          
              </form>
              </div>
  
          
            </div>
            </div>
          </div>
        </section><!-- End login section -->
  </main>
  
  
  
  
  <!-- ======= Footer ======= -->
  @include('includes.footer')
  @include('includes.scripts')

</body>
</html>