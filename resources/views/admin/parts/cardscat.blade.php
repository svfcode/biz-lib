<div class="cards my-8">
    <div class="cards_wrap flex flex-wrap flex-row justify-center">

        @foreach ($parts as $part)
            <div class="card_item w-full max-w-sm rounded-xl border border-gray-100 shadow-lg m-4">
                <a href="/admin/parts/{{ $partSlug }}/categories/{{ $part->slug }}">
                    <div class="card_img">
                        <img class="object-cover" src="/img/categories/{{ $part->img }}" alt="{{ $part->imgalt }}">
                    </div>
                    <div class="card_title ml-2">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                            {{ $part->title }}
                        </div>
                    </div>
                    <div class="card_subtitle ml-2">
                        <p class="mt-1 text-lg leading-tight font-medium text-black hover:underline">
                            {{ $part->subtitle }}
                        </p>
                    </div>
                    <div class="card_description mb-4 ml-2">
                        <p class="mt-2 text-gray-500">
                            {{ $part->description }}
                        </p>
                    </div>
                </a>

                <div class="service">
                    <a href="/admin/parts/{{ $part->slug }}/edit">
                        <div class="border-2 border-yellow-600 rounded-lg px-3 py-2 text-yellow-400 cursor-pointer hover:bg-yellow-600 hover:text-yellow-200">
                            Update
                        </div>
                    </a>
                </div>

            </div>
        @endforeach

    </div>
</div>

