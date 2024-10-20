<?php
    require "dbBroker.php";
    require "model/prijava.php";
    require "handler/delete.php";
    require "handler/add.php";

    // echo "obrada..";

    header("Location: home.php");

    if ($_POST['action'] == 'getById') {
        $id = $_POST['id_predmeta'];
        $result = Prijava::getById($id, $conn);
        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_assoc());
        } else {
            echo json_encode(['error' => 'Nema podataka']);
        }
        exit();
    }
    if (isset($_POST['submit']) && $_POST['submit'] == 'izmeni') {
        $id = $_POST['id_predmeta'];
        $predmet = $_POST['predmet'];
        $katedra = $_POST['katedra'];
        $sala = $_POST['sala'];
        $datum = $_POST['datum'];
    
        $result = Prijava::update($id, $predmet, $katedra, $sala, $datum, $conn);
    
        if ($result) {
            header("Location: home.php");
        } else {
            echo "Greška prilikom ažuriranja.";
        }
    }
?>