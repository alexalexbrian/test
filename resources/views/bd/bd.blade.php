@extends('../layouts/frontend')


<!--Para agregar el contenido -->
@section('content')

<main class="container">
<h3 title="eloquent">Mysql <small style="font-size: 12px;">bd_blade.php</small></h3>
<!--Codigo php en Blade-->
@php

//print_r($datos);

@endphp
<!--Fin codigo php en Blade-->

<ul>
    <li> <a href="{{route('bd_categorias')}}">Categorías</a> </li>
    <li> <a href="{{route('bd_productos')}}">Productos</a> </li>
</ul>




</main>
<!--Fin Exportamos heredamos el contenido del la hoja frontend.blade.php -->
@endsection <!-- Importante esto es del layouts -->