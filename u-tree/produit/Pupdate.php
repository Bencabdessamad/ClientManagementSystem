<?php
// Include database connection file
include_once '..\DB\connection.php';

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE produit set  nomProduit='" . $_POST['nomProduit'] . "', prixUnitaire='" . $_POST['prixUnitaire'] . "' ,qteStockee='" . $_POST['qteStockee'] .  "', indisponible='" . $_POST['indisponible'] ."' WHERE refProduit='" . $_POST['refProduit'] . "'");
     
     header("location: Pindex.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM produit WHERE refProduit='" . $_GET['refProduit'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <?php include "Phead.php"; ?>
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
                            <label>Produit</label>
                            <input type="text" name="nomProduit" class="form-control" value="<?php echo $row["nomProduit"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="prixUnitaire" class="form-control" value="<?php echo $row["prixUnitaire"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="qteStockee" class="form-control" value="<?php echo $row["qteStockee"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>indisponible</label>
                            <input type="text" name="indisponible" class="form-control" value="<?php echo $row["indisponible"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <input type="hidden" name="refProduit" value="<?php echo $row["refProduit"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Pindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>