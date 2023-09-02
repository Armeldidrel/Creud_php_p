<?php

include_once 'config.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
    <title>Document</title>
    <style>

    </style>
</head>

<body >

    // Je viens de faire une nouvelle modification dans mon fichier index php



    <div class="text-center">
        <h3 class="text-center text-info text-decoration-underline">Liste des Meilleurs programmeurs du CFI-CIRAS</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> ✅ Ajouter</button>
        <a href="impresionListe.php" target="_blank" ><button class="btn btn-info"> 🖨  Iprimer la liste</button></a>
        <div class="container py-5">
            <table class="table  table-success table-hover table-bordered border-dark  table-striped">




                <tr class=" table-info table-bordered border-dark">
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
                <?php

                $r = $conn->query("SELECT * FROM pers ");
                $r->execute();

                while ($resultat = $r->fetch(PDO::FETCH_ASSOC)) {
                    $dd = $resultat['id'];

                    echo " <tr>
                    <td scope=\"row\">" . $resultat['nom'] . "</td>
                    <td>" . $resultat['prenom'] . "</td>
                    <td>
                        <boutton class=\"btn btn-secondary btn-sm\" >❕Details</boutton>
                    </td>
                    <td>
                        <boutton class=\"btn btn-warning btn-sm\">📝Modifier</boutton>
                    </td>
                    <td>
                    <a href=\"#?id=" . $resultat['id'] . "\"><boutton class=\"btn btn-danger btn-sm\"  data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" > ⛔️ Supprimer</boutton></a>
                    </td>
                </tr>";
                } ?>
            </table>
        </div>
    </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" fill="#FF0000" />
                            <text x="50" y="50" text-anchor="middle" alignment-baseline="middle" font-size="60" fill="#FFFFFF">!</text>
                        </svg>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer l'etudiant <?php

                                                                    $r = $conn->query("SELECT * FROM pers WHERE id=" . $dd . "");
                                                                    $r->execute();
                                                                    $res = $r->fetch(pdo::FETCH_ASSOC);
                                                                    echo  $res['nom'] . " " . $res['prenom'];

                                                                    ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <?php
                    echo "<a href=\"delete.php?id=" . $dd . "\"><boutton class=\"btn btn-danger\" onclick=\"mes()\">Supprimer</boutton></a>";

                    ?>

                </div>
            </div>
        </div>
    </div>
    <script>
        function mes() {

            setTimeout(() => {

                alert("Etudiant supprimer avec succes  ! ");
            }, 3000);
        }
    </script>
</body>

</html>