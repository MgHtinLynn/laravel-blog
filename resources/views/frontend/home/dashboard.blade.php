@extends('frontend.layouts.app')

@section('content')
    <b-container>
        <b-row>
            <b-col md="7">
                <h1 class="mb-3">Article List</h1>
                <dashboard-article-list :url="`{{ route('backend.article.list') }}`"></dashboard-article-list>
            </b-col>
            <div class="hr-hz"></div>
            <b-col md="3">
                <h1 class="mb-3">Recommend List</h1>
                <recommend-article-list :url="`{{ route('article.recommend.list') }}`"></recommend-article-list>
            </b-col>
        </b-row>

    </b-container>
@endsection
