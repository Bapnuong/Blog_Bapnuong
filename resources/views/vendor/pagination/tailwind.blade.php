@if ($paginator->hasPages())

    <div
        class="
            flex
            justify-center
            items-center
            gap-3
            mt-12
            flex-wrap
        "
    >

        {{-- PREVIOUS --}}

        @if ($paginator->onFirstPage())

            <span
                class="
                    px-5
                    py-3
                    rounded-2xl
                    bg-gray-200
                    text-gray-400
                    font-bold
                    cursor-not-allowed
                "
            >

                ← Prev

            </span>

        @else

            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="
                    px-5
                    py-3
                    rounded-2xl
                    bg-white
                    shadow-xl
                    font-bold
                    hover:scale-105
                    transition
                "
            >

                ← Prev

            </a>

        @endif

        {{-- PAGE NUMBERS --}}

        @foreach ($elements as $element)

            {{-- DOTS --}}

            @if (is_string($element))

                <span
                    class="
                        px-4
                        py-3
                        text-gray-500
                    "
                >

                    {{ $element }}

                </span>

            @endif

            {{-- LINKS --}}

            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <span
                            class="
                                px-5
                                py-3
                                rounded-2xl
                                bg-gradient-to-r
                                from-orange-500
                                to-pink-500
                                text-white
                                shadow-xl
                                font-bold
                            "
                        >

                            {{ $page }}

                        </span>

                    @else

                        <a
                            href="{{ $url }}"
                            class="
                                px-5
                                py-3
                                rounded-2xl
                                bg-white
                                shadow-xl
                                font-bold
                                hover:scale-105
                                transition
                            "
                        >

                            {{ $page }}

                        </a>

                    @endif

                @endforeach

            @endif

        @endforeach

        {{-- NEXT --}}

        @if ($paginator->hasMorePages())

            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="
                    px-5
                    py-3
                    rounded-2xl
                    bg-white
                    shadow-xl
                    font-bold
                    hover:scale-105
                    transition
                "
            >

                Next →

            </a>

        @else

            <span
                class="
                    px-5
                    py-3
                    rounded-2xl
                    bg-gray-200
                    text-gray-400
                    font-bold
                    cursor-not-allowed
                "
            >

                Next →

            </span>

        @endif

    </div>

@endif
