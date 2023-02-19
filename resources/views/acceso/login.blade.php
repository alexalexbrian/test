@extends('../layouts/frontend')


<!--Para agregar el contenido -->
@section('content')

<main class="container">
    <x-flash/>
<h3>Login   <small style="font-size: 12px;">login.blade.php</small></h3>

<!--Codigo php en Blade-->
@php

//print_r($datos);

@endphp
<!--Fin codigo php en Blade-->


<form action="{{route('acceso_login_post')}}" method="post">


<div class="mb-3">
    <label for="correo" class="form-label">E-mail</label>
    <input type="email"
      class="form-control" name="correo" id="correo" aria-describedby="helpId" value="{{old('correo')}}" placeholder="">
    <small id="helpId" class="form-text text-muted">Help text</small>
  </div>



  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="">
  </div>



  <button type="submit" class="btn btn-primary">Send</button>

  {{csrf_field()}}
</form>

<hr>

</main>
<!--Fin Exportamos heredamos el contenido del la hoja frontend.blade.php -->
@endsection <!-- Importante esto es del layouts -->