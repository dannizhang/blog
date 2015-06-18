@extends('app')


@section('content')
	
@stop

<h2>Article</h2>

@section('footer')
	
		<article>
			<h2>{{ $article->title }}</h2>

			<div>
				{{ $article->body }}
			</div>

		</article>

		@unless($article->tags->isEmpty())
			<h5>Tags:</h5>
			<ul>
				@foreach($article->tags as $tag)
					<li>{{ $tag->name }}</li>
				@endforeach
			</ul>
		@endunless
@stop