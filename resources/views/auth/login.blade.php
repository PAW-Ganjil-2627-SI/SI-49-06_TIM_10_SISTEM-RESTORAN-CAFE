
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Restoran & Cafe</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-page">

    <div class="login-card">
        <div class="login-header">
            <h2>Selamat Datang!</h2>
            <p>Master Meja & Area</p>
            <span>Silakan masuk ke akun Anda</span>
        </div>

        @if (session('success'))
            <div class="login-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="login-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.proses') }}">
            @csrf

            <div class="login-form-group">
                <label for="username">Username</label>
                <input
                    id="username"
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Masukkan username"
                    required
                    autofocus
                >
            </div>

            <div class="login-form-group">
                <label for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <div class="login-remember">
                <label>
                    <input type="checkbox" name="remember" value="1">
                    Ingat saya
                </label>
            </div>

            <button type="submit" class="login-button">
                Masuk
            </button>
        </form>

        <div class="login-footer">
            Sistem Informasi Restoran & Cafe
        </div>
    </div>

</body>
</html>
