@extends('../layouts/frontend')  <!--Exportamos heredamos el contenido del la hoja frontend.blade.php -->

<!--Inicio Para agregar el contenido -->
@section('content')

<h2>Ejemplo de stack<h2>
<a href="{{asset('/img/playa.jpg')}}" class="fancybox" id="example0">

<img src="{{asset('/img/playa.jpg')}}" width="400" alt="Playa">
</a>



<div id="content">
	<h1>fancybox <span>v1.3.4</span></h1>

	<p>This is a demonstration. <a href="http://fancybox.net">Home page</a></p>

	<hr />

	<p>
		Different animations<br />

		<a id="example1" href="{{asset('/img/playa.jpg')}}"><img alt="example1" src="{{asset('/img/playa.jpg')}}" width="100" /></a>

		<a id="example2" href="{{asset('/img/playa.jpg')}}"><img alt="example2" src="{{asset('/img/playa.jpg')}}" width="100" /></a>

		<a id="example3" href="{{asset('/img/playa.jpg')}}"><img alt="example3" src="{{asset('/img/playa.jpg')}}" width="100" /></a>
		
		<a id="example4" href="{{asset('/img/playa.jpg')}}"><img class="last" alt="example4" src="{{asset('/img/playa.jpg')}}" width="100"/></a>
	</p>

	<p>
		Different title positions<br />

		<a id="example5" href="{{asset('/img/playa.jpg')}}" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit.">
        <img alt="example4" src="{{asset('/img/playa.jpg')}}" width="100" /></a>
		
		<a id="example6" href="{{asset('/img/playa.jpg')}}" title="Etiam quis mi eu elit tempor facilisis id et neque. Nulla sit amet sem sapien. Vestibulum imperdiet porta ante ac ornare. Vivamus fringilla congue laoreet.">
        <img alt="example5" src="{{asset('/img/playa.jpg')}}" width="100" /></a>

		<a id="example7" href="{{asset('/img/playa.jpg')}}" title="Cras neque mi, semper at interdum id, dapibus in leo. Suspendisse nunc leo, eleifend sit amet iaculis et, cursus sed turpis.">
        <img alt="example6" src="{{asset('/img/playa.jpg')}}" width="100" /></a>

		<a id="example8" href="{{asset('/img/playa.jpg')}}" title="Sed vel sapien vel sem tempus placerat eu ut tortor. Nulla facilisi. Sed adipiscing, turpis ut cursus molestie, sem eros viverra mauris, quis sollicitudin sapien enim nec est. ras pulvinar placerat diam eu consectetur.">
        <img class="last" alt="example7" src="{{asset('/img/playa.jpg')}}" width="100" /></a>
	</p>

	<p>
		Image gallery (ps, try using mouse scroll wheel)<br />

		<a rel="example_group" href="{{asset('/img/playa.jpg')}}" title="Lorem ipsum dolor sit amet">
            <img alt="" src="{{asset('/img/playa.jpg')}}" width="100" /></a>

		<a rel="example_group" href="{{asset('/img/playa.jpg')}}" title="">
            <img alt="" src="{{asset('/img/playa.jpg')}}" width="100" /></a>

		<a rel="example_group" href="{{asset('/img/playa.jpg')}}" title="">
            <img alt="" src="{{asset('/img/playa.jpg')}}" width="100" /></a>
		
		<a rel="example_group" href=".{{asset('/img/playa.jpg')}}" title="">
            <img class="last" alt="" src="{{asset('/img/playa.jpg')}}" width="100" /></a>
	</p>

	<p>
		Various examples
	</p>

	<ul>
		<li><a id="various1" href="#inline1" title="Lorem ipsum dolor sit amet">Inline</a></li>
		<li><a id="various2" href="ajax.txt">Ajax</a></li>
		<li><a id="various3" href="http://google.ca">Iframe</a></li>
		<li><a id="various4" href="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf">Swf</a></li>
	</ul>

	<div style="display: none;">
		<div id="inline1" style="width:400px;height:100px;overflow:auto;">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis mi eu elit tempor facilisis id et neque. Nulla sit amet sem sapien. Vestibulum imperdiet porta ante ac ornare. Nulla et lorem eu nibh adipiscing ultricies nec at lacus. Cras laoreet ultricies sem, at blandit mi eleifend aliquam. Nunc enim ipsum, vehicula non pretium varius, cursus ac tortor. Vivamus fringilla congue laoreet. Quisque ultrices sodales orci, quis rhoncus justo auctor in. Phasellus dui eros, bibendum eu feugiat ornare, faucibus eu mi. Nunc aliquet tempus sem, id aliquam diam varius ac. Maecenas nisl nunc, molestie vitae eleifend vel, iaculis sed magna. Aenean tempus lacus vitae orci posuere porttitor eget non felis. Donec lectus elit, aliquam nec eleifend sit amet, vestibulum sed nunc.
		</div>
	</div>

	<p>
		Ajax example will not run from your local computer and requires a server to run.
	</p>
	<p>
		Photo Credit: <a href="http://www.flickr.com/people/kharied/">Katie Harris</a>
	</p>
</div>



















@endsection
<!--Fin Para agregar el contenido -->



<!-- Inicio css  -->
@push('css')



<link rel="stylesheet" href="{{asset('/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css')}}" />
<link rel="stylesheet" href="{{asset('/jquery.fancybox-1.3.4/style.css')}}" />




@endpush
<!-- fin css  -->

<!-- Inicio js-->
@push('js')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"> </script>
<script src="{{asset('/jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js')}}"> </script>
<script src="{{asset('/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js')}}"> </script>
<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/
            $("a#example0").fancybox();

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	
</script>
@endpush
<!-- Fin Inicio js-->