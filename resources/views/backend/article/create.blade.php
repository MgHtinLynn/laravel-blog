@extends('backend.layouts.app')

@section('content')
    <b-container fluid>
        <article-create-form :url="`{{ route('backend.article.store') }}`" :user-id="`{{ auth()->id() }}`" :upload-url="`{{ route('backend.article.upload') }}`" :image-url="`{{ asset('/images/sample.jpeg') }}`">
        </article-create-form>
    </b-container>
@endsection
