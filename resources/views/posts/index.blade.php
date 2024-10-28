{{-- resources/views/posts/index.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Postingan</title>
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
        .post-list {
            list-style-type: none;
            padding: 0;
        }
        .post-item {
            padding: 10px;
            margin-bottom: 8px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .post-item a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }
        .post-item a:hover {
            text-decoration: underline;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons a {
            padding: 5px 10px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn-show {
            background-color: #007bff;
        }
        .btn-edit {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <h1>Daftar Postingan</h1>

    @if ($posts->isEmpty())
        <p>Tidak ada postingan yang tersedia.</p>
    @else
        <ul class="post-list">
            @foreach ($posts as $post)
                <li class="post-item">
                    <div>
                        <a href="{{ url('/posts/' . $post->id) }}">{{ $post->title }}</a>
                    </div>
                    <div class="action-buttons">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn-show">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn-edit">Edit</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
