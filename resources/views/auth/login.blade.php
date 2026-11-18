
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Rasa Kita</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;

            background:
                radial-gradient(circle at 10% 10%, #E2EDF1, transparent 35%),
                radial-gradient(circle at 90% 90%, #E9DCCB, transparent 35%),
                #F8F4ED;

            color: #394650;
        }

        /* LOGIN CARD */

        .card {
            position: relative;
            overflow: hidden;

            background: #FFFCF7;
            padding: 42px 35px;

            border: 1px solid #E8DFD2;
            border-radius: 23px;

            box-shadow: 0 15px 45px rgba(57, 70, 80, 0.09);

            width: 100%;
            max-width: 410px;
        }

        .card::before {
            content: "";
            position: absolute;

            top: 0;
            left: 0;

            width: 100%;
            height: 6px;

            background: linear-gradient(
                90deg,
                #789BB8,
                #B9D1DD,
                #E4D2BD
            );
        }

        /* LOGO */

        .brand-icon {
            width: 62px;
            height: 62px;

            margin: 0 auto 18px;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #789BB8;
            color: white;

            border-radius: 19px;

            font-size: 22px;
            font-weight: 800;

            box-shadow: 0 7px 18px rgba(120, 155, 184, .25);
        }

        .brand-title {
            font-size: 28px;
            font-weight: 800;

            color: #394650;
            text-align: center;

            letter-spacing: -.8px;
            margin-bottom: 7px;
        }

        .brand-subtitle {
            font-size: 13px;
            color: #85847D;

            text-align: center;
            line-height: 1.7;

            margin-bottom: 32px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;

            font-size: 13px;
            font-weight: 700;

            color: #52616C;
            margin-bottom: 9px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;

            border: 1px solid #E4DDD3;
            border-radius: 11px;

            background: #FFFFFF;
            color: #394650;

            font-size: 13px;
            outline: none;

            transition: .25s;
        }

        .form-group input::placeholder {
            color: #B0AEA7;
        }

        .form-group input:focus {
            border-color: #789BB8;
            box-shadow: 0 0 0 3px rgba(120, 155, 184, .15);
        }

        /* BUTTON */

        .btn {
            width: 100%;
            padding: 14px;

            margin-top: 8px;

            background: #789BB8;
            color: white;

            border: none;
            border-radius: 30px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
            transition: .25s;
        }

        .btn:hover {
            background: #587D9B;
            transform: translateY(-2px);

            box-shadow: 0 7px 18px rgba(88, 125, 155, .2);
        }

        /* ERROR */

        .error {
            background: #F7E7E2;
            color: #963E32;

            border: 1px solid #EED2CA;
            padding: 12px 14px;

            border-radius: 10px;
            font-size: 13px;

            margin-bottom: 22px;
            text-align: center;
        }

        /* BACK LINK */

        .back-link {
            display: block;

            text-align: center;
            margin-top: 25px;

            font-size: 13px;
            font-weight: 600;

            color: #789BB8;
            text-decoration: none;

            transition: .2s;
        }

        .back-link:hover {
            color: #394650;
        }

        /* FOOTER */

        .login-footer {
            margin-top: 28px;
            padding-top: 20px;

            border-top: 1px solid #EEE6DB;

            text-align: center;

            color: #A09B91;
            font-size: 11px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 38px 24px;
            }

            .brand-title {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="brand-icon">RK</div>

        <div class="brand-title">Rasa Kita</div>

        <div class="brand-subtitle">
            Selamat datang kembali!<br>
            Silakan masuk untuk mengelola kantin.
        </div>

        @if($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="btn">
                Masuk ke Dashboard
            </button>

        </form>

        <a href="{{ route('beranda') }}" class="back-link">
            ← Kembali ke Beranda
        </a>

        <div class="login-footer">
            © {{ date('Y') }} Rasa Kita. All rights reserved.
        </div>

    </div>

</body>
</html>
