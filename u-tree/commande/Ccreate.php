<?php
include_once '..\DB\connection.php';

if(isset($_POST['save']))
{    
     $numClient = $_POST['numClient'];
     $dateCommande = $_POST['dateCommande'];
     $sql = "INSERT INTO commande (numClient,dateCommande)
     VALUES ('$numClient','$dateCommande')";
     if (mysqli_query($conn, $sql)) {
        header("location: Cindex.php");
        exit();
     } else {
        echo "Error: Client dosent Exist !!
        ";
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Command</title>
    <?php include "Chead.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Add Command</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                            <label>Id Client</label>
                            <input type="text" name="numClient" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>Date Commande</label>
                            <input type="date" name="dateCommande" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="Cindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
