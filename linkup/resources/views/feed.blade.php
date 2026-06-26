<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp</title>

   <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->

    <nav class="bg-white shadow">

        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

            <h1 class="text-2xl font-bold text-blue-700">
                LinkUp
            </h1>

            <a href="{{ route('feed') }}"
               class="font-semibold hover:text-blue-700">
                Feed
            </a>

        </div>

    </nav>

    <main class="max-w-5xl mx-auto py-8">

        @yield('content')

    </main>

</body>
</html>
