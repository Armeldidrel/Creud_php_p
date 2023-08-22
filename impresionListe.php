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

<h3 class="text-center text-dark text-decoration-underline " style="margin-top:90px;">Liste des Meilleurs programmeurs du CFI-CIRAS</h3>


    <div class="text-center">
        <button class="btn btn-info"  onclick="imprimer()" id="btn-impr"> 🖨  Iprimer la liste</button>
        <div class="container py-5">
            <table class="table   table-hover table-bordered border-dark  table-striped">




                <tr class=" table-danger  table-border border-dark ">
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                </tr>
                <?php

                $r = $conn->query("SELECT * FROM pers ");
                $r->execute();

                while ($resultat = $r->fetch(PDO::FETCH_ASSOC)) {
                    $dd = $resultat['id'];

                    echo " <tr>
                    <td scope=\"row\">" . $resultat['nom'] . "</td>
                    <td>" . $resultat['prenom'] . "</td>
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
        function imprimer(){
            let btn = document.getElementById("btn-impr");
            btn.style.display="none";            
            window.print();
        }
        function mes() {

            setTimeout(() => {

                alert("Etudiant supprimer avec succes  ! ");
            }, 3000);
        }
    </script>
</body>

</html>