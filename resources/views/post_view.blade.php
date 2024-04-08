@extends('master_layout')

@section('title', 'Post View')

@section('content')

    <div>
        <h1>{{ $post->title }}</h1>
        @foreach($topics as $topic)

            <span>{{ $topic->title }} | </span>
        @endforeach
        <p>{{ $post->created_at }}</p>
        <p>{{ $post->content }}</p>

        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            <div>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>


@endsection
