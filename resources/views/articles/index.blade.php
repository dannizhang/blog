@extends('app')


@section('content')
	
@stop

<h2>Articles</h2>

@section('footer')
	
	

	@foreach ($articles as $article)
		<article>
			<h2><a href="{{ url('/articles', $article->id) }}"> {{ $article->title }} </a></h2>
			
			<div>
				{{ $article->body }}
			</div>

		</article>
	@endforeach

@stop