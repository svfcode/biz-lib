
<header class="header">
    <nav class="flex bg-gray-100 shadow-lg">
        <div class="nav_logo p-2">
            <h1><a href="/" class="font-bold text-2xl">Libteka</a></h1>
        </div>
        <div id="nav_wrap" class="nav_wrap flex p-2 max-w-xs m-auto">
            <div id="nav_part" class="nav_parts" v-on:click="togglePartMenu">
                <div class="nav_part_select relative cursor-pointer flex hover:text-purple-700">
                    <span class="pl-2">Разделы</span>
                    <i v-if="!isPartSelect" class="material-icons">arrow_drop_down</i>
                    <i v-if="isPartSelect" class="material-icons">arrow_drop_up</i>
                    <div v-if="isPartSelect" class="nav_part_menu absolute bg-gray-100 shadow-lg w-full top-8 p-2 flex flex-col">
                        @foreach ($navigation_parts as $part)
                            <a href="/parts/{{ $part->slug }}" class="text-black hover:text-purple-700">{{ $part->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="nav_categories" v-on:click="toggleCategoryMenu">
                <div class="nav_categories_select cursor-pointer pl-4 flex relative hover:text-purple-700">
                    <span class="pl-2">Категории</span>
                    <i v-if="!isCategorySelect" class="material-icons">arrow_drop_down</i>
                    <i v-if="isCategorySelect" class="material-icons">arrow_drop_up</i>
                    <div v-if="isCategorySelect" class="nav_part_menu absolute bg-gray-100 shadow-lg w-full top-8 p-2 flex flex-col">
                        @foreach ($navigation_parts as $part)
                            <span class="text-gray-400">{{ $part->title }}</span>
                            @foreach ($navigation_cats as $cat)
                                @if ($cat->part_id == $part->id)
                                    <a href="/parts/{{ $part->slug }}/categories/{{ $cat->slug }}" class="text-black hover:text-purple-700">{{ $cat->title }}</a>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- search --}}
            {{-- forum --}}
        </div>
    </nav>

    <script>
        var app = new Vue({
            el: '#nav_wrap',
            data: {
                isPartSelect: false,
                isCategorySelect: false,
            },
            methods: {
                togglePartMenu: function() {
                    this.isPartSelect ? this.closeAllMenu() : (this.closeAllMenu(), this.isPartSelect = true)
                },
                toggleCategoryMenu: function() {
                    this.isCategorySelect ? this.closeAllMenu() : (this.closeAllMenu(), this.isCategorySelect = true)
                },
                closeAllMenu: function() {
                    this.isPartSelect = false
                    this.isCategorySelect = false
                }
            }
        })
    </script>
</header>

