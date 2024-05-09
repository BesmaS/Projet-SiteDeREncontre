<!DOCTYPE html>
<html>
<head>
<title> Se Connecter </title>
</head>
<style>
    body {
    background: #333;
    font-family: Arial, Helvetica, sans-serif;
    height: 100vh;
    background-color: rgba(30, 28, 28, 0.849);
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    overflow-x: hidden;
}

h2 {
            text-align: center;
            font-size:  40px;
            color: #f1f1f1;
            font-family: Abril fatface, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: rgba(30, 28, 28, 0.849) ;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #f1f1f1;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 50%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            
        }

        input[type="submit"]:hover {
            background-color:#2e7032;
        }

        .logo {
            position: absolute;
            right: 2%;
            top: 1%;
            width: 90px;
            height: 90px;
            cursor: pointer;
        }

        .container {
        display: flex;
        justify-content: center;
        }
</style>
<body>

<h2>Connexion</h2>

<img src="images/logo-Spotilove.png" class="logo">

<form action="verification.php" method="POST">
Nom d'utilisateur <input type="text" name="username" required><br>
Mot de passe <input type="Password" name="password" required><br>
<p>
<input type=submit value="Se Connecter">
</body>
</html>