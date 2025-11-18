@extends('layouts.web')
@section('meta_title', $term->getLocalizedMetaTitle())
@section('meta_desc', $term->getLocalizedMetaDescription())
@section('meta_keyword', $term->getLocalizedMetaKeywords())
@section('content')
<div class="privacy-policy-section">
    <h1 style="text-align:center;font-size: 50px;">{{ $term->getLocalizedTitle() }}</h1>
    <p>
        {!! $term->getLocalizedDescription() !!}
    </p>
</div>
@endsection