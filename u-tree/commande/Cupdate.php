<?php
// Include database connection file
include_once '..\DB\connection.php';

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE commande set  numClient='" . $_POST['numClient'] . "' ,dateCommande='" . $_POST['dateCommande'] ."' WHERE numCommande='" . $_POST['numCommande'] . "'");
     
     header("location: Cindex.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM commande WHERE numCommande='" . $_GET['numCommande'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Command</title>
    <?php include "Chead.php"; ?>
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
                            <label>Id Client</label>
                            <input type="text" name="numClient" class="form-control" value="<?php echo $row["numClient"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Date Commande</label>
                            <input type="text" name="dateCommande" class="form-control" value="<?php echo $row["dateCommande"]; ?>" maxlength="100" required="">
                            
                        </div>
                       
                        <input type="hidden" name="numCommande" value="<?php echo $row["numCommande"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Cindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>