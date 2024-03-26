<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificare Exmatriculare</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        form {
            margin: 20px auto;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 8px;
            margin: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin: 20px auto;
            width: 80%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Verificare Exmatriculare</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="student_id">ID Student:</label>
        <input type="text" id="student_id" name="student_id" required>
        <button type="submit">Verificare</button>
    </form>

    <div class="result">
        <?php
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $studentId = $_POST["student_id"];
            echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">";
            echo "<input type=\"hidden\" name=\"student_id\" value=\"$studentId\">";
            echo "<label>A avut studentul absențe la ore? (da/nu): <input type=\"text\" name=\"absente\"></label><br>";
            echo "<button type=\"submit\">Verificare Motiv</button>";
            echo "</form>";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["absente"])) {
            $absente = $_POST["absente"];
            if ($absente == "da") {
                echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"student_id\" value=\"$studentId\">";
                echo "<label>A avut mai mult de 70% absențe la ore? (da/nu): <input type=\"text\" name=\"multe_absente\"></label><br>";
                echo "<button type=\"submit\">Verificare Motiv</button>";
                echo "</form>";
            } elseif ($absente == "nu") {
                echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"student_id\" value=\"$studentId\">";
                echo "<label>Este studentul pe buget sau pe contract? (buget/contract): <input type=\"text\" name=\"tip\"></label><br>";
                echo "<button type=\"submit\">Verificare Motiv</button>";
                echo "</form>";
            } else {
                echo "<p>Vă rugăm să introduceți o valoare validă (da/nu).</p>";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["multe_absente"])) {
            $multeAbsente = $_POST["multe_absente"];
            if ($multeAbsente == "da") {
                // Aici puteți continua procesarea și afișarea formularului pentru celelalte întrebări
                echo "<p>Exmatriculare: Absențe multe la ore.</p>";
            } elseif ($multeAbsente == "nu") {
                echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"student_id\" value=\"$studentId\">";
                echo "<label>A plătit studentul contractul? (da/nu): <input type=\"text\" name=\"platit\"></label><br>";
                echo "<button type=\"submit\">Verificare Motiv</button>";
                echo "</form>";
            } else {
                echo "<p>Vă rugăm să introduceți o valoare validă (da/nu).</p>";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["platit"])) {
            $platit = $_POST["platit"];
            if ($platit == "da") {
                // Aici puteți continua procesarea și afișarea formularului pentru celelalte întrebări
                echo "<p>Exmatriculare: Neplata contractului.</p>";
            } elseif ($platit == "nu") {
                echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"student_id\" value=\"$studentId\">";
                echo "<label>A obținut studentul note pozitive la toate examenele? (da/nu): <input type=\"text\" name=\"examene\"></label><br>";
                echo "<button type=\"submit\">Verificare Motiv</button>";
                echo "</form>";
            } else {
                echo "<p>Vă rugăm să introduceți o valoare validă (da/nu).</p>";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["examene"])) {
            $examene = $_POST["examene"];
            if ($examene == "da") {
                echo "<p>Exmatriculare: Note scăzute la reexaminare.</p>";
            } elseif ($examene == "nu") {
                echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"student_id\" value=\"$studentId\">";
                echo "<label>Este satisfăcut studentul cu modul de predare al profesorului? (da/nu): <input type=\"text\" name=\"satisfacut\"></label><br>";
                echo "<button type=\"submit\">Verificare Motiv</button>";
                echo "</form>";
            } else {
                echo "<p>Vă rugăm să introduceți o valoare validă (da/nu).</p>";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["satisfacut"])) {
            $satisfacut = $_POST["satisfacut"];
            if ($satisfacut == "nu") {
                echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"student_id\" value=\"$studentId\">";
                echo "<label>I se pare greu studentului să învețe? (da/nu): <input type=\"text\" name=\"greu\"></label><br>";
                echo "<button type=\"submit\">Verificare Motiv</button>";
                echo "</form>";
            } else {
                echo "<p>Studentul cu ID-ul $studentId nu este exmatriculat.</p>";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["greu"])) {
            $greu = $_POST["greu"];
            if ($greu == "da") {
                echo "<p>Exmatriculare: Propria dorință.</p>";
            } elseif ($greu == "nu") {
                echo "<p>Studentul cu ID-ul $studentId nu este exmatriculat.</p>";
            } else {
                echo "<p>Vă rugăm să introduceți o valoare validă (da/nu).</p>";
            }
        } else {
            echo "<table>";
            echo "<tr><th>ID Student</th><th>Tip Finantare</th><th>Gen</th><th>Grupa Academica</th><th>Data Inscrierii</th><th>Reusita</th><th>Ani</th></tr>";
            afiseazaStudenti("Students2");
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
