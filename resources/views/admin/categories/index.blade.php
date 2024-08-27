
@extends('layouts.admin')

@section("page-title", "List of all posts categories")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>
                Categories:
            </h2>
            <table class="table table-hover table-striped mb-4 p-3">
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Color
                        </th>
                        <th scope="col">
                            Number of posts
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }} </td>
                        <td>{{ $category->name }} </td>
                        <td>{{ $category->color }} </td>
                        <td>{{ count($category->posts) }} </td>
                        <td>
                            <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline-block form-destroyer" data-category-name="{{ $category->name }}">
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
                {{ $categories->links(); }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('additional-scripts')
    @vite('resources/js/categories/delete-index-confirmation.js')
@endsection
