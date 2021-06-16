@extends('layouts.default')

@section('title', 'Главная')

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">
        <h2 class="text-2xl text-center">Разделы</h2>
        @include('parts.cards', [$parts])
    </div>
@endsection
