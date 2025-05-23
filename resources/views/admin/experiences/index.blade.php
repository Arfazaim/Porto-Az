@extends('admin.layouts.app')

@section('title', 'Manage Experiences')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Experiences</h1>
        <a href="{{ route('admin.experiences.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Experience</a>
    </div>

    @if($experiences->isNotEmpty())
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Company
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Period
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Current
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experiences as $experience)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $experience->id }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $experience->title }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $experience->company }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $experience->start_date->format('M Y') }} -
                                @if($experience->is_current)
                                    Present
                                @else
                                    {{ $experience->end_date ? $experience->end_date->format('M Y') : 'N/A' }}
                                @endif
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                                <span aria-hidden class="absolute inset-0 {{ $experience->is_current ? 'bg-green-200' : 'bg-gray-200' }} opacity-50 rounded-full"></span>
                                <span class="relative text-xs {{ $experience->is_current ? 'text-green-900' : 'text-gray-900' }}">
                                    {{ $experience->is_current ? 'Yes' : 'No' }}
                                </span>
                            </span>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                            <a href="{{ route('admin.experiences.edit', $experience->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <form action="{{ route('admin.experiences.destroy', $experience->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this experience?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-600 p-8 bg-white rounded-lg shadow-md">No experience added yet. Click "Add New Experience" to get started!</p>
    @endif
@endsection