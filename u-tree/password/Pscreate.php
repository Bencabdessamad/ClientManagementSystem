<?php
include_once '..\DB\connection.php';

if(isset($_POST['save']))
{    

    
     $nomUtilisateur = $_POST['nomUtilisateur'];
     $motDePasse = $_POST['motDePasse'];

     $sql = "INSERT INTO admin (nomUtilisateur,motDePasse)
     VALUES ('$nomUtilisateur','$motDePasse')";
     if (mysqli_query($conn, $sql)) {
        header("location: Psindex.php");
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
    <?php include "Pshead.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Admin</h2>
                    </div>
                    <p>Please fill this form and submit to add Admin record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="nomUtilisateur" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="motDePasse" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="Psindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
