@php
  $data = 'App\models\user'::where('id','=',Session::get('loginId'))->first();
  $lists = DB::table('appointments')->where('id_medecin','=',Session::get('loginId'))->get();

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

    <!-- select * from appointments where id_medecin = Session::get('loginId');  -->
    <br><h3>Your Appointements : </h3>
    <table class="table table-primary">
        <tr>
            <th>N°</th>
            <th>You</th>
            <th>Patient</th>
            <th>Debut</th>
            <th>Fin</th>
            <th>Etat</th>
            <th>Annuler</th>
        </tr>
        @foreach ($lists as $item)
        <tr>
            <th>{{$item->id}}</th>
           
         @foreach ($use as $us)
            @if ($item->id_medecin == $us->id) 
            <td>{{$us->nom.' '.$us->prenom}} </td>
            @endif
            @endforeach
        
          @if ($item->id_patient == null)
            <td></td>
           @endif
         @foreach ($use as $us)
            @if ($item->id_patient == $us->id)
            <td>{{$us->nom.' '.$us->prenom}} </td>
           @endif
            @endforeach

            <td>{{$item->debut}}</td>
            <td>{{$item->fin}}</td>
            <td>{{$item->etat}}</td>


            <td><a href="yourAppointements/delete/{{$item->id}}" class="text-danger"><i class="bi bi-trash text-danger"></i><strong>Delete</strong> </a></td>
        </tr>
        @endforeach
    </table>


    
</div>


</div> 
    @include('includes.scripts')
</body>
</html>