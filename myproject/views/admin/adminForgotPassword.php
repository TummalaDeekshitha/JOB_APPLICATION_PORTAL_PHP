<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form Portal</title>
</head>
<body style="font-family: Arial, sans-serif; background-image: linear-gradient(-60deg, #ff5858 0%, #f09819 100%);; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div style="background: #fff; max-width: 400px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">

        <h2>Admin Login</h2>

        <form style="text-align: left; margin-top: 20px;" action="/admin/adminabout" method="post">
            
            <label for="email">Admin Email:</label>
            <input type="email" id="email1" name="email1" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;" required>

            <label for="password">Password:</label>
            <input type="password" id="password1" name="password1" style="width: 100%; padding: 8px; margin-bottom: 20px; box-sizing: border-box;" required>

            <button type="submit" style="background-color: #FF4500; /* Green */
                   border: none;
                   color: white;
                   padding: 10px 20px;
                   text-align: center;
                   text-decoration: none;
                   display: inline-block;
                   font-size: 16px;
                   margin-right: 10px;
                   cursor: pointer;"
            >
               login
            </button>
            <p>forgot password <a href="/admin/adminforgotpassword">reset password</a></p>
        </form>
         <div id="messageContainer"><?php echo $message; ?></div>
    </div>

    

</body>
</html>
