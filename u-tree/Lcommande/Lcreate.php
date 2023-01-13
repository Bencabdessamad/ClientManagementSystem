<?php
include_once '..\DB\connection.php';

if(isset($_POST['save']))
{    
    $numClient = $_POST['numClient'];
    $numCommande  = $_POST['numCommande'];
     $refProduit = $_POST['refProduit'];
     $qteCommande = $_POST['qteCommande'];
     $sql = "INSERT INTO ligne_commande (numClient,numCommande,refProduit,qteCommande)
     VALUES ('$numClient','$numCommande','$refProduit','$qteCommande')";
     if (mysqli_query($conn, $sql)) {
        header("location: Lindex.php");
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
    <title>Create L-Command</title>
    <?php include "Lhead.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Add L-Command</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                            <label>Id Client</label>
                            <input type="text" name="numClient" class="form-control" value="" maxlength="50" required="">
                        </div>
                    <div class="form-group">
                            <label>Id Commande</label>
                            <input type="text" name="numCommande" class="form-control" value="" maxlength="50" required="">
                        </div>
                    <div class="form-group">
                            <label>Id Produit</label>
                            <input type="text" name="refProduit" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>Quantity Commande</label>
                            <input type="text" name="qteCommande" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="Lindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
