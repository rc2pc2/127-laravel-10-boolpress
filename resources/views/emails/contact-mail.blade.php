<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>New Contact Mail</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <main>
        <h1>
            You have received a new contact form!
        </h1>
        <h2>
            By: {{ $lead->name }}
        </h2>
        <h3>
            Message:
        </h3>
        <p>
            {{ $lead->message }}
        </p>

        <h5>
            This message should be addressed to this address:
        </h5>
        <pre>{{ $lead->email }}</pre>
    </main>
</body>
</html>
