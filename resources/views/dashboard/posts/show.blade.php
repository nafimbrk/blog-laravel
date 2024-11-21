@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

    {{-- <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p> --}}

    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left">back to all my posts</span></a>
    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit">edit</span></a>
    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('are you sure?')"><span data-feather="x-circle"></span>delete</button>
        </form>
@if ($post->image)
<div style="max-height: 350px; overflow:hidden;">
    <img src="{{ asset('storage/' . $post->image) }}" width="1200" height="400" alt="{{ $post->category->name }}" class="img-fluid mt-3">
</div>
@else
    <img src="img/dino.jpg" width="1200" height="400" alt="{{ $post->category->name }}" class="img-fluid mt-3">
@endif
    

    <article class="my-3 fs-5">
    {!! $post->body !!}
</article>

        </div>
    </div>
</div>
@endsection











