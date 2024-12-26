<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            background-color: #EFF2F1;
            color: #3B5D50;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #3B5D50;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #3B5D50;
            color: #EFF2F1;
        }

        .btn-custom:hover {
            background-color: #2F4B43;
            color: #fff;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 40px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <!-- Register Page -->
    <div class="form-container mt-5">
        <h3 class="text-center">Login</h3>
        <form id="loginForm"  method="POST" action="{{route('user.login')}}" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label for="login-email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="login-email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3 position-relative">
                <label for="login-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter your password">
                <span class="password-toggle" onclick="togglePassword()">👁️</span>
            </div>
            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="{{route('register.view')}}" class="text-decoration-none" style="color: #3B5D50;">Register</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('login-password');
            const passwordFieldType = passwordField.type;
            if (passwordFieldType === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const email = document.getElementById('login-email').value;
            const password = document.getElementById('login-password').value;

            if (!email || !password) {
                event.preventDefault();
                alert("Please fill in both fields.");
            }
        });
    </script>
</body>

</html>
