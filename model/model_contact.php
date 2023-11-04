<?php

class Model
{

    private $connect;


    public function __construct()
    {
        $this->connect;
    }
    public function database()
    {
        try {
            $connect = new PDO("mysql:host=localhost; dbname=contact", "root", "");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "<h3>Repertoire de contact</h3>";
            return $connect;
        } catch (PDOException $th) {
            die("Erreur de connexion" . $th->getMessage());
        }
    }



    public function getConnect()
    {

        return $this->connect;
    }

    public function recup($id_contact, $connect)
    {
        $sql3 = "SELECT * FROM annuaire WHERE id_contact = :id_contact";
        $recup1 = $connect->prepare($sql3);
        $recup1->bindValue(':id_contact', $id_contact);
        $recup1->execute();
        return $recup1->fetch();
    }
}
