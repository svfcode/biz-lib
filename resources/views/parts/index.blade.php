@extends('layouts.default')

@section('title', 'Все книги по разделам')
@section('description', 'Книги для образования сгруппированные по разделам')

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">
        <h1 class="text-2xl text-center">Все книги по разделам</h1>
        @include('parts.cards', [$parts])
    </div>
@endsection
