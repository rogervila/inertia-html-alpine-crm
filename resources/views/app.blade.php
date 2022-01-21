<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    @inertiaHead
</head>

<body>
    @inertia
</body>

</html>
