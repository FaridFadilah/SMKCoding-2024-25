<!DOCTYPE html>
<html lang="en">
<head>
    @include("partials.head")
    <title>@yield("title")</title>
</head>
<body>
    @include("partials.navbar")

    @yield("content")
    @include("partials.script")
</body>
</html>