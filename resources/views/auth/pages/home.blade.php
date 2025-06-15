@extends('auth.layouts.lp')

@section('title', 'Dinas Pendidikan Majalengka')

@section('content')
    <div class="relative overflow-hidden">
        @include('auth.components.home.jumbotron')
        @include('auth.components.home.news')
        @include('auth.components.home.service')
    </div>
@endsection

@section('meta')
    <meta name=title content="Dinas Pendidikan Majalengka">
    <meta name="description" content="Dinas Pendidikan Majalengka">
    <meta name="keywords" content="Dinas Pendidikan Majalengka">
    <meta name="author" content="Dinas Pendidikan Majalengka">

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "url": "{{ config('app.url') }}",
            }
    </script>
@endsection
