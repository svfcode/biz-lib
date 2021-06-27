@extends('layouts.default')

@section('title', {{ 'Все книги из раздела '.$partTitle }})
@section('description', {{ 'Книги для образования по теме '.$partTitle }})

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">
        <h1 class="text-2xl text-center">Категории книг из раздела {{ $partTitle }}</h1>
        @include('parts.cardscat', ['parts' => $cats, 'partSlug'])
    </div>
@endsection
