{{-- resources/views/profiles/show.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil {{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .user-info {
            margin-top: 20px;
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
        <h1>Profil {{ $user->name }}</h1>

        <div class="user-info">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Bio:</strong> {{ $user->profile->bio ?? 'Tidak ada bio' }}</p>
            <p><strong>Lokasi:</strong> {{ $user->profile->location ?? 'Tidak ada lokasi' }}</p>
            <p><strong>Telepon:</strong> {{ $user->profile->phone ?? 'Tidak ada nomor telepon' }}</p>
        </div>

        <a class="back-link" href="{{ url('/users') }}">Kembali ke daftar pengguna</a>
    </div>
</body>
</html>
