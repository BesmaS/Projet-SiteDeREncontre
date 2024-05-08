<!DOCTYPE html>
<html>
<head>
    <title>Inscription-SpotiLove</title>
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
    <script>
        function mdpvalide() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword) {
                alert("Les mots de passe ne correspondent pas.");
                return false;
            }
            return true;
        }

        function validateAge() {
            var dob = new Date(document.getElementById("date").value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var m = today.getMonth() - dob.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 18) {
                alert("Vous devez avoir au moins 18 ans pour vous inscrire.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Inscription</h2>

    <img src="images/logo-Spotilove.png" class="logo">

    <form method="post" action="Saveinscription.php" >
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="date">Date de naissance:</label>
        <input type="date" id="date" name="daten" required onblur="validateAge();">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirmer mot de passe:</label>
        <input type="password" id="confirm_password" name="confirm_password" required onblur="return mdpvalide();>

        <input type="hidden" id="age" name="age">
        <div class="container">
            <input type="submit" value="S'inscrire">
        </div>
    </form> 
</body>
</html>
