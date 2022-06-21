<?php
        require '../model/sports.php';
   
    
        $sporttb=isset($_SESSION['sporttbl0'])?unserialize($_SESSION['sporttbl0']):new mankement();
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="../libs/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Mankement toevoegen</h2>
                    </div>
                    <p>Vul hier uw mankement in.</p>
                    <form action="../index.php?act=add" method="post" >
                        <div class="form-group <?php echo (!empty($sporttb->category_msg)) ? 'has-error' : ''; ?>">
                            <label>kenteken</label>
                            <input type="text" name="kenteken" class="form-control" value="<?php echo $sporttb->category; ?>">

                            <form action="../index.php?act=add" method="post" >
                        <div class="form-group <?php echo (!empty($sporttb->category_msg)) ? 'has-error' : ''; ?>">
                            <label>auto</label>
                            <input type="text" name="voertuig" class="form-control" value="<?php echo $sporttb->category; ?>">

                        </div>
                        <div class="form-group <?php echo (!empty($sporttb->category_msg)) ? 'has-error' : ''; ?>">
                            <label>mankement</label>
                            <input type="text" name="mankement" class="form-control" value="<?php echo $sporttb->category; ?>">
                            <span class="help-block"><?php echo $sporttb->category_msg;?></span>
                        </div>
                        <input type="submit" name="addbtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
