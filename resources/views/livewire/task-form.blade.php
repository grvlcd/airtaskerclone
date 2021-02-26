<div class="absolute inset-0 top-0 z-50 w-screen h-full bg-black bg-opacity-50" style="height: 500%;">
    <div class="sticky h-auto top-10" x-on:click.self="show = false">
        <div class="sticky flex items-center w-2/4 m-auto bg-teal-lighter">
            <div class="w-full p-8 m-4 bg-white rounded shadow-lg">
                <h1 class="block w-full mb-6 text-2xl text-center uppercase text-grey-darkest">Post a Task</h1>
                <form method="post" wire:submit.prevent="onSubmit">
                    @csrf
                    <div class="flex flex-col mb-4">
                        <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="title">Title</label>
                        <input class="px-3 py-2 border text-grey-darkest @error('title') border-red-500 @enderror"
                            type="text" name="title" id="title" value="{{ old('title') }}" wire:model="title">
                        @error('title')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-4">
                        <label class="mb-2 text-lg font-bold uppercase text-grey-darkest"
                            for="description">Description</label>
                        <textarea class="px-3 py-2 border text-grey-darkest" rows="6" name="description"
                            id="description" wire:model="description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-4">
                        <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="rate">Rate</label>
                        <input class="px-3 py-2 border text-grey-darkest" type="number" min="10" step="1" name="rate"
                            id="rate" value="{{ old('rate') }}" wire:model="rate">
                        @error('rate')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="desired_data">Date
                            Execution</label>
                        <input class="px-3 py-2 border text-grey-darkest" type="date"
                            value="{{ old('desired_daate') }}" name="desired_date" id="desired_date"
                            wire:model="desired_date">
                        @error('desired_date')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-row items-end justify-end">
                        <button
                            class="block px-5 py-2 mr-2 text-lg text-white uppercase bg-gray-400 rounded bg-teal hover:bg-teal-dark"
                            type="button" x-on:click="show = false">Cancel</button>
                        <button
                            class="block px-5 py-2 text-lg text-white uppercase bg-indigo-400 rounded bg-teal hover:bg-teal-dark"
                            type="submit">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
