@extends('../layouts/frontend')


<!--Para agregar el contenido -->
@section('content')

<main class="container">
    <x-flash/>
<h3>Registro   <small style="font-size: 12px;">registro.blade.php</small></h3>

<!--Codigo php en Blade-->
@php

//print_r($datos);

@endphp
<!--Fin codigo php en Blade-->


<form action="{{route('registro_login_post')}}" method="post">

<div class="mb-3">
  <label for="nombre" class="form-label">Name:</label>
  <input type="text"
    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" value="{{old('nombre')}}" placeholder="">
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>

<div class="mb-3">
    <label for="correo" class="form-label">E-mail</label>
    <input type="email"
      class="form-control" name="correo" id="correo" aria-describedby="helpId" value="{{old('correo')}}" placeholder="">
    <small id="helpId" class="form-text text-muted">Help text</small>
  </div>


  <div class="mb-3">
    <label for="telefono" class="form-label">Phone</label>
    <input type="number"
      class="form-control" name="telefono" id="telefono" aria-describedby="helpId" value="{{old('telefono')}}" placeholder="">
    <small id="helpId" class="form-text text-muted">Help text</small>
  </div>



  <div class="mb-3">
    <label for="direccion" class="form-label">address</label>
    <input type="text"
      class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="">
    <small id="helpId" class="form-text text-muted">Help text</small>
  </div>




  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="">
  </div>


  <div class="mb-3">
    <label for="password2" class="form-label">Password</label>
    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" id="password" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Send</button>

  {{csrf_field()}}
</form>

<hr>

</main>
<!--Fin Exportamos heredamos el contenido del la hoja frontend.blade.php -->
@endsection <!-- Importante esto es del layouts -->