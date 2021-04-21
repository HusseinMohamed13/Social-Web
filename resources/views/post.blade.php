@extends ('layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    {!! $post->body !!}
    <h1> <a href="/"> go back </h1> 
@endsection