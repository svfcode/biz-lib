<div class="book_table_wrap my-8 flex flex-wrap">

    @foreach ($books as $book)


        <div class="book_wrap border shadow rounded p-4 max-w-md m-auto mt-4 hover:border-green-500">
        <a href="/{{ Request::path() }}/{{ $book->slug }}">
            <div class="book_name hover:underline">
                {{ $book->title }}
                <span class="bg-blue-400 border border-blue-700 p-1 rounded text-sm ml-2">
                    {{ $book->year }}
                </span>
                <span class="bg-blue-400 border border-blue-700 p-1 rounded text-sm ml-2">
                    {{ $book->author }}
                </span>
            </div>
            <div class="book_desc text-opacity-40 text-sm mt-4">
                <p class="flex">
                    <span class="">
                        <img src="/img/books/{{ $book->img }}" alt="{{ $book->imgalt }}" class="mr-4 mb-2 w-1/2 float-left">
                        {{ Illuminate\Support\Str::limit($book->description, 300) }}
                    </span>
                </p>
            </div>
        </a>

        <div class="service">
            <a href="/admin/books/{{ $book->slug }}/edit">
                <div class="border-2 border-yellow-600 rounded-lg px-3 py-2 text-yellow-400 cursor-pointer hover:bg-yellow-600 hover:text-yellow-200">
                    Update
                </div>
            </a>
        </div>

        </div>


    @endforeach

</div>
