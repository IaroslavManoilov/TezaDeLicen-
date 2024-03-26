<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Student</title>
    <!-- Link către Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <style>
        body {
            background: #67B26F;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #4ca2cd, #67B26F);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #4ca2cd, #67B26F); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            padding: 0;
            margin: 0;
            font-family: 'Lato', sans-serif;
            color: #000;
        }

        .student-profile {
            padding: 20px;
        }

        .profile_img {
            width: 100%;
            border-radius: 50%;
        }

        .card-header h3 {
            font-weight: bold;
            font-size: 24px;
        }

        .table th {
            width: 30%;
        }

        .table td, .table th {
            border: none;
        }

        .card-body p {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            <img class="profile_img" src="profile_picture.jpg" alt="Student Profile Picture">
                            <h3>Student exmatriculat</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-0"><strong class="pr-1">ID Student:</strong>15</p> <!-- Updated ID -->
                            <p class="mb-0"><strong class="pr-1">Gen:</strong>Masculin</p> <!-- Updated Gender -->
                            <p class="mb-0"><strong class="pr-1">Grupă academică:</strong>MI-211</p> <!-- Updated Academic Group -->
                            <p class="mb-0"><strong class="pr-1">Tip finanțe:</strong>Contractier</p> <!-- Updated Finance Type -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Informații Generale</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>15</td> <!-- Updated ID -->
                                </tr>
                                <tr>
                                    <th>Anul inmatricularii</th>
                                    <td>2022</td> <!-- Updated Enrollment Year -->
                                </tr>
                                <tr>
                                    <th>Reușita</th>
                                    <td>6</td> <!-- Updated Success -->
                                </tr>
                                <tr>
                                    <th>Ani</th>
                                    <td>25</td> <!-- Updated Age -->
                                </tr>
                                <tr>
                                    <th>Anul Exmatricuării</th>
                                    <td>2023</td> <!-- Updated Year of Exmatriculation -->
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="height: 26px"></div>
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Informații pentru exmatriculare</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p>Motivul exmatriculării: propria dorință</p> <!-- Updated Exmatriculation Reason -->
                            <p>Recomandări: Studentul ar trebui să caute ajutor suplimentar și să își organizeze mai bine timpul pentru învățare</p> <!-- Updated Recommendations -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Butonul Back -->
    <div style="position: fixed; bottom: 20px; right: 20px;">
        <a href="tabel_studenti.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</body>
</html>
