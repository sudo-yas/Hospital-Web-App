@php
  $data = 'App\models\user'::where('id','=',Session::get('loginId'))->first();
 
  $lists = DB::table('users')->get();
  $lists2 = DB::table('messages')->get();
@endphp

<!--  /*$lists = DB::table('appointments')->where('id_medecin','=',Session::get('loginId'))->get();*/-->
  
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

    
    <style>
      .modal {
        display: none;
        position: fixed;
        z-index: 8;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
      }
      .modal-content {
        margin: 50px auto;
        border: 1px solid #999;
        width: 60%;
      }
      h2,
      p {
        margin: 0 0 20px;
        font-weight: 400;
        color: #999;
      }
      span {
        color: #666;
        display: block;
        padding: 0 0 5px;
      }
      form {
        padding: 100px;
        margin: 15px;
        box-shadow: 0 2px 5px #f5f5f5;
        background: #eee;
      }
      input,
      textarea {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #1c87c9;
        outline: none;
      }
      .contact-form button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #1c87c9;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
      }
      button:hover {
        background: #2371a0;
      }
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
      button.button {
        background: none;
        border-top: none;
        outline: none;
        border-right: none;
        border-left: none;
        border-bottom: #02274a 1px solid;
        padding: 0 0 3px 0;
        font-size: 16px;
        cursor: pointer;
      }
      button.button:hover {
        border-bottom: #a99567 1px solid;
        color: #a99567;
      }
    </style>

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
            <hr>
            <h2>Your Messages reçus: </h2>
            <table class="table">
                <tr>
                    <th>N°</th>
                    <th>Temps</th>
                    <th>Sender</th>
                    <th>Distinataire</th>
                    <th>Téléphone</th>
                    <th>Objet</th>
                    <th>Contenu</th>
                    <th>Reponde</th>
                </tr>
               
                @foreach($lists2 as $item)    
                  @if ($data->id == $item->id_des)
                 
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->created_at}}</td>
                   
                   <?php $i=0 ?>
                    @foreach ($lists as $us)
                     @if ($us->id == $item->id_exp)
                    <td>{{$us->nom.' '.$us->prenom}}</td>
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
                    @foreach ($lists as $us)
                     @if ($us->id == $item->id_des)
                      <td>{{$us->nom.' '.$us->prenom}}</td>
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
                    <td><button class="button" data-modal="modalOne">Reponde</button></td>
                </tr>
              
                   @endif
                  @endforeach
                
            </table>

            <br><hr>
            <h2>Your Messages envoyés: </h2>
            <table class="table">
                <tr>
                    <th>N°</th>
                    <th>Temps</th>
                    <th>Sender</th>
                    <th>Distinataire</th>
                    <th>Téléphone</th>
                    <th>Objet</th>
                    <th>Contenu</th>
                </tr>
               
                @foreach($lists2 as $item)    
                  @if ($data->id == $item->id_exp)
                 
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->created_at}}</td>

                    <?php $i=0 ?>
                    @foreach ($lists as $us)
                     @if ($us->id == $item->id_exp)
                    <td>{{$us->nom.' '.$us->prenom}}</td>
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
                    @foreach ($lists as $us)
                     @if ($us->id == $item->id_des)
                      <td>{{$us->nom.' '.$us->prenom}}</td>
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
                </tr>
              
                   @endif
                  @endforeach
                
            </table>
        </div>


          <!-- POPUP >
        <p> <button class="button" data-modal="modalOne">Contacter nous</button> </p -->
        <div id="modalOne" class="modal">
          <div class="modal-content">
            <div class="contact-form">
              <a class="close">&times;</a>

              <form action="{{ Route('Msg') }}" method="POST">
                @csrf
                
                <div>  
                  
                  <input class="form-control" type="hidden" name="id_exp" placeholder="Your Id" value="{{$data->id}}">
                  
                  <span>Select Patient<i class="bi bi-chevron-down"></i></span>
                  <select class="form-control" aria-placeholder="Select Patient" name="id_des" id="">
                    @foreach ($lists as $item)
                     @if($item->profil=='Patient')
                      <option value="{{$item->id}}"> {{$item->nom.' '.$item->prenom}}</option>
                     @endif
                    @endforeach
                  </select>
                  <span>Please Confirm the Patient name</span>
                  <select class="form-control" aria-placeholder=" Select Patient" name="id_des" id="">
                    @foreach ($lists as $item)
                     @if($item->profil=='Patient')
                      <option value="{{$item->id}}">{{$item->nom.' '.$item->prenom}}</option>
                     @endif
                    @endforeach
                  </select><br>

                  <input class="form-control" type="text" name="tel" placeholder="Phone Number" value="{{$data->tel}}"/>
                  <input class="form-control" type="text" name="objet" placeholder="Objet" >

                </div>
                <span>Message</span>
                <div> <textarea class="form-control" name="contenu" rows="4"></textarea> </div>
                <button class="form-control" type="submit" href="/">Send</button>
                
              </form>
            </div>
          </div>
        </div>
        
        <script>
          let modalBtns = [...document.querySelectorAll(".button")];
          modalBtns.forEach(function (btn) {
            btn.onclick = function () {
              let modal = btn.getAttribute("data-modal");
              document.getElementById(modal).style.display = "block";
            };
          });
          let closeBtns = [...document.querySelectorAll(".close")];
          closeBtns.forEach(function (btn) {
            btn.onclick = function () {
              let modal = btn.closest(".modal");
              modal.style.display = "none";
            };
          });
          window.onclick = function (event) {
            if (event.target.className === "modal") {
              event.target.style.display = "none";
            }
          };
        </script>
        <!-- POPUP  -->



    </div> 
    @include('includes.scripts')
</body>
</html>