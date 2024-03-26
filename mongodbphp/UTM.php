<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analiza studenților de la Universitate</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <style>
        .container {
            margin-top: 50px;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .nav .nav-items .nav-link {
            padding: 1rem 1rem;
            font-size: 1.1rem;
            position: relative;
            font-family: var(--Abel);
            font-size: 1.1rem;
        }

        .nav-items {
            display: flex;
            gap: 20px;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            text-decoration: none;
            color: black;
        }

        .utm-link {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .analysis-verification-links {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        button.btn {
            border: none;
            border-radius: 2rem;
            padding: 0.2rem 0.5rem;
            font-size: 1rem;
            font-family: var(--Livvic);
            cursor: pointer;
        }
    </style>
</head>
<body>
<nav class="nav">
    <div class="utm-link">
        <ul class="nav-items">
            <li class="nav-link">
                <a href="UTM.html">UTM</a>
            </li>
        </ul>
    </div>
    <div class="toggle-collapse">
        <div class="toggle-icons">
            <i class="fas fa-bars"></i>
        </div>
    </div>
    <div class="analysis-verification-links">
        <ul class="nav-items">
            <li class="nav-link">
                <a href="studenti.php">Studenții exmatriculați</a>
            </li>   
            <li class="nav-link">
                <a href="analiza.php">Analiza studenților</a>
            </li>
            <li class="nav-link">
                <a href="tabel_studenti.php">Informații</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h2>Verificarea studenților Grupelor MI</h2>
    <div class="mb-3">
        <div class="input-group mb-3">
            <input id="searchInput" type="text" class="form-control" placeholder="Caută după ID...">
            <button onclick="searchById()" class="btn btn-outline-secondary" type="button" id="button-addon2">Caută</button>
        </div>
        <a href="motive1.php" class="btn btn-primary">Analiza</a>
        <button onclick="showExmatriculati()" class="btn btn-primary">Studenții exmatriculați</button>
        <button onclick="showTotiStudentii()" class="btn btn-secondary">Studenții inmatriculați</button>
        <button onclick="stergeStudenti()" class="btn btn-danger">Șterge studenți</button>
        <table id="studentsTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Selectează</th>
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
                function afiseazaStudenti($colectie) {
                    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $database = "Studentsmidb";
                    $filter = [];
                    $options = [];
                    $query = new MongoDB\Driver\Query($filter, $options);
                    $cursor = $manager->executeQuery("$database.$colectie", $query);
                    foreach ($cursor as $document) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='selectat[]' value='" . $document->ID_Student . "'></td>";
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
                afiseazaStudenti("Students1");
                ?>
            </tbody>
        </table>
    </div>
    
</div>

<div class="modal fade" id="adaugaStudentModal" tabindex="-1" aria-labelledby="adaugaStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adaugaStudentModalLabel">Adăugare student nou</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="adaugaStudentFormModal" method="post">
                    <div class="mb-3">
                        <label for="ID_Student" class="form-label">ID Student</label>
                        <input type="text" class="form-control" id="ID_Student" name="ID_Student" required>
                    </div>
                    <div class="mb-3">
                        <label for="Tip_Finantare" class="form-label">Tip Finanțare</label>
                        <input type="text" class="form-control" id="Tip_Finantare" name="Tip_Finantare" required>
                    </div>
                    <div class="mb-3">
                        <label for="Gen" class="form-label">Gen</label>
                        <input type="text" class="form-control" id="Gen" name="Gen" required>
                    </div>
                    <div class="mb-3">
                        <label for="Grupa_Academica" class="form-label">Grupă Academică</label>
                        <input type="text" class="form-control" id="Grupa_Academica" name="Grupa_Academica" required>
                    </div>
                    <div class="mb-3">
                        <label for="Data_inscrierii" class="form-label">Data Înscrierii</label>
                        <input type="date" class="form-control" id="Data_inscrierii" name="Data_inscrierii" required>
                    </div>
                    <div class="mb-3">
                        <label for="Reusita" class="form-label">Reușită</label>
                        <input type="text" class="form-control" id="Reusita" name="Reusita" required>
                    </div>
                    <div class="mb-3">
                        <label for="Ani" class="form-label">Ani</label>
                        <input type="number" class="form-control" id="Ani" name="Ani" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Închide</button>
                <button type="button" class="btn btn-primary" id="submitStudentFormModal">Adaugă student</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showExmatriculati() {
        document.getElementById("studentsTable").innerHTML = `
            <thead>
                <tr>
                    <th>Selectează</th>
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
        document.getElementById("studentsTable").innerHTML = `
            <thead>
                <tr>
                    <th>Selectează</th>
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

    function searchById() {
        // Funcția pentru căutarea după ID Student
    }

    function stergeStudenti() {
        // Funcția pentru ștergerea studenților
    }

    document.getElementById("submitStudentFormModal").addEventListener("click", function() {
        // Funcția pentru trimiterea formularului de adăugare student
    });
</script>

</body>
</html>
