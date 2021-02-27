<div>
    <h1 class="text-indigo-400 underline">Offers</h1>
    <div class="flex flex-col-reverse mt-4 mb-4">
        @foreach ($comments as $comment)
            <div class="p-3 m-1 bg-gray-100 rounded-2xl">
                <div class="flex flex-row items-center justify-start">
                    @if (isset($comment->user->profile->path))
                        <img class="w-8 h-8 mr-2 rounded-full"
                            src="{{ asset('images/' . $comment->user->profile->path) }}">
                    @else
                        <img class="w-8 h-8 mr-2 rounded-full"
                            src="https://i.pinimg.com/originals/df/28/37/df28378dbe3bc59d8e5d3646ade310b8.jpg">
                    @endif
                    <p class="text-sm font-medium text-grey-darkest">{{ $comment->user->name }}</p>
                </div>
                <small class="text-xs text-grey-dark ">{{ $comment->body }}</small>
            </div>
        @endforeach
    </div>
    <form wire:submit.prevent="onSubmit" method="POST">
        @csrf
        <div class="relative w-full text-gray-600 focus-within:text-gray-400">
            <input type="text" name="body" wire:model="body"
                class="w-full py-2 pl-10 text-sm text-black bg-gray-100 border rounded-md"
                placeholder="Write a comment..." autocomplete="off">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <button type="submit" class="p-1">
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
