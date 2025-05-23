@extends('admin.layouts.app')

@section('title', 'Manage About Me')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">About Me</h1>
        @if($aboutMe)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600 font-semibold mb-1">Name:</p>
                    <p class="text-gray-800 text-lg">{{ $aboutMe->name }}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold mb-1">Title:</p>
                    <p class="text-gray-800 text-lg">{{ $aboutMe->title }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-gray-600 font-semibold mb-1">Description:</p>
                    <p class="text-gray-800 leading-relaxed">{{ $aboutMe->description }}</p>
                </div>
                @if($aboutMe->profile_picture_path)
                    <div class="md:col-span-2">
                        <p class="text-gray-600 font-semibold mb-1">Profile Picture:</p>
                        <img src="{{ asset('storage/' . $aboutMe->profile_picture_path) }}" alt="Profile Picture" class="w-32 h-32 object-cover rounded-full mt-2 border-2 border-blue-300">
                    </div>
                @endif
                @if($aboutMe->resume_path)
                    <div class="md:col-span-2">
                        <p class="text-gray-600 font-semibold mb-1">Resume/CV:</p>
                        <a href="{{ asset('storage/' . $aboutMe->resume_path) }}" download class="text-blue-600 hover:underline">Download CV</a>
                    </div>
                @endif
            </div>
            <div class="mt-8">
                {{-- Kita akan arahkan ke method 'edit' nanti --}}
                <a href="{{ route('admin.about-me.edit', $aboutMe->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit About Me</a>
            </div>
        @else
            <p class="text-gray-600 mb-4">No 'About Me' information available. Please create one.</p>
            {{-- Kita akan arahkan ke method 'create' nanti --}}
            <a href="{{ route('admin.about-me.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create About Me</a>
        @endif
    </div>
@endsection