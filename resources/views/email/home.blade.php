@extends('../layouts/frontend')


<!--Para agregar el contenido -->
@section('content')

<main class="container">
<h2> correo </h2>
<x-flash/>
<a href="{{route('ViewMailSend')}}">Enviar</a>


</main>
<!--Fin Exportamos heredamos el contenido del la hoja frontend.blade.php -->
@endsection <!-- Importante esto es del layouts -->