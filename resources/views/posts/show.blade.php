{{-- resources/views/posts/show.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Postingan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
        }
        .content {
            margin-top: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
        .author-info {
            margin-top: 10px;
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Detail Postingan</h1>
    
    <div class="content">
        <h2>Title: {{ $post->title }}</h2>
        <p><strong>Content:</strong> {{ $post->content }}</p>
        
        <!-- Menampilkan informasi siapa yang membuat postingan -->
        <p class="author-info">Dibuat oleh: {{ $post->user->name }}</p>
    </div>

    <a href="{{ route('posts.index') }}" class="btn-back">Kembali ke Daftar Postingan</a>
</body>
</html>
