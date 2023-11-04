<?php

require "../model/model_contact.php";

class Control
{
    private $connexion;

    public function __construct($conn)
    {
        $this->connexion = $conn;
    }

    public function ajout()
    {
        if (isset($_POST["envoie"])) {
            $nom = $_POST["last_name"];
            $prenom = $_POST["first_name"];
            $mail = $_POST["user_email"];
            $tel = $_POST["user_telephone"];

            $sql1 = "INSERT INTO annuaire (nom_contact, prenom_contact, mail_contact, tel) VALUES(:nom_contact, :prenom_contact, :mail_contact, :tel)";
            $prepare = $this->connexion->prepare($sql1);
            $prepare->bindValue(':nom_contact', $nom);
            $prepare->bindValue(':prenom_contact', $prenom);
            $prepare->bindValue(':mail_contact', $mail);
            $prepare->bindValue(':tel', $tel);

            if ($prepare->execute()) {
                echo "<strong>Contact ajouté!!! </strong>";
                echo "<button><a href='liste_contact.php'>Liste des contacts</a></button>";
            } else {
                echo "<strong>Contact non ajouté</strong>";
            }
        }
    }
}

$conn = new Model();
$conn->database();
$ajout = new Control($conn);

$ajout->ajout();
