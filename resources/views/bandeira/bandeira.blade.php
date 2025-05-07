<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bandeira dos Países</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/bandeira.css') }}"> --}}

    <style>
        h1 {
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
        }

        .flag {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Bandeira</h1>

    @isset($codigo)
        <img src="https://flagsapi.com/{{ $codigo }}/flat/64.png" alt="Bandeira {{ $codigo }}" class="flag">
    @endisset
</body>
</html>
