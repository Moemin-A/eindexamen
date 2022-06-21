<?php session_unset();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leerlinggegevens</title>
    <link href="~/../libs/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="~/../libs/bootstrap.css">
    <script src="~/../libs/jquery.min.js"></script>
    <script src="~/../libs/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <a href="view/home.php" class="btn btn-success pull-left">Home</a>
                        <h2 class="pull-left">Leerlinggegevens</h2>
                    </div>
                    <?php
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Naam</th>";
                                        echo "<th>tussen</th>";
                                        echo "<th>Achternaam</th>";
                                        echo "<th>geboortedatum</th>";
                                        echo "<th>adres</th>";
                                        echo "<th>postcode</th>";
                                        echo "<th>woonplaats</th>";
                                        echo "<th>e-mail</th>";
                                        echo "<th>telefoon nummer</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['middlename'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['birthday'] . "</td>";
                                        echo "<td>" . $row['adress'] . "</td>";
                                        echo "<td>" . $row['zipcode'] . "</td>";
                                        echo "<td>" . $row['city'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phonenumber'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
