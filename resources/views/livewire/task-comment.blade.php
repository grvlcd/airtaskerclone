<div>

    @foreach ($comments as $comment)
        {{ $comment }}
    @endforeach

    <form method="GET">
        <div class="relative w-full text-gray-600 focus-within:text-gray-400">
            <input type="text" name="comment" class="w-full py-2 pl-10 text-sm text-black bg-gray-100 border rounded-md"
                placeholder="Write a comment..." autocomplete="off">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </span>
        </div>
    </form>
</div>
