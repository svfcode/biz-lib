@extends('layouts.default')

@section('title', 'Главная')
@section('keywords', 'скачать, download, pdf, fb2, {{ $book->title }}, {{ $book->author }}')
@section('description', {{ 'Здесь можно скачать '.$book->title }})

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">

        <div class="book_show max-w-2xl m-auto mt-32">
            <h1 class="text-2xl text-center my-2"> {{ $book->title }} </h1>

            <div class="book_download">
                <button
                            class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                        >
                        <a href="/books/{{ $book->book }}" target="_blank" download><h2>Скачать</h2></a>
                        </button>
            </div>
        </div>

    </div>
@endsection
