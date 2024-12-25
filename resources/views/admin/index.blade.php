<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;    /* Center vertically */
            height: 100vh;          /* Full viewport height */
            background-color: #f5f5f5; /* Optional: add a background color */
        }

        .login-container {
            max-width: 500px; /* Adjust width for a cleaner layout */
            width: 100%;
            padding: 20px;
            border-radius: 12px;
            background-color: white; /* Background color for the form container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for better aesthetics */
        }

        .form input {
            width: 100%;
            height: 40px;
            margin: 10px 0;
            border-radius: 25px;
            border: none;
            padding: 0 15px;
            font-size: 1rem;
        }

        .button {
            height: 40px;
            width: 120px;
            border-radius: 25px;
            border: none;
            color: white;
            background-color: rgb(25, 105, 255);
            cursor: pointer;
        }

        .button:hover {
            background-color: white;
            color: tomato;
            border: 1px solid tomato;
        }

        .toggle-link {
            color: rgb(49, 32, 209);
            font-size: 14px;
            text-decoration: none;
        }

        .toggle-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <h2 class="text-center text-dark mb-4">Log In</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input class="text-center fs-4 m-1" type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        
            <input class="text-center fs-4" type="password" name="password" placeholder="Password" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="button">Login</button>
            </div>
        
            <div class="text-center mt-4">
                <a href="{{ route('shop.index') }}" class="text-decoration-none toggle-link">Back to the shop</a>
            </div>
        </form>
        
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
