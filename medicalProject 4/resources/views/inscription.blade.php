<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<head>
  <title>Register User</title>
  @include('includes.header')
</head>


<body>
  <!-- ======= Header ======= -->
  {{$data = 'App\models\User'::where('id','=',Session::get('loginId'))->first();}}
  @include('includes.navbar')


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"      data-aos="fade-up" data-aos-delay="200">
                <h1 class="text-dark">Register </h1>
                <h2 class="text-dark">Happy for your subscription to our plateforme</h2>
            </div>    
        </div>
    </div>

  </section>



<main id="main">
  <section>

    <div class="container mt-5">
        <!--success message-->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif

        @if(Session::has('fail'))
        <div class="alert alert-fail">
            {{Session::get('fail')}}
        </div>
        @endif

        <div class="form-group">
            <h1 class="text-dark" >Register </h1>
        </div>


      <form  method="post" action="{{ action('App\Http\Controllers\UserController@createUserForm') }}" >
        @csrf

            <table>

            <div class="form-group">
                <tr>
                    <td class="text-dark">Last Name: </td>
                    <td colspan="2" ><input type="text"  class="form-control {{$errors->has('nom') ? 'error' : '' }}" name="nom" id="nom" > </td>
                </tr>
                    <!-- Error -->
                   @if ($errors->has('nom'))
                    <div class="error">
                        {{ $errors->first('nom')}}
                    </div>
                    @endif
            </div>
               
            <div class="form-group">
                <tr>
                    <td class="text-dark">First Name: </td>
                    <td colspan="2" ><input type="text" class="form-control {{$errors->has('prenom') ? 'error' : '' }}" name="prenom" id="prenom"> </td>
                </tr>
                    <!-- Error -->
                    @if ($errors->has('prenom'))
                    <div class="error">
                        {{ $errors->first('prenom')}}
                    </div>
                    @endif
            </div>
            
            <div class="form-group">
                <tr>
                    <td class="text-dark">City: </td>
                    <td colspan="2" ><input type="text" class="form-control {{$errors->has('ville') ? 'error' : '' }}" name="ville" id="ville"> </td>
                </tr>
                    <!-- Error -->
                    @if ($errors->has('ville'))
                    <div class="error">
                        {{ $errors->first('ville')}}
                    </div>
                    @endif
            </div>


            <div class="form-group">
                <tr>
                    <td class="text-dark">PROFIL: </td>
                    <td><input type="radio" id="Patient" name="profil" value="Patient"  {{$errors->has('profil') ? 'error' : '' }} > 
                    <label for="Patient">Patient</label></td>

                    <td><input type="radio" id="Doctor" name="profil" value="Doctor"  {{$errors->has('profil') ? 'error' : '' }} > 
                    <label for="Doctor">Doctor</label></td> 
                </tr>
                    <!-- Error -->
                    @if ($errors->has('profil'))
                    <div class="error">
                        {{ $errors->first('profil')}}
                    </div>
                    @endif
            </div>   
         
                   
            <div class="form-group">
                <tr>
                    <td class="text-dark">Tel: </td>
                    <td colspan="2" ><input type="text" class="form-control {{$errors->has('tel') ? 'error' : '' }}" name="tel" id="tel"> </td>
                </tr>
                    <!-- Error -->
                    @if ($errors->has('tel'))
                    <div class="error">
                        {{ $errors->first('tel')}}
                    </div>
                    @endif
            </div>

            <div class="form-group">
                <tr>
                    <td class="text-dark">Email: </td>
                    <td colspan="2" ><input type="text" class="form-control {{$errors->has('email') ? 'error' : '' }}" name="email" id="email"> </td>
                </tr>
                    <!-- Error -->
                    @if ($errors->has('email'))
                    <div class="error">
                        {{ $errors->first('email')}}
                    </div>
                    @endif
            </div>

            <div class="form-group">
                <tr>
                    <td class="text-dark">Password: </td>
                    <td colspan="2" ><input type="password" class="form-control {{$errors->has('password') ? 'error' : '' }}" name="password" id="password"> </td>
                </tr>
                    <!-- Error -->
                    @if ($errors->has('password'))
                    <div class="error">
                        {{ $errors->first('password')}}
                    </div>
                    @endif
            </div>


            <div class="form-group">
                <tr> 
                    <td class="text-dark">Speciality: </td>
                    <!-- <td colspan="2"><select name="specialite" id="profil" class="form-control {{$errors->has('specialite') ? 'error' : '' }}">
                        <option value="Dentaire">Dentaire</option>
                        <option value="Optician">Optician</option>
                    </select></td>
                    <!--td colspan="2" ><input type="text" class="form-control {{$errors->has('specialite') ? 'error' : '' }}" name="specialite" id="specialite"> </td-->
                    <td colspan="2" ><input type="text" class="form-control {{$errors->has('specialite') ? 'error' : '' }}" name="specialite" id="specialite"> </td>
                </tr>
                    <!-- Error -->
                    @if ($errors->has('specialite'))
                    <div class="error">
                        {{ $errors->first('specialite')}}
                    </div>
                    @endif
            </div>

            <div class="form-group">
                <tr>
                    <td class="text-dark">Hospital structure: </td>
                    <td colspan="2" ><input type="text" class="form-control {{$errors->has('StructHospital') ? 'error' : '' }}" name="StructHospital" id="StructHospital"> </td>
                </tr>
                    <!-- Error -->
                    @if ($errors->has('StructHospital'))
                    <div class="error">
                        {{ $errors->first('StructHospital')}}
                    </div>
                    @endif
            </div>


            <div class="form-group">
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary" value="Register"></td>
                    <td><input type="reset" class="btn btn-primary" value="Cancel"></td>
                </tr>
            </div>

           </table>

    </form>
  </div>

</section>
</main>






<!-- Footer -->
@include('includes.footer')
@include('includes.scripts')


</body>
</html>
