<?php
// Include database connection file
include_once '..\DB\connection.php';

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE ligne_commande set  refProduit='" . $_POST['refProduit'] . "' ,qteCommande='" . $_POST['qteCommande'] ."' WHERE numCommande='" . $_POST['numCommande'] . "'");
     
     header("location: Lindex.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM ligne_commande WHERE numCommande='" . $_GET['numCommande'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update L-Command</title>
    <?php include "Lhead.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Update L-Commande</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>Id Commande</label>
                            <input type="text" name="numCommande" class="form-control" value="<?php echo $row["numCommande"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Id Produit</label>
                            <input type="text" name="refProduit" class="form-control" value="<?php echo $row["refProduit"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Quantity Commande</label>
                            <input type="text" name="qteCommande" class="form-control" value="<?php echo $row["qteCommande"]; ?>" maxlength="100" required="">
                            
                        </div>
                       
                        <input type="hidden" name="numCommande" value="<?php echo $row["numCommande"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Lindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>