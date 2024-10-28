{{-- resources/views/posts/create.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Postingan untuk {{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .error-messages {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3; /* Mengubah warna saat hover */
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #007BFF;
        }
        .back-link:hover {
            color: #0056b3; /* Mengubah warna saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Postingan untuk {{ $user->name }}</h1>

        {{-- Tampilkan pesan error jika ada --}}
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form untuk tambah postingan --}}
        <form action="{{ route('user.posts.store', $user->id) }}" method="POST">
            @csrf

            <label for="title">Judul:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>

            <label for="content">Konten:</label>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>

            <button type="submit">Tambah Postingan</button>
        </form>

        <a class="back-link" href="{{ route('user.posts', $user->id) }}">Kembali ke Daftar Postingan</a>
    </div>
</body>
</html>
