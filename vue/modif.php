<?php
require "../model/model_contact.php";
$conn = new Model();
$connect = $conn->database();
$id_connect = $_GET['id_contact'];
$modif = new Model();
$contact = $modif->recup($id_connect, $connect);



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulaire de contact</title>
    <link rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Contact</h1>
    <form action="/mvc_contact/controller/control_contact.php" method="post">
        <input type="hidden" name="num" value="<?php echo $contact['id_contact']; ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="last_name" value="<?php echo $contact['nom_contact']; ?>">

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="first_name" value="<?php echo $contact['prenom_contact']; ?>">

        <label for="email">Email :</label>
        <input type="email" id="email" name="user_email" value="<?php echo $contact['mail_contact']; ?>">

        <label for="telephone">Tél :</label>
        <input type="tel" id="telephone" name="user_telephone" value="<?php echo $contact['tel']; ?>">


        <input type="submit" value="Modifiez" name="modif">
    </form>
</body>

</html>