 <!--Inicio para hacer flash-->
 @if(Session::has('name_img')) 

<div class="alert" role="alert">
<a href="{{asset('/uploads/picture')}}/{{ Session::get('name_img') }}" target="new_blank">
<img src="{{asset('/uploads/picture')}}/{{ Session::get('name_img') }}" class="rounded mx-auto d-block" alt="...">  
</a>  
</div>

 @endif
  <!--Fin Inicio para hacer flash-->
