@php
   $lists = DB::table('appointments')->get();
@endphp

<!DOCTYPE html>
<html lang="en">


<!--style-->
@include('includes.sidebarCSS')
<style>
    body{
        background-color: gray;
    }
    #sidebar {
   min-width: 250px;
   max-width: 250px;
   background: gray;
   color: #fff;
   transition: all 0.3s;
   }
   #sidebar .sidebar-header {
   padding: 20px;
   background: gray;
   }
   #sidebar ul li a:hover {
   color: #000000;
   background: #fff;
   }

</style>
<!--style-->
<script>
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
</script>

<head>
    <title>DashAdmin</title>
    @include('includes.header')
</head>


<body style="background-color:;"
    <!-- ======= Header ======= -->
    @include('includes.navbar')
    <br><br><br><br><br>

    <div class="wrapper">
    
        <!-- Sidebar  -->
        <nav id="sidebar">
            
            <div class="sidebar-header">
                <h3>{{$data->nom.' '.$data->prenom}}</h3>
            </div>
            <ul class="list-unstyled components">
                <li> <a href="/">Home</a> </li>
                <li> <a href="/dashboardA"><i class="bi bi-house-door"></i> Dashboard</a> </li>
                <li> <a href="/dashboardA"><i class="bi bi-plus-square"></i> All Appointements</a> </li>
                <li> <a href="/dashboardA/users"><i class="bi bi-person-lines-fill"></i> All Users</a> </li>
                <li> <a href="/dashboardA/messages"><i class="bi bi-envelope"></i> All Messages</a> </li>
            </ul>
    
        </nav>
        <!-- End of Sidebar  -->
    
    
    
        <!-- Page Content  -->
        <div id="content">    
            
    <h1>Admin Dashboard </h1><hr>
    <!--select * from appointements -->
    <table class="table table-secondary table-striped table-bordered">
           <tr>
               <td colspan="8" style="text-align: center"> <h3>Appointements List : </h3> </td>
           </tr>
           <tr>
                <th>#</th>
                <th>Id_Medecin</th>
                <th>Id_Patient</th>
                <th>Debut</th>
                <th>Fin</th>
                <th>Etat</th>
                <th>StructH</th>
                <th>Delete</th>
            </tr>
        @foreach ($lists as $item)
              <tr>
                  <th>{{$item->id}}</th>
                  <td>{{$item->id_medecin}}</td>
                  <td>{{$item->id_patient}}</td>
                  <td>{{$item->debut}}</td>
                  <td>{{$item->fin}}</td>
                  <td>{{$item->etat}}</td>
                  <td>{{$item->StructH}}</td>
                  <td><a href="dashboardA/delete/{{$item->id}}" class="text-danger"><i class="bi bi-trash text-danger"></i><strong>Delete</strong> </a></td>
              </tr>
        @endforeach
    </table>



            
        </div>
        <!--End of Page Content  -->
    
    
 </div>

    @include('includes.scripts')
</body>
</html>
