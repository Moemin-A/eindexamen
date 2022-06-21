<?php
require '../model/sports.php';
session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
                        <a href="view/list.php" class="btn btn-success pull-left">Home</a>
                        <h2 class="pull-left">Sports Details</h2>
                    </div>
                    <a href="index.php" class="btn btn-success">Leerlinggegevens</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
