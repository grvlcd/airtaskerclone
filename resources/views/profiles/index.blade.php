@extends('layouts.app')

@section('content')
    <main>
        <div
            class="h-auto py-5 m-auto mt-4 mb-10 tracking-wide bg-white border-2 border-gray-300 rounded-md shadow-lg max-w-7xl top-5">
            <div class="flex flex-col items-center mb-10 w-100">
                @if (isset($user->profile->path))
                    <img class="w-40 h-40 border-2 border-gray-300 rounded-full"
                        src="{{ asset('images/' . $user->profile->path) }}">
                @else
                    <img class="w-40 h-40 border-2 border-gray-300 rounded-full"
                        src="https://i.pinimg.com/originals/df/28/37/df28378dbe3bc59d8e5d3646ade310b8.jpg">
                @endif
                <div class="flex flex-row items-baseline justify-center">
                    <h4 class="mr-2 text-2xl text-black">{{ $user->name }}</h4>
                    <a href="{{ route('profile.edit', $user) }}">
                        <i class="flex-grow-0 text-lg text-green-500 far fa-edit"></i>
                    </a>
                </div>
                <p class="text-gray-400">2352 Carolyns Circle</p>
                <p class="text-gray-400">Member since {{ $user->created_at->isoFormat('Do of MMMM, Y') }}</p>
            </div>
            <div class="flex flex-col p-10">
                <div class="flex flex-col mb-5 w-100">
                    @if (isset($user->portfolio->certificates))
                        <div class="flex flex-row items-baseline">
                            <h1 class="mb-4 mr-4 text-2xl text-blue-300 underline">Certificates</h1>
                            <a href="{{ route('portfolio.certificate.index', $user->portfolio) }}">
                                <i class="text-lg text-green-500 far fa-edit"></i>
                            </a>
                        </div>
                        @foreach ($user->portfolio->certificates as $certificate)
                            <p class="font-semibold">{{ $certificate->title }}</p>
                            <p>{{ $certificate->description }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="flex flex-col mb-5 w-100">
                    @if (isset($user->portfolio->experiences))
                        <h1 class="mb-4 text-2xl text-blue-300 underline">Work Experience</h1>
                        @foreach ($user->portfolio->experiences as $experience)
                            <p class="text-lg">{{ $experience->company }}
                                <span class="font-semibold">{{ $experience->position }}</span>
                                {{ $experience->from->isoFormat('Y') }} -
                                {{ $experience->to->isoFormat('Y') }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="flex flex-col mb-5 w-100">
                    @if (isset($user->portfolio->skills))
                        <h1 class="mb-4 text-2xl text-blue-300 underline">Skills</h1>
                        <ul class="list-none">
                            @foreach ($user->portfolio->skills as $skill)
                                <li>{{ $skill->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="flex flex-col mb-5 w-100">
                    @if (isset($user->portfolio->education))
                        <h1 class="mb-4 text-2xl text-blue-300 underline">Education</h1>
                        @foreach ($user->portfolio->education as $education)
                            <p class="text-lg">{{ $education->school }}
                                <span class="font-semibold">{{ $education->course }}</span>
                                {{ $education->from->isoFormat('Y') }} -
                                {{ $education->to->isoFormat('Y') }}
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
