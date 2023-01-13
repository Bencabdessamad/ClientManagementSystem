<?php
// Include database connection file
include_once '..\DB\connection.php';

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE admin set  nomUtilisateur='" . $_POST['nomUtilisateur'] . "', motDePasse='" . $_POST['motDePasse'] . "' WHERE id='" . $_POST['id'] . "'");
     
     header("location: Psindex.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM admin WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update admin</title>
    <?php include "Pshead.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Update admin</h2>
                    </div>
                    <p>Please edit the input values and submit to update the admin.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="nomUtilisateur" class="form-control" value="<?php echo $row["nomUtilisateur"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="motDePasse" class="form-control" value="<?php echo $row["motDePasse"]; ?>" maxlength="100" required="">
                            
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Psindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>