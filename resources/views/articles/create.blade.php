@extends('app')


@section('content')
	
<h2>Add A New</h2>


{!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}

    @include('articles.form', ['submitButtonText' => 'Add Article'])

{!! Form::close() !!}


@include('errors/list')



@stop

	

@section('footer')
	

@stop