@extends('master_layout')

@section('content')
    <h1>All Posts</h1>
    <div class="main-content">
        <ul>
            @foreach ($posts as $post)
                <li>

                    {{--
                    <a href="{{ route('single_post', ['id' => $post->id]) }}">
                        {{ $post->title }}
                    </a>
                    --}}

                    <h3>
                        <a href="{{ route('view-post', ['id' => $post->id]) }}">
                            {{$post->title}}
                        </a>
                    </h3>

                    <p>Author: {{$post->user->name}}</p>

                    <p>{{$post->created_at->diffForHumans()}}</p>
                    <p>{{$post->content}}</p>


                </li>
            @endforeach
        </ul>
    </div>


@endsection
