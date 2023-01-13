<?php
include_once '..\DB\connection.php';

if(isset($_POST['save']))
{    

    
     $nomClient = $_POST['nomClient'];
     $raisonSocial = $_POST['raisonSocial'];
     $adresseClient = $_POST['adresseClient'];
     $villeClient = $_POST['villeClient'];
     $pays = $_POST['pays'];
     $telephone = $_POST['telephone'];
     $sql = "INSERT INTO client (nomClient,raisonSocial,adresseClient,villeClient,pays,telephone)
     VALUES ('$nomClient','$raisonSocial','$adresseClient','$villeClient','$pays','$telephone')";
     if (mysqli_query($conn, $sql)) {
        header("location: index.php");
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
    <?php include "head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="nomClient" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>Raison social</label>
                            <input type="text" name="raisonSocial" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>adresse</label>
                            <input type="text" name="adresseClient" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>ville</label>
                            <input type="text" name="villeClient" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>pays</label>
                            <input type="text" name="pays" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>phone</label>
                            <input type="mobile" name="telephone" class="form-control" value="" maxlength="12" required="">
                        </div>

                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
