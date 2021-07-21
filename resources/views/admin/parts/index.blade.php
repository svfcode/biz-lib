@extends('layouts.default')

@section('title', 'Admin - Part Index')

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">
        @include('admin.components.nav')

        <h2 class="text-2xl text-center">
            Part Admin Index
            <span class="text-base">Total books {{ $books_count }}</span>
        </h2>

        @include('admin.parts.cards', [$parts])
    </div>
@endsection
