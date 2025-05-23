@extends('admin.layouts.app')

@section('title', 'Manage Projects')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Project</a>
    </div>

    @if($projects->isNotEmpty())
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
                            Image
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Completion Date
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $project->id }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $project->title }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-12 h-12 object-cover rounded-md">
                            @else
                                <div class="w-12 h-12 bg-gray-200 flex items-center justify-center text-gray-500 rounded-md text-xl">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $project->completion_date ? $project->completion_date->format('M Y') : 'N/A' }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-600 p-8 bg-white rounded-lg shadow-md">No projects added yet. Click "Add New Project" to get started!</p>
    @endif
@endsection