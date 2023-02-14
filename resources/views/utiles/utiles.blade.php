@extends('../layouts/frontend')


<!--Para agregar el contenido -->
@section('content')

<main class="container">
<h3>Utiles   <small style="font-size: 12px;">utiles.blade.php</small></h3>

<!--Codigo php en Blade-->
@php

//print_r($datos);

@endphp
<!--Fin codigo php en Blade-->




<div class="clearfix">&nbsp; </div>


<div class="container">
    <div class="row">
      <div class="col-sm">
        
      </div>
      <div class="col-sm">

        <ul class="list-group list-unstyled">
            <li> <a href="{{route('utiles_pdf')}}" class="list-group-item list-group-item-action rounded-1">Reporte PDF</a> </li>
            <li> <a href="{{route('utiles_excel')}}" class="list-group-item list-group-item-action rounded rounded-1">Reporte excel</a> </li>
            <li> <a href="" class="list-group-item list-group-item-action rounded rounded-1 active">Cliente Rest con Guzzlehttp</a> </li>
            <li> <a href="" class="list-group-item list-group-item-action rounded rounded-1">Cliente SOAP </a> </li>
        </ul>




      </div>
      <div class="col-sm">
        
      </div>
    </div>
  </div>



  <div class="clearfix">&nbsp; </div>




</main>
<!--Fin Exportamos heredamos el contenido del la hoja frontend.blade.php -->
@endsection <!-- Importante esto es del layouts -->