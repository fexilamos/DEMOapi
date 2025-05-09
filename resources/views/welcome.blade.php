<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image:
                url('/images/patterns.svg'),
                linear-gradient(to bottom right, #0d3b3c, #0e574d);
            background-repeat: repeat;
            background-size: auto, cover;
        }

        .typing {
            font-family: 'Courier New', monospace;
            color: rgb(16, 95, 58); /* cor do texto verde */
            border-right: 2px solid rgb(16, 95, 58);
            box-shadow: 0 0 10px rgb(16, 95, 58); /* correção aqui */
            overflow: hidden;
            animation: blink 0.7s step-end infinite;
        }

        @keyframes blink {
            0% { border-color: transparent; }
            50% { border-color: rgb(16, 95, 58); }
            100% { border-color: transparent; }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center text-white font-sans">

    <div class="text-center space-y-6">
        <h1 id="typing-text" class="text-4xl font-semibold typing"></h1>

        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-white text-[#0e574d] font-medium rounded-lg shadow hover:bg-gray-100 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-white text-[#0e574d] font-medium rounded-lg shadow hover:bg-gray-100 transition">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2 bg-transparent border border-white font-medium rounded-lg hover:bg-white hover:text-[#0e574d] transition">
                            Registo
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <script>
        const text = 'Bem-vindo à Webapp!';
        let i = 0;
        const speed = 100;

        function typeWriter() {
            if (i < text.length) {
                document.getElementById("typing-text").innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            }
        }

        window.onload = typeWriter;
    </script>

</body>
</html>
