<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - My Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body { background-color: #f3f4f6; }
        .sidebar { background-color: #1f2937; } /* bg-gray-800 */
        .sidebar a { color: #d1d5db; } /* text-gray-300 */
        .sidebar a:hover { background-color: #374151; color: #f9fafb; } /* bg-gray-700 text-gray-50 */
    </style>
</head>
<body class="flex min-h-screen">
    <aside class="sidebar w-64 p-6 space-y-6">
        <h2 class="text-white text-2xl font-bold mb-8">Admin Panel</h2>
        <nav>
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-gray-300 hover:text-gray-50 transition duration-200">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.about-me.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-gray-300 hover:text-gray-50 transition duration-200">
                <i class="fas fa-user-circle mr-2"></i> About Me
            </a>
            <a href="{{ route('admin.skills.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-gray-300 hover:text-gray-50 transition duration-200">
                <i class="fas fa-star mr-2"></i> Skills
            </a>
            <a href="{{ route('admin.experiences.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-gray-300 hover:text-gray-50 transition duration-200">
                <i class="fas fa-briefcase mr-2"></i> Experiences
            </a>
            <a href="{{ route('admin.projects.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-gray-300 hover:text-gray-50 transition duration-200">
                <i class="fas fa-folder-open mr-2"></i> Projects
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-gray-300 hover:text-gray-50 transition duration-200">
                <i class="fas fa-address-book mr-2"></i> Contacts
            </a>
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit" class="block w-full text-left py-2 px-4 rounded bg-red-600 hover:bg-red-700 text-white transition duration-200">
                <i class="fas fa-sign-out-alt mr-2"></i> Log Out
            </button>
        </form>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">@yield('title', 'Admin Panel')</h1>
            <a href="{{ route('portfolio.index') }}" class="text-blue-600 hover:underline">View Public Site</a>
        </header>

        <main class="flex-1 p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>