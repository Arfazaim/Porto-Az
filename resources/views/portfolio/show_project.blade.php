<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project: {{ $project->title }} - My Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .container {
            max-width: 960px;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 font-sans leading-normal tracking-normal">

    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('portfolio.index') }}" class="text-2xl font-bold text-blue-600">My Portfolio</a>
            <div>
                <a href="{{ route('portfolio.index') }}#about" class="text-gray-600 hover:text-blue-600 px-3">About</a>
                <a href="{{ route('portfolio.index') }}#skills" class="text-gray-600 hover:text-blue-600 px-3">Skills</a>
                <a href="{{ route('portfolio.index') }}#experience" class="text-gray-600 hover:text-blue-600 px-3">Experience</a>
                <a href="{{ route('portfolio.index') }}#projects" class="text-gray-600 hover:text-blue-600 px-3">Projects</a>
                <a href="{{ route('portfolio.index') }}#contact" class="text-gray-600 hover:text-blue-600 px-3">Contact</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4 my-8 bg-white rounded-lg shadow-lg">
        <a href="{{ route('portfolio.index') }}#projects" class="text-blue-600 hover:underline mb-4 inline-block">
            &larr; Back to Projects
        </a>

        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">{{ $project->title }}</h1>
        <p class="text-gray-600 text-lg mb-6">{{ $project->completion_date ? $project->completion_date->format('F Y') : 'Ongoing' }}</p>

        @if($project->image_path)
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-80 object-cover rounded-md mb-8">
        @else
            <div class="w-full h-80 bg-gray-200 flex items-center justify-center text-gray-500 text-6xl rounded-md mb-8">
                <i class="fas fa-image"></i>
                <span class="ml-4 text-xl">No Image Available</span>
            </div>
        @endif

        <div class="prose max-w-none text-gray-700 leading-relaxed mb-8">
            <p>{{ $project->description }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Technologies Used:</h3>
            @if($project->technologies_used)
                @php
                    // Pastikan technologies_used adalah JSON string
                    $technologies = is_string($project->technologies_used) ? json_decode($project->technologies_used, true) : $project->technologies_used;
                @endphp
                @if(is_array($technologies))
                    <div class="flex flex-wrap gap-2">
                        @foreach($technologies as $tech)
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">{{ $tech }}</span>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">No specific technologies listed.</p>
                @endif
            @else
                <p class="text-gray-600">No specific technologies listed.</p>
            @endif
        </div>

        <div class="flex space-x-4">
            @if($project->github_link)
                <a href="{{ $project->github_link }}" target="_blank" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg flex items-center">
                    <i class="fab fa-github mr-2"></i> View on GitHub
                </a>
            @endif
            @if($project->demo_link)
                <a href="{{ $project->demo_link }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg flex items-center">
                    <i class="fas fa-external-link-alt mr-2"></i> Live Demo
                </a>
            @endif
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        <p>&copy; {{ date('Y') }} My Portfolio. All rights reserved.</p>
    </footer>

</body>
</html>