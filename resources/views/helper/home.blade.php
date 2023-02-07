@extends('../layouts/frontend')


<!--Para agregar el contenido -->
@section('content')


<h3>OK HELPER</h3>

<hr />
{{$version}}

{{Helpers::getName("César")}}


@endsection <!-- Importante esto es del layouts -->