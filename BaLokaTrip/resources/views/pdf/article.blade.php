<!DOCTYPE html>
<html>
<head>
    <title>{{ $article->judul }}</title>
    <style>
        p {
            word-wrap: break-word;
            white-space: normal;
            text-align: justify;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: auto;
            overflow: visible;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            display: block;
        }
    </style>
</head>
<body>
    <h1>{{ $article->judul }}</h1>
    <p>{!! nl2br(e($article->konten)) !!}</p>
</body>
</html>
