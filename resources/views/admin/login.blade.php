<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bs-primary: #6d3b82;
            --bs-primary-rgb: 109, 59, 130;
        }
        body {
            background:
                radial-gradient(circle at top left, rgba(180, 122, 54, .18), transparent 32%),
                linear-gradient(135deg, #fcf9fd 0%, #f3edf6 100%);
            color: #302637;
        }
        .login-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 50px rgba(71, 38, 87, .12);
            overflow: hidden;
        }
        .login-header {
            background: linear-gradient(135deg, #24152d 0%, #472657 100%);
            color: #fff;
            border-bottom: 1px solid rgba(255, 255, 255, .12);
            padding: 1.5rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .login-header h3 { color: #fff; }
        .login-body {
            padding: 2rem;
            background: #fcf9fd;
        }
        .form-control:focus {
            border-color: #6d3b82;
            box-shadow: 0 0 0 .25rem rgba(109, 59, 130, .18);
        }
        .btn-primary {
            --bs-btn-bg: #6d3b82;
            --bs-btn-border-color: #6d3b82;
            --bs-btn-hover-bg: #472657;
            --bs-btn-hover-border-color: #472657;
            --bs-btn-active-bg: #472657;
            --bs-btn-active-border-color: #472657;
        }
        @media (max-width: 576px) {
            .login-card {
                margin: 0 15px;
            }
            .login-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="card login-card shadow">
                    <div class="login-header text-center">
                        <h3 class="mb-0">Admin Login</h3>
                    </div>
                    <div class="card-body login-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.login.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Admin Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="admin@example.com" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="••••••••" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>