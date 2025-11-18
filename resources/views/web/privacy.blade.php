@extends('layouts.web')
@section('meta_title', $privacy->getLocalizedMetaTitle())
@section('meta_desc', $privacy->getLocalizedMetaDescription())
@section('meta_keyword', $privacy->getLocalizedMetaKeywords())

@section('content')
    <div class="privacy-policy-section">
        <h1 style="text-align:center;font-size: 50px;">{{ $privacy->getLocalizedTitle() }}</h1>
        <p>
            {!! $privacy->getLocalizedDescription() !!}
        </p>
    </div>
@endsection