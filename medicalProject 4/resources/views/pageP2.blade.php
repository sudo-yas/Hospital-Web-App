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
    
    <h1>This is a Patient Dashboard Page 2 </h1>
    

    <p>Hello {{$data->nom .' '. $data->prenom}} email : {{ session()->get('email',$data->email) }} </p><br>

    <a href="/dashboardP"> Dashboard </a><br>
    <a href="{{ route('pagep1') }}"> Page 1 </a><br>
    <a href="{{ route('pagep2') }}"> Page 2 </a><br><br>


    @include('includes.scripts')
</body>
</html>