<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admim Panel</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favi.jpg') }}">
    <link rel="stylesheet" href="../assets/auth/css/styles.min.css" />
    <style>
    .form-label{
        color:white;
    }
  
    
        </style>
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3" style="width: 40%;">
                        <div class="card mb-0" style="background: linear-gradient(45deg, #0061e1, #233243);">
                            <div class="card-body">
                                <a href="{{ route('login') }}"
                                    class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img style="width: 35%;" src="{{ asset('images/login.png') }}" width="180"
                                        alt="">
                                </a>
                                <form action="{{ route('loginform') }}" method="POST">
                                    @csrf

                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Username</label>
                                        <input type="email" name="email" style="color:white;"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            value="{{ old('email') }}" aria-describedby="emailHelp">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input style="color:white;" type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" style="background: linear-gradient(45deg, #167dc2, #1618e0);" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Log
                                        In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/auth/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/auth/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
