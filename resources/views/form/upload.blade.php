@extends('../layouts/frontend')

@section('content')
<div class="p-4 p-md-5 mb-4 text-white rounded bg-light">

<x-flash/>
<form action="{{route('Upload_post')}}" method="post" name="form" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="foto" class="form-label text-dark">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control" />
        <div id="passwordHelpBlock" class="form-text text-secondary">
            You can upload JPG, PNG, BMP, GIF images.
          </div>
    </div>



<!--token formulario-->
{{csrf_field()}}
<button type="submit" class="btn btn-primary">Send</button>
</form>


 <!--Inicio para hacer flash-->
<x-name-image-component />
  <!--Fin Inicio para hacer flash-->

</div>
@endsection