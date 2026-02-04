<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
</head>

<body class="h-full bg-gray-900">

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-center text-5xl font-bold tracking-tight text-white ">✨ StudentHub ✨</h2>
            <h3 class="text-center small text-gray-500 mb-10" >A Web-Based Student Records System</h3>
        </div>
        
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-lg shadow-2xl p-8">
                <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                        <input id="email" type="email" name="email" autocomplete="email" placeholder="Enter your email"
                            class="block w-full rounded-lg bg-gray-800/50 border border-gray-600 px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 sm:text-sm" />
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                            {{-- <a href="#" class="text-sm text-indigo-400 hover:text-indigo-300 transition duration-200">Forgot password?</a> --}}
                        </div>
                        <input id="password" type="password" name="password" autocomplete="current-password"
                            placeholder="Enter your password"
                            class="block w-full rounded-lg bg-gray-800/50 border border-gray-600 px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 sm:text-sm" />
                        @error('password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center items-center rounded-lg bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition duration-200">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>