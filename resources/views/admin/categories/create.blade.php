@extends('admin.categories.layouts.create-or-edit')

@section("page-title")
Create new category
@endsection

@section('form-action')
    {{  route('admin.categories.store') }}
@endsection

@section('form-method')
    @method("POST")
@endsection
