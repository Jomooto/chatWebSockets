<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($Users as $user)
                    @if(Auth::id() != $user->id)
                        <form action="{{ route('chat.with', $user->id) }}">
                            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ $user->name}}</button>
                        </form>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
