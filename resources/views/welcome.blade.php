@extends ('layout')

@section('content')
    <?php foreach($posts as $post) : ?>
    <article>
        <h1><a href="post/{{$post->title}}"> {{ $post->title }}</a></h1>
        <p> {{ $post->excrept }} </p>
    </article>
    <?php endforeach?> 
@endsection