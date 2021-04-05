<html>
    <head>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&display=swap" rel="stylesheet">
        @livewireStyles
    </head>

    <body>
        {{ $slot }}

        @livewireScripts
    </body>
</html>
