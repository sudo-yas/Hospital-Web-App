@php
    $data = 'App\models\user'::where('id','=',Session::get('loginId'))->first();
  $lists = DB::table('appointments')->get();

    $use = DB::table('users')->get();
@endphp

<!DOCTYPE html>
<html lang="en">


<!--style-->
@include('includes.sidebarCSS')
<!--style-->
<script>
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
</script>

<head>
    <title>DashP</title>
    @include('includes.header')

    

</head>


<body>
    <!-- ======= Header ======= -->
    @include('includes.navbar')
    <br><br><br><br><br>

<div class="wrapper">

        <!-- Sidebar  -->
        <nav id="sidebar">
        
            <div class="sidebar-header">
                <h3><a href="/dashboardP/patientProfil"><strong><i class="bi bi-person-fill" ></i></strong></a>Mr.{{$data->nom .' '. $data->prenom}}</h3>
            </div>
            <ul class="list-unstyled components">
                <li> <a href="/">Home</a> </li>
                <li> <a href="/dashboardP"><i class="bi bi-house-door"></i> Dashboard</a> </li>
                <li> <a href="/dashboardP"><i class="bi bi-calendar2-week"></i> Make an Appointements</a> </li>
                <li> <a href="/dashboardP/doctorsList"><i class="bi bi-person-lines-fill"></i> Doctors List</a> </li>
                <li> <a href="/dashboardP/yourMessages"><i class="bi bi-envelope"></i> Your Messages</a> </li>
                <li> <a href="/dashboardP/yourAppointements"><i class="bi bi-calendar2-day"></i></i> Your Reservations</a> </li>
            </ul>
    
        </nav>
        <!-- End of Sidebar  -->


        

  <!-- Page Content  -->
  <div id="content">

    
    <!-- select * from appointements  -->
    <br><h3>Available Appointements : </h3>
    <table class="table table-primary table-striped">
        <tr>
             <th>N°</th>
             <th>Medecin</th>
             <th>Patient</th>
             <th>Debut</th>
             <th>Fin</th>
             <th>Etat</th>
             <th>Réserver</th>
             <th>StructHospital</th>
             <th><i class="fa fa-medkit" style="font-size:35px;color:black;"></i></th>
             
         </tr>

     @foreach ($lists as $item)
     <!--    -->
     @if ($item->etat!="reservee")
         
        @if (($item->id_patient == $data->id) || ($item->id_patient == null))
         <form action=" {{ Route('res', [$item->id])}}"  method="post" >
         @csrf
        
         <th>{{$item->id}}</th>
         <input type="hidden"  class="form-control {{$errors->has('id') ? 'error' : '' }}" name="id" value="{{$item->id}}" id="id" >
                 @if ($errors->has('id'))
                 <div class="error">
                 {{ $errors->first('id')}}
                 </div>
                 @endif


           @foreach ($use as $us)
            @if ($item->id_medecin == $us->id)
            <td>{{$us->nom.' '.$us->prenom}} </td>
            @endif
            @endforeach
          <input type="hidden"  class="form-control {{$errors->has('id_medecin') ? 'error' : '' }}" name="id_medecin" id="id_medecin" value="{{$item->id_medecin}}"  readonly>
                 @if ($errors->has('id_medecin'))
                 <div class="error">
                 {{ $errors->first('id_medecin')}}
                 </div>
                 @endif

            @if ($item->id_patient == NULL)
            <td></td>
           @endif
              
              @foreach ($use as $us)
            @if ($item->id_patient == $us->id)
            <td>{{$us->nom.' '.$us->prenom}} </td>
            @endif
            @endforeach

           @if (($item->etat=='reservee'))
          <input type="hidden" class="form-control {{$errors->has('id_patient') ? 'error' : '' }}" name="id_patient" id="id_patient"  >
           
           @else 
           <input type="hidden" class="form-control {{$errors->has('id_patient') ? 'error' : '' }}" name="id_patient" id="id_patient"  value="{{$data->id}}">    
          @endif


        
        

          <td>{{$item->debut}}</td>
          <input type="hidden" class="form-control {{$errors->has('debut') ? 'error' : '' }}" name="debut" id="debut" value="{{$item->debut}}" style="width: 190px;" readonly >
                     @if ($errors->has('debut'))
                    <div class="error">
                    {{ $errors->first('debut')}}
                    </div>
                    @endif

          <td>{{$item->fin}}</td>
          <input type="hidden" class="form-control {{$errors->has('fin') ? 'error' : '' }}" name="fin" id="fin" value="{{$item->fin}}" style="width: 190px;" readonly>
                    @if ($errors->has('fin'))
                    <div class="error">
                    {{ $errors->first('fin')}}
                    </div>
                    @endif 

          <td style="margin: 20px 0;">{{$item->etat}} </td>
                      <td>


                        @if ($item->etat=='reservee')
                          <input type="radio" id="reservee" name="etat"  value="reservee"  {{$errors->has('etat') ? 'error' : '' }} checked> <label for="">Reservee</label>
                        <h6></h6>
                        <input type="radio" id="non reservee" name="etat"  value="non reservee"  {{$errors->has('etat') ? 'error' : '' }} > <label for="">Annuler</label>

                        @else
                        <input type="radio" id="reservee" name="etat"  value="reservee"  {{$errors->has('etat') ? 'error' : '' }} > <label for="">Reservee</label>
                        @endif

                          @if ($errors->has('etat'))
                         <div class="error">
                          {{ $errors->first('etat')}}
                         </div>
                          @endif
                          
                      </td>
                                   
                     


           <td>{{$item->StructH}}</td>
           <input type="hidden" class="form-control {{$errors->has('StructH') ? 'error' : '' }}" name="StructH" id="StructH" value="{{$item->StructH}}"  readonly>
                     @if ($errors->has('StructH'))
                     <div class="error">
                    {{ $errors->first('StructH')}}
                    </div>
                     @endif
            
         
            <td>
                <input type="submit" class="btn btn-primary" style="position:relative; bottom: -3px;width: 100px;"  value="Reserver" >
                
            </td>
         
            <!--   <td>  
       <button class="open-button"  value="{{$item->id}}" onclick="openForm()"><i style="font-size:24px"  class="fa">&#xf21e;</i></button> 
               </td> -->

           </tr>
           </form>
           @endif
       

       <!--  -->
      @endif
     @endforeach
 </table>
</div>
<!--End of Page Content  -->
<script >function openForm1() {
    document.getElementById("myForm1").style.display = "block";
  }
  
  function closeForm1() {
    document.getElementById("myForm1").style.display = "none";
  }
  </script>


</div>

    @include('includes.scripts')
</body>
</html>
