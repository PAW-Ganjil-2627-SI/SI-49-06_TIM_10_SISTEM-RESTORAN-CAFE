<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Restoran & Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(135deg, #F3E3D0 0%, #AACDDC 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #D2C4B4;
        }
        .header { text-align: center; margin-bottom: 28px; }
        .header h2 { font-size: 22px; font-weight: 700; color: #1E293B; }
        .header p { font-size: 13px; color: #64748B; margin-top: 5px; }
        
        .form-group { margin-bottom: 18px; }
        label { display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px; }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid #D2C4B4;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }
        input:focus { border-color: #81A6C6; box-shadow: 0 0 0 3px rgba(129, 166, 198, 0.2); }
        
        .alert-error {
            background: #F8D7DA;
            color: #721C24;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 18px;
            border: 1px solid #F5C6CB;
        }
        .btn-submit {
            width: 100%;
            background: #81A6C6;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 5px;
        }
        .btn-submit:hover { background: #6b91b2; }
        .back-link { text-align: center; margin-top: 20px; font-size: 13px; color: #64748B; }
        .back-link a { color: #81A6C6; font-weight: 600; text-decoration: none; }
        .back-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="header">
            <h2>Selamat Datang 👋</h2>
            <p>Login ke Sistem Informasi Restoran & Cafe</p>
        </div>

        @if($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.proses') }}">
            @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus placeholder="Masukkan username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn-submit">Masuk</button>
        </form>

        <div class="back-link">
            <a href="{{ route('pegawai.index') }}"></a>
        </div>
    </div>
</body>
</html>