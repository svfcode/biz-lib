@extends('layouts.default')

@section('title', "Все книги из раздела $cat->title")
@section('keywords', "$cat->title, книги, скачать")
@section('description', "Книги по теме $cat->title")

@section('content')
    @include('components.metrika')

    <div class="md:container md:mx-auto px-4 mt-8">
        <h1 class="text-2xl text-center">{{ $cat->title }}</h1>
        @include('books.table', ['cat', 'book'])
    </div>
@endsection
