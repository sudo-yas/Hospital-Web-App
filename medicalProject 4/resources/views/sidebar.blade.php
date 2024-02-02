@php
$data = 'App\models\User'::where('id','=',Session::get('loginId'))->first();
@endphp

<html>

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
    @include('includes.header')
</head>

<body>
    

@include('includes.navbar')
<br><br><br><br><br>

<div class="wrapper">
    
    <!-- Sidebar  -->
    <nav id="sidebar">
        
        <div class="sidebar-header">
            <h3>NOM et Prenom</h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="">Home</a>
            <li>
                <a href="">Dashboard</a>
            </li>
            <li>
                <a href="">Home</a>
            </li>
            <li>
                <a href="">Pages</a>
            </li>
            <li>
                <a href="">Contact</a>
            </li>
        </ul>

    </nav>
    <!-- End of Sidebar  -->



    <!-- Page Content  -->
    <div id="content">

        <div class="line"></div>
        <h2>Lorem Content</h2>
        <p>Lorem Content, </p>

        
    </div>
    <!--End of Page Content  -->


</div>
    @include('includes.scripts')
</body>
</html>