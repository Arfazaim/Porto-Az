@extends('admin.layouts.app')

@section('title', 'Manage Contacts')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Contacts</h1>
        <a href="{{ route('admin.contacts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Contact</a>
    </div>

    @if($contacts->isNotEmpty())
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Platform
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Value
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Icon
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $contact->id }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $contact->platform }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $contact->value }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            @if($contact->icon)
                                <i class="{{ $contact->icon }} text-xl text-blue-500"></i>
                            @else
                                <i class="fas fa-info-circle text-xl text-gray-400"></i>
                            @endif
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                            <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-600 p-8 bg-white rounded-lg shadow-md">No contact information added yet. Click "Add New Contact" to get started!</p>
    @endif
@endsection