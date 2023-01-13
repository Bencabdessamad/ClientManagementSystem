<?php
// Include database connection file
include_once '..\DB\connection.php';

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE client set  nomClient='" . $_POST['nomClient'] . "', raisonSocial='" . $_POST['raisonSocial'] . "' ,adresseClient='" . $_POST['adresseClient'] .  "', villeClient='" . $_POST['villeClient'] . "' ,pays='" . $_POST['pays'] ."' ,telephone='" . $_POST['telephone'] . "' WHERE numClient='" . $_POST['numClient'] . "'");
     
     header("location: index.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM client WHERE numClient='" . $_GET['numClient'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="nomClient" class="form-control" value="<?php echo $row["nomClient"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Raison Social</label>
                            <input type="text" name="raisonSocial" class="form-control" value="<?php echo $row["raisonSocial"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="adresseClient" class="form-control" value="<?php echo $row["adresseClient"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>ville</label>
                            <input type="text" name="villeClient" class="form-control" value="<?php echo $row["villeClient"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group ">
                            <label>pays</label>
                            <input type="text" name="pays" class="form-control" value="<?php echo $row["pays"]; ?>" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="mobile" name="telephone" class="form-control" value="<?php echo $row["telephone"]; ?>" maxlength="12"required="">
                        </div>
                        <input type="hidden" name="numClient" value="<?php echo $row["numClient"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>