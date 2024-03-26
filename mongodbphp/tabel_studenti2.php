<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motive Exmatriculare</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        table {
            margin: 20px auto;
            width: 80%;
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
    <link rel="stylesheet" href="style.css">



    <style>
    .container {
        margin-top: 50px;
    }
</style>
<style>
    .container {
        margin-top: 50px;
    }

    /* Stilizare pentru nav */
    .nav {
        display: flex;
        justify-content: space-between;
        align-items: center;

        padding: 10px 20px;
    }

    .nav .nav-items .nav-link{
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

    /* Stilizare pentru linkurile UTM */
    .utm-link {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    /* Stilizare pentru linkurile "Analiza" și "Verificarea" */
    .analysis-verification-links {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>

<style>

button.btn{
border: none;
border-radius: 2rem;
padding: 0.2rem 0.5rem;
font-size: 1rem;
font-family: var(--Livvic);
cursor: pointer;
}
</style>

<style>
.nav .nav-items .nav-link {
padding: 1.6rem 1rem;
font-size: 1.1rem;
position: relative;
font-family: var(--Abel);
font-size: 1.1rem;

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
                <a href="tabel_studenti.php">Verificare Studenților Exmatriculați</a>
            </li>   
        </ul>
    </div>
</nav>
<h2>Motive Exmatriculare Studenți</h2>
<table>
    <tr>
        <th>ID Student</th>
        <th>Gen</th>
        <th>Anul Exmatriculării</th>
        <th>Motiv Exmatriculare</th>
        <th>Recomandări</th>
    </tr>

    <?php
// Define the student data with specific reasons and years for each student
$students = [
    ["ID_Student" => 2, "Gen" => "Feminin", "Anul Exmatriculării" => 2023, "Motiv" => "Neplata contractului"],
    ["ID_Student" => 8, "Gen" => "Masculin", "Anul Exmatriculării" => 2023, "Motiv" => "Neplata contractului"],
    ["ID_Student" => 15, "Gen" => "Masculin", "Anul Exmatriculării" => 2023, "Motiv" => "Propria dorință"],
    ["ID_Student" => 17, "Gen" => "Masculin", "Anul Exmatriculării" => 2021, "Motiv" => "Note scăzute la reexaminare"],
    ["ID_Student" => 18, "Gen" => "Masculin", "Anul Exmatriculării" => 2022, "Motiv" => "Absențe multe la ore"],
    ["ID_Student" => 19, "Gen" => "Masculin", "Anul Exmatriculării" => 2021, "Motiv" => "Note scăzute la reexaminare"],
    ["ID_Student" => 24, "Gen" => "Masculin", "Anul Exmatriculării" => 2021, "Motiv" => "Neplata contractului"],
    ["ID_Student" => 25, "Gen" => "Masculin", "Anul Exmatriculării" => 2022, "Motiv" => "Propria dorință"],
    ["ID_Student" => 26, "Gen" => "Masculin", "Anul Exmatriculării" => 2022, "Motiv" => "Absențe multe la ore"],
    ["ID_Student" => 33, "Gen" => "Feminin", "Anul Exmatriculării" => 2021, "Motiv" => "Neplata contractului"],
    ["ID_Student" => 34, "Gen" => "Feminin", "Anul Exmatriculării" => 2022, "Motiv" => "Absențe multe la ore"],
    ["ID_Student" => 43, "Gen" => "Masculin", "Anul Exmatriculării" => 2023, "Motiv" => "Note scăzute la reexaminare"],
    ["ID_Student" => 44, "Gen" => "Masculin", "Anul Exmatriculării" => 2022, "Motiv" => "Note scăzute la reexaminare"],
    ["ID_Student" => 45, "Gen" => "Masculin", "Anul Exmatriculării" => 2023, "Motiv" => "Propria dorință"],
    ["ID_Student" => 49, "Gen" => "Masculin", "Anul Exmatriculării" => 2023, "Motiv" => "Propria dorință"]
];

// Define motivele și recomandările
$motive_recomandari = [
    "Absențe multe la ore" => "Este important ca studentul să fie prezent la cursuri și să respecte programul academic",
    "Neplata contractului" => "Studentul ar trebui să se asigure că respectă toți termenii și condițiile contractului academic",
    "Note scăzute la reexaminare" => "Studentul ar trebui să caute ajutor suplimentar și să își organizeze mai bine timpul pentru învățare",
    "Propria dorință" => "Studentul ar trebui să caute ajutor suplimentar și să își organizeze mai bine timpul pentru învățare"
];

// Loop through students and display their data
foreach ($students as $student) {
    echo "<tr>";
    echo "<td>" . $student['ID_Student'] . "</td>";
    echo "<td>" . $student['Gen'] . "</td>";
    echo "<td>" . $student['Anul Exmatriculării'] . "</td>";
    echo "<td>" . $student['Motiv'] . "</td>";
    echo "<td>" . $motive_recomandari[$student['Motiv']] . "</td>";
    echo "</tr>";
}
?>


</table>
</body>
</html>
