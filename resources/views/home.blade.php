@extends('../layouts/frontend')  <!--Exportamos heredamos el contenido del la hoja frontend.blade.php -->
<!--Para agregar el contenido -->
@section('content')


<h1>hola desde mi vista .blade</h1>

<hr>
<h2>{{$valor}}</h2>
<hr>
{{$numero}}
<hr>

<!--Codigo php en Blade-->
@php



    $contador=1;

@endphp
<!--Fin codigo php en Blade-->

<h4>{{$contador}}</h4>
<hr>     
<hr>


<!--if en php-->
@if($numero==12)

<h3>si el numero es {{$numero}}</h3>

@else

<h3>No el numero es {{$numero}}</h3>

@endif
<!--fin if en php-->


<!--switch en php-->
@switch($numero)
    @case(1)
       
        @break
    @case(2)
    
        @break
    @case(12)
    
    <h3>Si switch llego a  {{$numero}}</h3>

        @break
    @default
@endswitch
<!--fin switch en php-->


<!--Operador ternario-->
<h3>{{ ($numero==12) ? 'es 12 desde el operador ternario':'no es 12 desde el operador ternario'}}</h3>


<!-- Loops or for in PHP -->
<ul>
@for ($i = 1; $i < 10; $i++)

<li>{{$i}}</li>

@endfor
<ul>
<!-- FIN Loops in PHP -->


<!--foreach con array-->
<ul>
@foreach($paises as $pais)
<li>Primer valor: {{$loop->first}}    Ultimo valor: {{$loop->last}}    Indice: {{$loop->index}}       {{$pais['nombre'].' | '.$pais['dominio']}}</li>
@endforeach
</ul>
<!--Fin foreach con array-->


<!--Agregar un vista dentro de otra vista-->
@include('incluido')
<!--Fin Agregar un vista dentro de otra vista-->

<!-- inicio Agregar componentes-->

<strong>Componente ejemplo:</strong><br>
<x-componentejemplo :mensaje="$numero"/>
<!-- Fin Agregar componentes-->

<strong>ejemplo de enlaces con Laravel y pasar parametros:</strong><br>
<ul>
<li><a href="{{route('home_inicio')}}"></a>Inicio</li>
<li><a href="{{route('home_incluido')}}">Inluido</a></li>
<li><a href="{{route('home_parametros',['id'=>1, 'slug'=>'mi-slug'])}}?page=1">Parametros</a></li>
</ul>



<strong>Archivos estaticos</strong><br>
<img src="{{asset('img/logo.png')}}" alt="" width="100">


<!--Fin Exportamos heredamos el contenido del la hoja frontend.blade.php -->
@endsection <!-- Importante esto es del layouts -->