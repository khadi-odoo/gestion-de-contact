<?php

//use Control as GlobalControl;

require "../model/model_contact.php";

$conn = new Model();
$connexion = $conn->database();



class Control
{

    private $nume;
    private $nom;

    private $prenom;

    private $mail;

    private $tel;

    public function __construct()
    {

        $this->nume;
        $this->nom;
        $this->prenom;
        $this->mail;
        $this->tel;
    }

    public function getNume()
    {

        return $this->nume;
    }


    public function getNom()
    {

        return $this->nom;
    }

    public function setNom($nom)
    {
        if (is_string($nom)) {
            $this->nom = $nom;
        } else {
            throw new Exception("Le nom doit contenir uniquement des chaines de caractère");
        }
    }


    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        if (is_string($prenom)) {
            $this->prenom = $prenom;
        } else {
            throw new Exception("Le prénom doit contenir uniquement des chaines de caractère");
        }
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $email = filter_var($mail, FILTER_VALIDATE_EMAIL);

        if ($email) {
            $this->mail = $mail;
        } else {
            throw new Exception("Entrez un email correct");
        }
    }

    public function getTel()
    {

        return $this->tel;
    }

    public function setTel($tel)
    {
        $pattern = '/^(\\+\\d{1,3})?\\s*(\\d{1,3})?\\s*(\\d{3})\\s*(\\d{2})\\s*(\\d{2})$/';

        $tel = $pattern;
        if ($tel) {
            $this->tel = $tel;
        } else {
            throw new Exception("Le numéro de tétéphone entré est incorect !!!");
        }
    }

    public function ajout($connexion, $nom, $prenom, $mail, $tel)
    {

        $sql1 = "INSERT INTO annuaire (nom_contact, prenom_contact, mail_contact, tel)
            VALUE(:nom_contact, :prenom_contact, :mail_contact, :tel)";
        $prepare = $connexion->prepare($sql1);
        $prepare->bindValue(':nom_contact', $nom);
        $prepare->bindValue(':prenom_contact', $prenom);
        $prepare->bindValue(':mail_contact', $mail);
        $prepare->bindValue(':tel', $tel);

        if ($prepare->execute()) {
            echo "<strong>Contact ajouté!!! </strong> <br><br>";
            echo "<button><a href='../vue/view_contact.html'><strong>Retour</strong></a></button> <br> <br>";
        } else {
            echo "<strong>Contact non ajouté</strong>";
        }
    }

    public function listeContact($connexion)
    {

        $sql2 = "SELECT * FROM annuaire";

        $recup = $connexion->query($sql2);



        if ($recup->rowCount() > 0) {
            echo "<table border=1>";
            echo "<tr><th>Id</th><th>Nom</th><th>Prénom</th><th>E-mail</th><th>Téléphone</th><th>Action</th></tr>";

            while ($row = $recup->fetch()) {
                echo "<tr>";
                echo "<td>" . $row["id_contact"] . "</td>";
                echo "<td>" . $row["nom_contact"] . "</td>";
                echo "<td>" . $row["prenom_contact"] . "</td>";
                echo "<td>" . $row["mail_contact"] . "</td>";
                echo "<td>" . $row["tel"] . "</td>";




                echo "<td><a href='../vue/modif.php/?id_contact=" . $row["id_contact"] . "'><button style='background-color: green; color: white;'>Modifier</button></a>";
                echo "<form action='../vue/modif.php method='post'>";
                echo '<input type="hidden" name="nume" value="' . $row["id_contact"] . '">';
                echo "<a href='#'><button type='submit'  style='background-color: red; color: white;'>Supprimez</button></a>";

                echo " </td></tr>";
                echo "</form>";
            }
            echo "</table>";
        } else {
            echo "<strong> 0 contact !!!</strong>";
        }
    }



    function modifier($connexion, $num, $nom, $prenom, $mail, $tel)
    {
        $sql4 = "UPDATE annuaire SET nom_contact=:nom_contact, prenom_contact=:prenom_contact,
         mail_contact=:mail_contact, tel=:tel WHERE id_contact=:id_contact";
        $update = $connexion->prepare($sql4);
        $update->bindValue(":id_contact", $num);
        $update->bindValue(":nom_contact", $nom);
        $update->bindValue(":prenom_contact", $prenom);
        $update->bindValue(":mail_contact", $mail);
        $update->bindValue(":tel", $tel);

        if ($update->execute()) {
            echo "Contact modifié";
        }
    }

    function supprimer($connexion, $nume)
    {

        $sql5 = "DELETE FROM annuaire WHERE id_contact=:id_contact";
        $delete = $connexion->prepare($sql5);
        $delete->bindValue(":id_contact", $nume);

        if ($delete->execute()) {


            return "Supprimé";
        } else {
            return "Non supprimé";
        }
    }
}





$control = new Control();

if (isset($_POST["envoie"])) {
    $nom = $_POST["last_name"];
    $prenom = $_POST["first_name"];
    $mail = $_POST["user_email"];
    $tel = $_POST["user_telephone"];

    $control->ajout($connexion, $nom, $prenom, $mail, $tel);
} else {
    echo "<strong>Liste d'ajout <br> <br>";
}

$control->listeContact($connexion);

if (isset($_POST["modif"])) {
    $num = $_POST["num"];
    $nom = $_POST["last_name"];
    $prenom = $_POST["first_name"];
    $mail = $_POST["user_email"];
    $tel = $_POST["user_telephone"];
    $control->modifier($connexion, $num, $nom, $prenom, $mail, $tel);
} else {
    return "Contact non modifié";
}



if (isset($_POST['sup'])) {

    $nume = $_POST['nume'];
    $ajout->supprimer($connexion, $nume);
}
