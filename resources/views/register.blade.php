<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/assets/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Task Note | Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login-me">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif --}}
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <form class="user" method="POST" action="">
                                @csrf
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Username" name="name" value="{{ old('name')}}">
                                            @error('name')<span class="text-danger ml-3 mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror

                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" value="{{ old('email')}}">
                                        @error('email')<span class="text-danger ml-3 mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password" value="{{ old('password')}}">
                                            @error('password')<span class="text-danger ml-3 mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation">
                                           
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block"> Register Account</button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>