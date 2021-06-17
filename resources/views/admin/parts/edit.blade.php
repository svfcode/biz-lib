@extends('layouts.default')

@section('title', 'Admin - Part create')

@section('content')

    <div class="md:container md:mx-auto px-4 mt-8">
        @include('admin.components.nav')

        @include('admin.components.errors', [$errors])

        <h2 class="text-2xl text-center">Part Admin Update</h2>

        <form action="/admin/parts/{{ $part->slug }}" method="POST">
            @method('PATCH')
            @csrf
            <table>
                <tr>
                    <td><label for="title">title</label></td>
                    <td><input type="text" name="title" id="title" class="border rounded p-2" value="{{ $part->title }}"></td>
                </tr>
                <tr>
                    <td><label for="subtitle">subtitle</label></td>
                    <td><input type="text" name="subtitle" id="subtitle" class="border rounded p-2" value="{{ $part->subtitle }}"></td>
                </tr>
                <tr>
                    <td><label for="slug">slug</label></td>
                    <td><input type="text" name="slug" id="slug" class="border rounded p-2" value="{{ $part->slug }}"></td>
                </tr>
                <tr>
                    <td><label for="description" class="mr-2">description</label></td>
                    <td>
                        <textarea name="description" id="description"
                            cols="50" rows="3" class="border rounded p-2"> {{ $part->description }} </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="file" name="image"> <br>
                    </td>
                </tr>
                <tr>
                    <td><label for="imgalt">imgalt</label></td>
                    <td><input type="text" name="imgalt" id="imgalt" class="border rounded p-2" value="{{ $part->imgalt }}"></td>
                </tr>
                <tr>
                    <td>
                        <button
                            type="submit"
                            class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                        >
                        Save
                        </button>
                    </td>
                </tr>
            </table>
        </form>

        <form action="/admin/parts/{{ $part->slug }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
            >
                Delete
            </button>
        </form>

    </div>
@endsection
