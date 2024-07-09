<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sipermat | Login Admin</title>
    <link rel="stylesheet" href="/css/kaprodi_login.css">
    <link rel="icon" href="{{ asset('storage/image/logounj.png') }}" >
</head>

<body>
    <div class="container">
        <div id="login" class="signin-card">
            <div class="logo-image">
                <img src="https://portal.unj.ac.id/img/logo_unj_green_small.png" alt="Logo" title="Logo"
                    width="138">
            </div>
            <h1 class="display1">Sipermat Login</h1>
            <p class="subhead">Admin Program Studi</p>
            <form action="{{ route('admin_login_submit') }}" method="POST">
                @csrf
                <div id="form-login-username" class="form-group">
                    <input id="username" class="form-control" name="email" type="text" size="18"
                        alt="login" placeholder="E-Mail" required />
                </div>
                <div id="form-login-password" class="form-group">
                    <input id="passwd" class="form-control" name="password" type="password" size="18"
                        alt="password" placeholder="Password" required>
                    <span class="form-highlight"></span>
                </div>
                <div>
                    <button class="btn btn-block btn-info ripple-effect" type="submit" name="Submit"
                        alt="sign in">Login</button>
                </div>
        </div>
        </form>
    </div>
    </div>


    <!--SWEETALERT-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '{!! implode('<br>', $errors->all()) !!}'
            });
        @endif

        @if (Session::get('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ Session::get('error') }}'
            });
        @endif

        @if (Session::get('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}'
            });
        @endif
    </script>

</body>

</html>
