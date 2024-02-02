

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
    <title>DashD</title>
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
    

    <form method="post" action="{{ Route('a') }}" >
        @csrf
          <!--label for="id_medecin">Votre id:</!--label-->
          <input type="hidden"  class="form-control {{$errors->has('id') ? 'error' : '' }}" name="id_medecin" value="{{$data->id}}" id="id" readonly > <br>
   
          @if ($errors->has('id'))
               <div class="error">
                   {{ $errors->first('id')}}        
               </div>
           @endif
       
       
           <label for="appt-time1"><strong>Debut :</strong><br>
            Veuillez choisir une heure de rendez-vous :</label>
           <input class="form-control" id="appt-time1" type="datetime-local" name="debut"><br>
   

           <label for="appt-time1"><strong>Fin :</strong><br>
            Veuillez choisir une heure de rendez-vous :</label>
           <input class="form-control" id="appt-time1" type="datetime-local" name="fin" > <br>
   
           <label for="etat">Etat :</label>
           <input id="etat" class="form-control {{$errors->has('StructHospital') ? 'error' : '' }}"  name="etat" value="non réservé" readonly> <br>
       
           
           <label for="StructHospital">Structure Hospitalière:</label>
           <input type="text"  class="form-control {{$errors->has('StructHospital') ? 'error' : '' }}" name="StructH" value="{{$data->StructHospital}}" id="StructHospital" ><br>
           @if ($errors->has('StructHospital'))
               <div class="error">
                    {{ $errors->first('StructHospital')}}
               </div>
           @endif
   
           <input type="submit" class="btn btn-primary" value="Add Appointement">
                         
       
       </form>




        </div>


</div> 
    @include('includes.scripts')
</body>
</html>