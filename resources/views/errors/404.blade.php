@extends('layouts.default')

@section('title', 'Все книги по разделам')
@section('description', 'Книги для образования сгруппированные по разделам')

@section('content')
    @include('components.metrika')

    <div class="md:container md:mx-auto px-4 mt-8">
        <h1 class="text-2xl text-center">Такой страницы не существует</h1>

        <div>
            <h2 class="mt-16">
                Но вы всегда можете начать с
                <a href="/" class="text-purple-700 hover:underline">главной страницы</a>
            </h2>
        </div>
    </div>
@endsection
