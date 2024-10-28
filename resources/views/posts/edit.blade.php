{{-- resources/views/posts/edit.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
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
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }
        button {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
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
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Edit Post: {{ $post->title }}</h1>

    <div class="form-container">
        {{-- Tampilkan pesan sukses jika ada --}}
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        {{-- Form untuk edit post --}}
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            {{-- Menampilkan pesan error untuk judul --}}
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
            {{-- Menampilkan pesan error untuk konten --}}
            @error('content')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Update Post</button>
        </form>

        {{-- Tombol kembali ke daftar postingan --}}
        <a href="{{ route('posts.index') }}" class="btn-back">Kembali ke Daftar Postingan</a>
    </div>
</body>
</html>
