
@extends('layouts.admin')

@section("page-title", "List of all the posts")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- @dump(Auth::user())
        @dump(Auth::user()->isAdmin()) --}}
        <div class="col-12">
            <table class="table table-hover table-striped mb-4 p-3">
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            Author
                        </th>
                        <th scope="col">
                            Category
                        </th>
                        <th scope="col">
                            Tags
                        </th>
                        <th scope="col">
                            Title
                        </th>
                        <th scope="col">
                            Date
                        </th>
                        <th scope="col">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }} </td>
                        <td><strong>{{ $post->user->name }}</strong></td>
                        @if ($post->category)
                            <td>
                                <a href="{{ route("admin.categories.show", $post->category) }}" class="badge text-decoration-none p-2" style="background-color: {{ $post->category->color }}">
                                    {{ $post->category->name }}
                                </a>
                            </td>
                        @else
                            <td>----</td>
                        @endif

                        <td>
                            @forelse ( $post->tags as $tag )
                                <span class="badge rounded-pill" style="background-color: {{ $tag->color }}">{{ $tag->name }}</span>
                            @empty
                                <td>No tags</td>
                            @endforelse
                        </td>

                        <td><em>{{ $post->title }}</em></td>
                        <td>{{ $post->date }} </td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline-block form-destroyer" data-post-title="{{ $post->title }}">
                                @method("delete")
                                @csrf

                                <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $posts->links(); }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('additional-scripts')
    @vite('resources/js/posts/delete-index-confirmation.js')
@endsection
