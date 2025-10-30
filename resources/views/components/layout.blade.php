<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FJobs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {!! ToastMagic::styles() !!}
    @vite(['resources/js/app.js'])
</head>

<body class="bg-black text-white font-hanken-grotesk">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="" class="">
                    <img class="rounded-md" src="{{ Vite::asset('/resources/images/logo.png') }}" style="width: 50px;"
                        alt="">
                </a>
            </div>

            <div class="space-x-6 font-bold">
                <a href="/" class="hover:text-blue-800 transition-colors duration-300">Jobs</a>
                <a href="#" class="hover:text-blue-800 transition-colors duration-300">Careers</a>
                <a href="#" class="hover:text-blue-800 transition-colors duration-300">Salaries</a>
                @auth
                    @if (auth()->user()->is_admin)
                        <a href="/companies" class="hover:text-blue-800 transition-colors duration-300">
                            Companies
                        </a>
                    @endif
                @endauth
            </div>


            @auth
                <div class="space-x-6 font-bold flex">
                    <a href="/jobs/create">Post a Job</a>

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')

                        <button>Log Out</button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="space-x-6 font-bold">
                    <a href="/register" class="hover:text-blue-800 transition-colors duration-300">Sign Up</a>
                    <a href="/login" class="hover:text-blue-800 transition-colors duration-300">Log In</a>
                </div>
            @endguest

        </nav>


        <main class="mt-10 max-w[926px] mx-auto">
            {{ $slot }}
        </main>
    </div>
    {!! ToastMagic::scripts() !!}
</body>

</html>
