@extends('backend.layouts.app')

@section('content')
    <b-container>
        <article-edit-form :url="`{{ route('backend.article.update', $article->id) }}`" :article-data="{{ json_encode($article) }}" :upload-url="`{{ route('backend.article.upload') }}`" :main-url="`{{ route('backend.article.index') }}`">
        </article-edit-form>
    </b-container>
@endsection
