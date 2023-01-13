<?php
include_once '..\DB\connection.php';

if(isset($_POST['save']))
{    

    
     $nomProduit = $_POST['nomProduit'];
     $prixUnitaire = $_POST['prixUnitaire'];
     $qteStockee = $_POST['qteStockee'];
     $indisponible = $_POST['indisponible'];
     $sql = "INSERT INTO produit (nomProduit,prixUnitaire,qteStockee,indisponible)
     VALUES ('$nomProduit','$prixUnitaire','$qteStockee','$indisponible')";
     if (mysqli_query($conn, $sql)) {
        header("location: Pindex.php");
        exit();
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "Phead.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Add Product</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                            <label>Produit</label>
                            <input type="text" name="nomProduit" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="prixUnitaire" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="qteStockee" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>indisponible</label>
                            <input type="text" name="indisponible" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="Pindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
