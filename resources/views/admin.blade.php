<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Library SDU - Admin Panel</title>
</head>
<body>
<div id="app">
    <app></app>
</div>
<script src="{{ mix('js/admin.js') }}"></script>
</body>
</html>
