@php
  $data = 'App\models\user'::where('id','=',Session::get('loginId'))->first();
  $lists = DB::table('appointments')->where('id_medecin','=',Session::get('loginId'))->get();


@endphp


<!DOCTYPE html>
<html lang="en">


<!--style-->
@include('includes.sidebarCSS')
<!--style-->
<head>
    <title>DashD</title>
    @include('includes.header')
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
    <!-- ======= Header ======= -->

    @include('includes.navbar')
    <br><br><br><br><br>

<div class="wrapper">

        <!-- Sidebar  -->
        <nav id="sidebar">
        
            <div class="sidebar-header">
                <h3><a href="/dashboardD/doctorProfil"><strong><i class="bi bi-person-fill" ></i></strong></a>Dr.{{$data->nom .' '. $data->prenom}}</h3>
            </div>
            <ul class="list-unstyled components">
                <li> <a href="/">Home</a> </li>
                <li> <a href="/dashboardD"><i class="bi bi-house-door"></i> Dashboard</a> </li>
                <li> <a href="/dashboardD"><i class="bi bi-plus-square"></i> Add Appointement</a> </li>
                <li> <a href="/dashboardD/yourAppointements"><i class="bi bi-card-list"></i> Your Appointements</a> </li>
                <li> <a href="/dashboardD/yourMessages"><i class="bi bi-envelope"></i> Your Messages</a> </li>
            </ul>
    
        </nav>
        <!-- End of Sidebar  -->

        
        <!-- Page Content  -->
        <div id="content">
        <br>
             <div  id="myForm1" >
            <!-- Account page navigation-->
            <!-- <hr class="mt-0 mb-4"> -->
            <div class="row">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header"><center>Account Details</center></div>
                        <div class="card-body">
                            <form action="{{ Route('patientP', [$data->id])  }} "  method="post" >
                               @csrf
                               
                                <!-- Nom-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                         <label for="nom" class="small mb-1">Nom: </label>
                                         <input type="text"  class="form-control {{$errors->has('nom') ? 'error' : '' }}" name="nom" id="nom" value="{{$data->nom}}" >
                                            @if ($errors->has('nom'))
                                                <div class="error">
                                            {{ $errors->first('nom')}}
                                                 </div>
                                             @endif       
                                    </div>
                                
                        
        
                                     <!-- Prénom-->
                                     <div class="col-md-6">
                                        <label for="prenom" class="small mb-1">Prénom: </label>
                                         <input type="text" class="form-control {{$errors->has('prenom') ? 'error' : '' }}" name="prenom" id="prenom" value="{{$data->prenom}}" >
                                                 @if ($errors->has('prenom'))
                                                 <div class="error">
                                                {{ $errors->first('prenom')}}
                                                </div>
                                                 @endif
                                    </div>
                                </div>
        
                                <!--    Ville       --> 
                                <div class="row gx-3 mb-3">  
                                    <!-- ville-->
                                    <div class="col-md-6">
                                       <label for="ville" class="small mb-1">Ville:</label>
                                       <input type="text" class="form-control {{$errors->has('ville') ? 'error' : '' }}" name="ville" id="ville" value="{{$data->ville}}" style="width: 190px;"  >
                                          @if ($errors->has('ville'))
                                                 <div class="error">
                                         {{ $errors->first('ville')}}
                                                </div>
                                        @endif
                                    </div>
        
                                    <div class="col-md-6">
                                       <label for="profil" class="small mb-1">Profil:</label>
                                       <input type="text" class="form-control {{$errors->has('profil') ? 'error' : '' }}" name="profil" id="profil" value="{{$data->profil}}" style="width: 190px;" readonly>
                                            @if ($errors->has('profil'))
                                                 <div class="error">
                                           {{ $errors->first('profil')}}
                                                </div>
                                              @endif 
        
                                     </div>
          
                                
                                <div class="row gx-3 mb-3">
                                   
                                     <!-- Tel-->
                                    <div class="col-md-6">
                                        <label for="tel" class="small mb-1">Tel:</label>
                                        <input type="text" class="form-control {{$errors->has('tel') ? 'error' : '' }}" name="tel" id="tel" value="{{$data->tel}}" style="width: 190px;">
                                           @if ($errors->has('tel'))
                                          <div class="error">
                                          {{ $errors->first('tel')}}
                                          </div>
                                          @endif
                                    </div>
                                </div>
        
                                <div class="row gx-3 mb-3">
                                    <!-- Email-->
                                    <div class="col-md-6">
                                        <label for="email" class="small mb-1">Email:</label>
                                        <input type="text" class="form-control {{$errors->has('email') ? 'error' : '' }}" name="email" id="email" value="{{$data->email}}" style="width: 270px;">
                                        @if ($errors->has('email'))
                                            <div class="error">
                                       {{ $errors->first('email')}}
                                            </div>
                                        @endif
                                    
                                    </div>
                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <label for="password" class="small mb-1">Password:</label>
                                        <input type="text" class="form-control {{$errors->has('password') ? 'error' : '' }}" name="password" id="password" value="{{$data->password}}" style="width: 270px;">
                                        @if ($errors->has('password'))
                                            <div class="error">
                                       {{ $errors->first('password')}}
                                            </div>
                                        @endif 
                                    </div>
                                </div>
        
                               
                            <table> 
                             <tr>
                                <td> <input type="submit" class="btn btn-primary" value="Save changes"></td>
                                <td> <input type="reset" class="btn btn-primary" value="Annuler" ><td>
                             </tr>
                           </table >
                     </form>
                 </div>
                </div>
            </div>
          </div>
        </div> 
    </div> 
    

    @include('includes.scripts')
</body>
</html>