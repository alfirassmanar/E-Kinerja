<!doctype html>
<html lang="en">

<head>
    <title>Login Sistem</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                {{-- <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login #03</h2>
                </div> --}}
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Masuk Sistem</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#"
                                        class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-facebook"></span></a>
                                    <a href="#"
                                        class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('login-proses') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-user"></span></div>
                                <input type="email" class="form-control rounded-left" placeholder="email"
                                    name="email" required>
                            </div>
                            @error('email')
                                <small>{{ $message }}</small>
                            @enderror
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-lock"></span></div>
                                <input type="password" class="form-control rounded-left" placeholder="Password"
                                    name="password" required>
                            </div>
                            @error('password')
                                <small>{{ $message }}</small>
                            @enderror
                            @if (auth()->check())
                                <input hidden type="text" name="id" value="{{ auth()->user()->id }}">
                            @endif
                            <div class="form-group d-flex align-items-center">
                                <div class="w-100 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary rounded submit">Login</button>
                                </div>
                            </div>
                        </form>

                        <div class="form-group mt-4">
                            <div class="w-100 text-center">
                                <p class="mb-1">Silahkan Klik Jika Belum <a
                                        href="{{ route('registrasi') }}">Daftar</a> </p>
                                <p><a href="#">Lupa Password</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('error-login'))
        <script>
            Swal.fire({
                icon: 'error',
                // title: 'Email atau Password anda Salah!',
                text: '{{ $message }}',
            })
        </script>
    @endif

    @if ($message = Session::get('error-status'))
        <script>
            Swal.fire({
                icon: 'error',
                // title: 'Email atau Password anda Salah!',
                text: '{{ $message }}',
            })
        </script>
    @endif

    @if ($message = Session::get('success-registrasi'))
        <script>
            Swal.fire({
                icon: 'success',
                // title: 'Email atau Password anda Salah!',
                text: '{{ $message }}',
            })
        </script>
    @endif
</body>

</html>
