<?php
// Conectarea la baza de date MongoDB
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Verificăm dacă s-au trimis date prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificăm dacă s-au trimis toate câmpurile necesare
    if (
        isset($_POST['ID_Student']) && isset($_POST['Tip_Finantare']) && 
        isset($_POST['Grupa_Academica']) && isset($_POST['Reusita']) && 
        isset($_POST['Motive_Exmatriculare']) && isset($_POST['id'])
    ) {
        // Preluăm datele din formular
        $id = $_POST['id'];
        $idStudent = $_POST['ID_Student'];
        $tipFinantare = $_POST['Tip_Finantare'];
        $grupaAcademica = $_POST['Grupa_Academica'];
        $reusita = $_POST['Reusita'];
        $motiveExmatriculare = $_POST['Motive_Exmatriculare'];

        // Definim filtrele pentru actualizare
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];

        // Definim datele noi pentru actualizare
        $newData = [
            'ID_Student' => $idStudent,
            'Tip_Finantare' => $tipFinantare,
            'Grupa_Academica' => $grupaAcademica,
            'Reusita' => $reusita,
            'Motive_Exmatriculare' => $motiveExmatriculare
        ];

        // Definim operația de actualizare
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update($filter, ['$set' => $newData]);

        // Executăm operația de actualizare
        $result = $manager->executeBulkWrite('Students1db.Students3', $bulk);

        // Redirecționăm către pagina principală
        header("Location: tabel_student.php");
        exit();
    } else {
        // Dacă nu s-au trimis toate câmpurile obligatorii, afișăm un mesaj de eroare
        echo "Toate câmpurile obligatorii trebuie completate!";
    }
} else {
    // Dacă nu s-a trimis un request de tip POST, afișăm un mesaj de eroare
    echo "Acces invalid!";
}
?>
