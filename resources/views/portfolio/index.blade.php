<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - {{ $aboutMe->name ?? 'Your Name' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Optional: Custom styling for better presentation */
        .container {
            max-width: 960px;
        }
        section {
            padding: 4rem 0;
            border-bottom: 1px solid #e2e8f0;
        }
        section:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 font-sans leading-normal tracking-normal">

    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('portfolio.index') }}" class="text-2xl font-bold text-blue-600">My Portfolio</a>
            <div>
                <a href="#about" class="text-gray-600 hover:text-blue-600 px-3">About</a>
                <a href="#skills" class="text-gray-600 hover:text-blue-600 px-3">Skills</a>
                <a href="#experience" class="text-gray-600 hover:text-blue-600 px-3">Experience</a>
                <a href="#projects" class="text-gray-600 hover:text-blue-600 px-3">Projects</a>
                <a href="#contact" class="text-gray-600 hover:text-blue-600 px-3">Contact</a>
                @auth {{-- Tampilkan link dashboard jika user sudah login --}}
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline ml-4">Dashboard</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">

        <section id="about" class="flex flex-col md:flex-row items-center justify-center bg-white rounded-lg shadow-lg p-6 mb-8">
            @if($aboutMe)
                @if($aboutMe->profile_picture_path)
                    <img src="{{ asset('storage/' . $aboutMe->profile_picture_path) }}" alt="{{ $aboutMe->name }}" class="w-48 h-48 rounded-full object-cover mb-4 md:mb-0 md:mr-8 border-4 border-blue-200">
                @else
                    <div class="w-48 h-48 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-6xl mb-4 md:mb-0 md:mr-8">
                        <i class="fas fa-user-circle"></i>
                    </div>
                @endif
                <div class="text-center md:text-left">
                    <h1 class="text-4xl font-extrabold text-gray-800">{{ $aboutMe->name }}</h1>
                    <p class="text-xl text-blue-600 mb-4">{{ $aboutMe->title }}</p>
                    <p class="text-gray-700 leading-relaxed max-w-2xl">{{ $aboutMe->description }}</p>
                    @if($aboutMe->resume_path)
                        <a href="{{ asset('storage/' . $aboutMe->resume_path) }}" download class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Download CV
                        </a>
                    @endif
                </div>
            @else
                <p class="text-center text-gray-600">No 'About Me' information available. Please add it from the admin panel.</p>
            @endif
        </section>

        <section id="skills" class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">My Skills</h2>
            @if($skills->isNotEmpty())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($skills as $skill)
                        <div class="bg-gray-50 p-4 rounded-lg shadow text-center">
                            @if($skill->icon)
                                <i class="{{ $skill->icon }} text-5xl text-blue-500 mb-2"></i>
                            @else
                                <i class="fas fa-code text-5xl text-blue-500 mb-2"></i>
                            @endif
                            <h3 class="text-xl font-semibold text-gray-700">{{ $skill->name }}</h3>
                            @if($skill->level)
                                <p class="text-sm text-gray-500 mt-1">{{ $skill->level }}% proficiency</p>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mt-2">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $skill->level }}%"></div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">No skills added yet. Add some from the admin panel!</p>
            @endif
        </section>

        <section id="experience" class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Work Experience</h2>
            @if($experiences->isNotEmpty())
                <div class="space-y-6">
                   @foreach($experiences as $experience)
    @if($experience instanceof \App\Models\Experience) {{-- Tambahkan pengecekan ini --}}
        <div class="bg-gray-50 p-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold text-gray-700">{{ $experience->title }} at {{ $experience->company }}</h3>
            <p class="text-gray-500 text-sm mb-2">{{ $experience->start_date->format('M Y') }} -
                @if($experience->is_current)
                    Present
                @else
                    {{ $experience->end_date ? $experience->end_date->format('M Y') : 'N/A' }}
                @endif
                @if($experience->location)
                    <span class="ml-2">({{ $experience->location }})</span>
                @endif
            </p>
            <p class="text-gray-700">{{ $experience->description }}</p>
        </div>
    @else
        {{-- Ini akan tampil jika ada item di $experiences yang bukan instance Experience Model --}}
        <p class="text-red-500">Error: Invalid experience data encountered.</p>
    @endif
@endforeach
                </div>
            @else
                <p class="text-center text-gray-600">No work experience added yet. Add some from the admin panel!</p>
            @endif
        </section>

        <section id="projects" class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">My Projects</h2>
            @if($projects->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($projects as $project)
                        <div class="bg-gray-50 p-4 rounded-lg shadow flex flex-col">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover rounded-md mb-4">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-4xl rounded-md mb-4">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                            @endif
                            <h3 class="text-xl font-semibold text-gray-700 mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 text-sm mb-3 flex-grow">{{ Str::limit($project->description, 100) }}</p>
                            <div class="mt-auto"> {{-- Menggunakan mt-auto untuk mendorong link ke bawah --}}
                                <a href="{{ route('portfolio.project.show', $project->slug) }}" class="text-blue-600 hover:underline">
                                    View Details <i class="fas fa-arrow-right text-sm"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">No projects added yet. Add some from the admin panel!</p>
            @endif
        </section>

        <section id="contact" class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Get in Touch</h2>
            @if($contacts->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($contacts as $contact)
                        <div class="bg-gray-50 p-4 rounded-lg shadow flex items-center">
                            @if($contact->icon)
                                <i class="{{ $contact->icon }} text-3xl text-blue-500 mr-4"></i>
                            @else
                                <i class="fas fa-info-circle text-3xl text-blue-500 mr-4"></i>
                            @endif
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">{{ $contact->platform }}</h3>
                                <p class="text-gray-600"><a href="@if($contact->platform == 'Email') mailto:{{ $contact->value }} @elseif($contact->platform == 'WhatsApp') https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->value) }} @else {{ $contact->value }} @endif" target="_blank" class="hover:underline">{{ $contact->value }}</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">No contact information added yet. Add some from the admin panel!</p>
            @endif
        </section>

    </div>

    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; {{ date('Y') }} {{ $aboutMe->name ?? 'Your Name' }}. All rights reserved.</p>
    </footer>

</body>
</html>