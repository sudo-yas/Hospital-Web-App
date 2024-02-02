@php
   $data = 'App\Models\user'::where('id','=',Session::get('loginId'))->first();
   $use = DB::table('users')->get();
   $lists = DB::table('messages')->get();
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
            <td colspan="9" style="text-align: center"> <h3> All messages : </h3> </td>
        </tr>
        <tr>
             <th>N°</th>
             <th>Temps</th>
             <th>Expéditeur</th>
             <th>Destinataire</th>
             <th>Tel_expediteur</th>
             <th>Objet</th>
             <th>Contenu</th>
             <th>Delete</th>
         </tr>
     @foreach ($lists as $item)  
           <tr>
               <th>{{$item->id}}</th>
               <th>{{$item->created_at}}</th>

               <?php $i=0 ?>
                @foreach ($use as $us)  
                 @if($item->id_exp == $us->id)
                   <td>{{$us->nom.''.$us->prenom}}</td>
                   <?php $i++ ?>
                 @endif
               @endforeach
                <?php 
              if($i == 0)
              {?>
               <td>A été supprimé</td>
             <?php ;}
               ?>

               <?php $i=0 ?>
               @foreach ($use as $us)  
                 @if($item->id_des == $us->id)
                   <td>{{$us->nom.''.$us->prenom}}</td>
                   <?php $i++ ?>
                 @endif
               @endforeach
              <?php 
              if($i == 0)
              {?>
               <td>A été supprimé</td>
             <?php ;}
               ?>
               
               <td>{{$item->tel}}</td>
               <td>{{$item->objet}}</td>
               <td>{{$item->contenu}}</td>
              
               <td><a href="messages/delete/{{$item->id}}" class="text-danger"><i class="bi bi-trash text-danger"></i><strong>Delete</strong> </a></td>
           </tr>
     
     @endforeach
 </table>


 


         
     </div>
     <!--End of Page Content  -->
 
 
</div>

 @include('includes.scripts')
</body>
</html>
