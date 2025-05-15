<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        * {
            box-sizing: border-box;
            color:#1b4965;
        }

        body {
            background-color: #cae9ff;
        }

        .container {
            margin: 0 25%;
            width: 50%;
            padding: 16px;
            background-color: #fff;
        }

        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            color: #000;
        }

        input:focus {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .savebtn {
            background-color: #1b4965;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .savebtn:hover {
            opacity:1;
        }

        .logoutBtn {
            background-color: lightcoral;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            text-align: center;
        }

        a {
            color: dodgerblue;
        }

        .bottom-link {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    <div class="container">
        <h1>Your Profile</h1>
        <p>Update your information below.</p>
        <hr>

        <label for="name"><b>Name</b></label>
        <input type="text" value="{{ $user->name ?? '' }}" name="name" id="name" required>

        <label for="email"><b>Email</b></label>
        <input type="email" value="{{ $user->email ?? '' }}" name="email" id="email" required>

        <label for="password"><b>New Password</b> (leave blank to keep old)</label>
        <input type="password" value="{{ $user->password ?? '' }}" name="password" id="password">

        <button type="submit" class="savebtn">Save Changes</button>
        <div type="submit" class="logoutBtn" id="logoutBtn">Logout</div>
        
    </div>

</form>
<script>
    document.getElementById('logoutBtn').addEventListener('click', function() {
        // Redirect to logout route
        window.location.href = "{{ route('logout') }}";
    });
</script>
</body>
</html>