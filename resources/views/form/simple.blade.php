@extends('../layouts/frontend')

@section('content')

<h3 class="pb-4 mb-4 fst-italic border-bottom">FORM SIMPLE</h3>

<div class="p-4 p-md-5 mb-4 text-white rounded bg-light">
<form action="{{route('Simple_Post')}}" method="POST" name="form">

    <!--Component-->
    <x-flash/>
    <div class="mb-3">
        <label for="nombre" class="form-label text-dark">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{'nombre'}}" />
      
    </div>

    <div class="mb-3">
        <label for="correo" class="form-label text-dark">E-Mail</label>
        <input type="text" name="correo" id="correo" class="form-control" value="{{'correo'}}" />
    </div>


    <div class="mb-3">
        <label for="descripcion" class="form-label text-dark">Descripción</label>
       <textarea name="descripcion" id="descripcion" cols="30" class="form-control" value="{{'descripcion'}}"></textarea>
    </div>


    <div class="mb-3">
        <label for="password" class="form-label text-dark">Password</label>
        <input type="password" name="password" id="password" class="form-control" />
        <div id="passwordHelpBlock" class="form-text text-secondary">
            Your password must be 6-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
          </div>
    </div>


    {{ csrf_field() }}
    <input type="submit" value="Enviar" class="btn btn-primary">



</form>
</div>


@endsection