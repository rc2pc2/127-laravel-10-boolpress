
@extends('layouts.admin')

@section("page-title")
Showing {{ $post->title }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 p-3">
            <h2>{{ $post->id }}: {{ $post->title }} </h2>
            @if ($post->category)
                <h2 class="d-inline-block px-3 rounded"style="background: {{ $post->category->color }}" >{{ $post->category->name }} </h2>
            @endif
            <p>
                @forelse ( $post->tags as $tag )
                    <span class="badge rounded-pill" style="background-color: {{ $tag->color }}">{{ $tag->name }}</span>
                @empty
                    <td>No tags</td>
                @endforelse
            </p>
            <h3><em>Written by {{ $post->user->name }}</em> </h3>
            <div class="image">
                @if( str_starts_with($post->image, "http"))
                    <img src="{{ $post->image  }}" alt="{{ $post->title }} post image" class="img-fluid">
                @else
                    <img src="{{ asset('storage/' . $post->image ) }}" alt="{{ $post->title }} post image" class="img-fluid">
                @endif
                </div>
            <h4>{{ $post->date }} </h4>
            <p>
                {{ $post->content }}
            </p>
            <footer class="card-footer">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary btn-sm">Return to posts list</a>
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline-block form-destroyer" data-post-title="{{ $post->title }}">
                    @method("delete")
                    @csrf

                    <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                </form>
            </footer>
        </div>
    </div>
</div>
@endsection


@section('additional-scripts')
    @vite('resources/js/posts/delete-index-confirmation.js')
@endsection

