<?php
// Conectarea la baza de date MongoDB
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Verificăm dacă s-a primit un ID valid prin metoda GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Definim filtrele pentru ștergere
    $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];

    // Definim operația de ștergere
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete($filter);

    // Executăm operația de ștergere
    $result = $manager->executeBulkWrite('Students1db.Students3', $bulk);

    // Redirecționăm către pagina principală
    header("Location: tabel_student.php");
    exit();
} else {
    // Dacă nu s-a primit un ID valid, afișăm un mesaj de eroare
    echo "ID invalid!";
}
?>
