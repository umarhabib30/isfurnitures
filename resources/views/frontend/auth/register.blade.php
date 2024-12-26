<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <!-- Register Page -->
    <div class="form-container" >
        <h3 class="text-center">Register</h3>
        <form id="registerForm"  method="POST" action="{{route('register')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password" name="confirm_password" required>
                <div id="error-message" class="error-message"></div>
            </div>
            <button type="submit" class="btn btn-custom w-100">Register</button>
        </form>
        <p class="text-center mt-3">Already have an account? <a href="{{route('login.view')}}" class="text-decoration-none" style="color: #3B5D50;">Login</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add event listener to the form
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            // Get the password and confirm password values
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const errorMessage = document.getElementById('error-message');

            // Check if passwords match
            if (password !== confirmPassword) {
                // Prevent form submission
                event.preventDefault();
                // Show error message
                errorMessage.textContent = "Passwords do not match. Please try again.";
                errorMessage.style.display = "block"; // Make sure the error message is visible
            } else {
                // Clear error message if passwords match
                errorMessage.textContent = "";
                errorMessage.style.display = "none"; // Hide the error message
            }
        });
    </script>
</body>

</html>
