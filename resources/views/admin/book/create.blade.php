@extends('layouts.default')

@section('title', 'Admin - Book create')

@section('content')

    <div class="md:container md:mx-auto px-4 mt-8">
        @include('admin.components.nav')

        @include('admin.components.errors', [$errors])

        <h2 class="text-2xl text-center">Book Admin Create</h2>

        <form action="/admin/books" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td><label for="partid">category</label></td>
                    <td>
                        <select name="partid" id="partid" class="border rounded p-2">
                            @foreach ($parts as $part)
                                @if ($part->id == old('partid'))
                                    <option value="{{ $part->id }}" selected>{{ $part->title }}</option>
                                @else
                                    <option value="{{ $part->id }}">{{ $part->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="title">title</label></td>
                    <td><input type="text" name="title" id="title" class="border rounded p-2" value="{{ old('title') }}"></td>
                </tr>
                <tr>
                    <td><label for="author">author</label></td>
                    <td><input type="text" name="author" id="author" class="border rounded p-2" value="{{ old('author') }}"></td>
                </tr>
                <tr>
                    <td><label for="year">year</label></td>
                    <td><input type="number" name="year" id="year" class="border rounded p-2" value="{{ old('year') }}"></td>
                </tr>
                <tr>
                    <td><label for="description" class="mr-2">description</label></td>
                    <td>
                        <textarea name="description" id="description"
                            cols="50" rows="3" class="border rounded p-2">{{ old('description') }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="image">image</label></td>
                    <td>
                        <input type="file" name="image" id="image"> <br>
                    </td>
                </tr>
                <tr>
                    <td><label for="book">book</label></td>
                    <td>
                        <input type="file" name="book" id="book"> <br>
                    </td>
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

    </div>
@endsection
