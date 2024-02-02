@php
   $data = 'App\Models\user'::where('id','=',Session::get('loginId'))->first();
   //$lists = DB::table('appointments')->get();
   $lists2 = DB::table('users')->get();
@endphp

<!DOCTYPE html>
<html lang="en">


<!--style-->
@include('includes.sidebarCSS')
<style>
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


<body>
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
    <!--select * from users -->
    <table class="table table-secondary table-striped table-bordered">
        <tr>
            <td colspan="9" style="text-align: center"> <h3> Doctors : </h3> </td>
        </tr>
        <tr>
             <th>#</th>
             <th>Nom</th>
             <th>Prenom</th>
             <th>Ville</th>
             <th>Profil</th>
             <th>Tel</th>
             <th>Email</th>
             <th>Specialite</th>
             <th>Delete</th>
         </tr>
     @foreach ($lists2 as $item)
     @if($item->profil==('Doctor'))
           <tr>
               <th>{{$item->id}}</th>
               <td>{{$item->nom}}</td>
               <td>{{$item->prenom}}</td>
               <td>{{$item->ville}}</td>
               <td>{{$item->profil}}</td>
               <td>{{$item->tel}}</td>
               <td>{{$item->email}}</td>
               <td>{{$item->specialite}}</td>
               <td><a href="users/delete/{{$item->id}}" class="text-danger"><i class="bi bi-trash text-danger"></i><strong>Delete</strong> </a></td>
           </tr>
     @endif
     @endforeach
 </table>


 <table class="table table-secondary table-striped table-bordered">
    <tr>
        <td colspan="8" style="text-align: center"> <h3>Users : </h3> </td>
    </tr>
    <tr>
         <th>#</th>
         <th>Nom</th>
         <th>Prenom</th>
         <th>Ville</th>
         <th>Profil</th>
         <th>Tel</th>
         <th>Email</th>
         <th>Delete</th>
     </tr>
 @foreach ($lists2 as $item)
 @if($item->profil==('Patient'))
       <tr>
           <th>{{$item->id}}</th>
           <td>{{$item->nom}}</td>
           <td>{{$item->prenom}}</td>
           <td>{{$item->ville}}</td>
           <td>{{$item->profil}}</td>
           <td>{{$item->tel}}</td>
           <td>{{$item->email}}</td>
           <td><a href="users/delete/{{$item->id}}" class="text-danger"><i class="bi bi-trash text-danger"></i><strong>Delete</strong> </a></td>
       </tr>
 @endif
 @endforeach
</table>



         
     </div>
     <!--End of Page Content  -->
 
 
</div>

 @include('includes.scripts')
</body>
</html>
