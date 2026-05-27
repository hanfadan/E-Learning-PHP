<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'E-Learning Laravel') }} - Demo Login</title>
    @fonts
    <style>
        body {
            font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
            background: #f7f7f2;
            color: #20201d;
        }

        .page {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 32px 16px;
        }

        .shell {
            width: min(960px, 100%);
            display: grid;
            grid-template-columns: 1fr 1.15fr;
            background: #ffffff;
            border: 1px solid #deded4;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 18px 50px rgba(24, 24, 20, .08);
        }

        .intro {
            padding: 40px;
            background: #164e63;
            color: #f8fafc;
        }

        .intro p {
            color: #cdebf4;
            margin-top: 12px;
            line-height: 1.7;
        }

        .panel {
            padding: 40px;
        }

        h1 {
            font-size: 32px;
            line-height: 1.15;
            font-weight: 700;
        }

        h2 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .credential-list {
            display: grid;
            gap: 12px;
        }

        .credential {
            border: 1px solid #dfdfd5;
            border-radius: 8px;
            padding: 16px;
            background: #fbfbf8;
        }

        .credential strong {
            display: block;
            margin-bottom: 10px;
            color: #164e63;
        }

        .row {
            display: grid;
            grid-template-columns: 88px 1fr;
            gap: 12px;
            font-size: 14px;
            line-height: 1.7;
        }

        .label {
            color: #73736b;
        }

        code {
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            color: #111827;
            background: #eeeeE7;
            border-radius: 4px;
            padding: 2px 6px;
        }

        .note {
            margin-top: 20px;
            color: #5f5f57;
            font-size: 14px;
            line-height: 1.7;
        }

        @media (max-width: 760px) {
            .shell {
                grid-template-columns: 1fr;
            }

            .intro,
            .panel {
                padding: 28px;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <section class="shell" aria-labelledby="page-title">
            <div class="intro">
                <h1 id="page-title">E-Learning Laravel Portfolio</h1>
                <p>
                    Demo accounts are provided for portfolio review only. Each role has a seeded account in the database and the importable SQL file.
                </p>
            </div>

            <div class="panel">
                <h2>Demo Login Credentials</h2>
                <div class="credential-list">
                    <div class="credential">
                        <strong>Admin</strong>
                        <div class="row"><span class="label">Username</span><code>demo_admin</code></div>
                        <div class="row"><span class="label">Password</span><code>portfolio123</code></div>
                    </div>

                    <div class="credential">
                        <strong>Teacher</strong>
                        <div class="row"><span class="label">Username</span><code>demo_teacher</code></div>
                        <div class="row"><span class="label">Password</span><code>portfolio123</code></div>
                    </div>

                    <div class="credential">
                        <strong>Student</strong>
                        <div class="row"><span class="label">Username</span><code>demo_student</code></div>
                        <div class="row"><span class="label">Password</span><code>portfolio123</code></div>
                    </div>
                </div>

                <p class="note">
                    These accounts are intentionally public and should only be used in the portfolio/demo environment.
                </p>
            </div>
        </section>
    </main>
</body>
</html>
