@extends('layouts.default')

@section('title', 'Главная')

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">
        <h1 class="text-2xl text-center">{{ $cat->title }}</h1>
        @include('books.table', ['cat', 'book'])
    </div>
@endsection
