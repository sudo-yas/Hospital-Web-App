@php
   $data = 'App\models\User'::where('id','=',Session::get('loginId'))->first(); 
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DashP</title>
    @include('includes.header')
</head>
<body>
    <!-- ======= Header ======= -->
    @include('includes.navbar')
    <br><br><br><br><br><br><br>

    <h1>Your Appointements</h1>



    @include('includes.scripts')
</body>
</html>