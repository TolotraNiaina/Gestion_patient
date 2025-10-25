<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/require.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/FontAwesome/css/all.min.css">
    <title>require</title>
</head>
    <body>
        <main>
            <section>
                   <div>
                       <p>POLYCLINIQUE</p>
                   </div>
                   <div>
                        <ul>
                            <li><i class="fa fa-chart-line"> <a href="../view/dashboard.php">Tableau de bord</a></i></li>
                            <li><i class="fa fa-user-md"> <a href="../models/medecin.php">Medecin</a></i></li>
                            <li><i class="fa fa-user-injured"> <a href="../models/patient.php">Patient</a></i></li>
                            <li><i class="fa fa-thumbtack"> <a href="../models/consultation.php">Consultation</a></i></li>
                            <li><i class="fa fa-building"> <a href="">Departement</a></i></li>
                        </ul>
                   </div>
            </section>
            <header>
                <form method="GET" action="../models/consultation.php"></form>
                <div>
                    <input type="text" name="query" placeholder="Entrer un nom. . . . . ." class="form-control size">
                </div>
                <div>
                    <bouton type="submit" value="Recherche" class="btn btn-outline-success bouton">Recherche</bouton>
                </div>
                </form>
            </header>
            <article>
                
            </article>
        </main>
    </body>
</html>