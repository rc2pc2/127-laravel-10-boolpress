
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 p-3">
            <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                @yield('form-method')
                @csrf

                <div class="mb-3">
                    <h2>
                        @yield('page-title')
                    </h2>
                </div>

                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control mb-2" minlength="4" maxlength="255" required
                        value="{{ old('title', $post->title) }}"
                    >
                    @error("title")
                        <div class="alert alert-danger mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    @error("category_id")
                        <div class="alert alert-danger mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="category_id">Category:</label>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        @foreach ( $categories as $category )
                            <option value="{{ $category->id }}"
                                {{ ($category->id == old("category_id", $post->category_id)) ? "selected" : "" }}
                                >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    @error("tags")
                        <div class="alert alert-danger mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="btn-group d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group">
                        @foreach ( $tags as $tag )
                            @if($errors->any())
                                <input name="tags[]" type="checkbox" class="btn-check" id="tag-check-{{ $tag->id }}" autocomplete="off"
                                value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? "checked" : '' }}>
                            @else
                                <input name="tags[]" type="checkbox" class="btn-check" id="tag-check-{{ $tag->id }}" autocomplete="off"
                                value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? "checked" : '' }}>
                            @enderror
                            <label class="btn btn-outline-primary mb-2" for="tag-check-{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                </div>


                <div class="mb-3">
                    <label for="image">Image url</label>
                    <input type="file" name="image" id="image" class="form-control mb-2" minlength="4" maxlength="255" required
                        value="{{ old('image', $post->image) }}"
                    >
                    @error("image")
                        <div class="alert alert-danger mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content">Post content</label>
                    <textarea name="content" id="content" rows="16" class="form-control mb-2" minlength="20" required >{{ old('content', $post->content) }}</textarea>
                    @error("content")
                        <div class="alert alert-danger mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="submit" value="@yield('page-title')" class="btn btn-primary btn-lg me-3">
                <input type="reset" value="Reset fields" class="btn btn-warning btn-lg">
            </form>
        </div>
    </div>
</div>
@endsection
