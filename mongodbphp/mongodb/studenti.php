<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analiza studenților de la Universitate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Analiza studenților la Universitate</h2>
        <a href="tabel_student.php" class="btn btn-primary">Informații</a>
        <button onclick="showExmatriculati()" class="btn btn-primary">Studenții exmatriculați</button>
        <button onclick="showTotiStudentii()" class="btn btn-secondary">Studenții înmatriculați</button>
        <table id="studentsTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID Student</th>
                    <th>Tip Finanțare</th>
                    <th>Gen</th>
                    <th>Grupă Academică</th>
                    <th>Data Înscrierii</th>
                    <th>Reușită</th>
                    <th>Ani</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Funcție pentru afișarea studenților dintr-o colecție specifică
                function afiseazaStudenti($colectie) {
                    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $database = "Students1db";
                    $filter = [];
                    $options = [];
                    $query = new MongoDB\Driver\Query($filter, $options);
                    $cursor = $manager->executeQuery("$database.$colectie", $query);
                    foreach ($cursor as $document) {
                        echo "<tr>";
                        echo "<td>" . $document->ID_Student . "</td>";
                        echo "<td>" . $document->Tip_Finantare . "</td>";
                        echo "<td>" . $document->Gen . "</td>";
                        echo "<td>" . $document->Grupa_Academica . "</td>";
                        echo "<td>" . $document->Data_inscrierii . "</td>";
                        echo "<td>" . $document->Reusita . "</td>";
                        echo "<td>" . $document->Ani . "</td>";
                        echo "</tr>";
                    }
                }
                // Afișăm inițial toți studenții
                afiseazaStudenti("Students1");

                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showExmatriculati() {
            // Afișăm doar studenții exmatriculați într-un alt tabel
            document.getElementById("studentsTable").innerHTML = `
                <thead>
                    <tr>
                        <th>ID Student</th>
                        <th>Tip Finanțare</th>
                        <th>Gen</th>
                        <th>Grupă Academică</th>
                        <th>Data Înscrierii</th>
                        <th>Reușită</th>
                        <th>Ani</th>
                    </tr>
                </thead>
                <tbody>
                    <?php afiseazaStudenti("Students2"); ?>
                </tbody>
            `;
        }

        function showTotiStudentii() {
            // Afișăm toți studenții din colecția "Students1" în tabelul principal
            document.getElementById("studentsTable").innerHTML = `
                <thead>
                    <tr>
                        <th>ID Student</th>
                        <th>Tip Finanțare</th>
                        <th>Gen</th>
                        <th>Grupă Academică</th>
                        <th>Data Înscrierii</th>
                        <th>Reușită</th>
                        <th>Ani</th>
                    </tr>
                </thead>
                <tbody>
                    <?php afiseazaStudenti("Students1"); ?>
                </tbody>
            `;
        }
    </script>
</body>
</html>
