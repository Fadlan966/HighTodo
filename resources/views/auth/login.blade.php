<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HighTodo | Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --card-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            --input-focus: #667eea;
        }

        /* Enhanced background */
        .bg-gradient-primary {
            background: var(--primary-gradient);
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .bg-gradient-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="1" fill="white" opacity="0.05"/><circle cx="40" cy="60" r="0.5" fill="white" opacity="0.08"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Enhanced card styling */
        .card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px !important;
            box-shadow: var(--card-shadow) !important;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15) !important;
        }

        /* Enhanced header styling */
        .card-body .text-center h1 {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
        }

        .card-body .text-center h1 i {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 1.5rem;
            margin-right: 0.5rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Enhanced form styling */
        .form-control-user {
            border: 2px solid #e3e6f0;
            border-radius: 15px !important;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control-user:focus {
            border-color: var(--input-focus);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            transform: translateY(-2px);
            background: white;
        }

        .form-control-user.is-invalid {
            border-color: #e74a3b;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Enhanced button styling */
        .btn-primary {
            background: var(--primary-gradient) !important;
            border: none !important;
            border-radius: 15px !important;
            padding: 1rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Enhanced error message styling */
        .text-danger {
            font-weight: 500;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }

        /* Enhanced link styling */
        .text-center a {
            color: var(--input-focus);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .text-center a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Enhanced divider */
        hr {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            margin: 2rem 0;
        }

        /* Floating shapes for decoration */
        .container::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 10%;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .container::after {
            content: '';
            position: absolute;
            bottom: 20%;
            right: 15%;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            animation: float 8s ease-in-out infinite reverse;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .card {
                margin: 1rem;
            }

            .card-body {
                padding: 2rem 1.5rem;
            }
        }

        /* SweetAlert2 custom styling */
        .swal2-popup {
            border-radius: 20px;
        }

        .swal2-confirm {
            background: var(--primary-gradient) !important;
            border-radius: 10px;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            <i class="fas fa-tasks mr-2"></i>
                                            HighTodo | Login
                                        </h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('loginProses') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                placeholder="Enter Email Address..." name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid
                                            @enderror"
                                                name="password" placeholder="Password">
                                            @error('password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Back To Homepage ?
                                        <a href="{{ route('home') }}">Click here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.0.19/sweetalert2.min.js"></script>

    @session('success')
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{ session('success') }}!",
                icon: "success",
                confirmButtonColor: '#667eea',
                confirmButtonText: 'Continue'
            });
        </script>
    @endsession

    @session('error')
        <script>
            Swal.fire({
                title: "Failed!",
                text: "{{ session('error') }}!",
                icon: "error",
                confirmButtonColor: '#667eea',
                confirmButtonText: 'Try Again'
            });
        </script>
    @endsession
</body>

</html>
