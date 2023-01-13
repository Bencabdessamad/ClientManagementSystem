<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<?php include "Phead.php"; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                    <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Product</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
       <a href="../php/index.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Client</span>
       </a>
       <span class="tooltip">Client</span>
     </li>
     <li>
       <a href="../Lcommande/Lindex.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Ligne Commande</span>
       </a>
       <span class="tooltip">Ligne Commande</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Produit</span>
       </a>
       <span class="tooltip">Produit</span>
     </li>     <li>
       <a href="../commande/Cindex.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Commande</span>
       </a>
       <span class="tooltip">Commande</span>
     </li>
     <li>
       <a href="../archive/Aindex.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Archive</span>
       </a>
       <span class="tooltip">Archive</span>
     </li>
     <li>
       <a href="../password/Psindex.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">Abdessamad - Mohammed</div>
             <div class="job">Admin</div>
           </div>
         </div>
         <a href="../log-in.html"><i class='bx bx-log-out' id="log_out" ></i></a>
     </li>
    </ul>
  </div>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
   <section class="home-section">
                        <a href="Pcreate.php" class="btn btn-success pull-right">Add New Product</a>
                        <form method="post">
                        <div>
      <input type="text" class="input" name="search" placeholder="Search Product">
      <button type="submit"  name="submit-s" class="button-3">Search</button>
      </div>
      </form>
                                </div>
                   <?php
              include_once '..\DB\connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM produit");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      
                      <tr>
                      <td>Id Product</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Disponibility</td>
                        <td></td>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td><?php echo $row["refProduit"]; ?></td>
                        <td><?php echo $row["nomProduit"]; ?></td>
                        <td><?php echo $row["prixUnitaire"]; ?></td>
                        <td><?php echo $row["qteStockee"]; ?></td>
                        <td><?php if ($row["indisponible"] == 1) {
                          echo 'Disponible';
                        }else{
                          echo 'indisponible';
                        }

                          ?></td>
                        <td><a href="Pupdate.php?refProduit=<?php echo $row["refProduit"]; ?>" title='Update Record'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a href="Pdelete.php?refProduit=<?php echo $row["refProduit"]; ?>" title='Delete Record'><i class='material-icons'><span class='glyphicon glyphicon-trash'></span></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
                    <h3>Search Result :</h3>
                    <?php
               include_once '..\DB\connection.php';
                    if (isset($_POST['submit-s'])) {
                      $search = mysqli_real_escape_string($conn, $_POST['search']);
                      $sql = "select * from produit where refProduit like '%$search%' or nomProduit like '%$search%' or prixUnitaire like '%$search%' or qteStockee like '%$search%' or indisponible like '%$search%'";
                      $result = mysqli_query($conn, $sql);
                      $queryResult = mysqli_num_rows($result);
                    ?>
                    <?php
                      if ($queryResult > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      
                      <tr>
                      <td>Id Produit</td>
                        <td>Produit</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Disponibility</td>
                      </tr>
                    <?php
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                    <td><?php echo $row["refProduit"]; ?></td>
                        <td><?php echo $row["nomProduit"]; ?></td>
                        <td><?php echo $row["prixUnitaire"]; ?></td>
                        <td><?php echo $row["qteStockee"]; ?></td>
                        <td><?php echo $row["indisponible"]; ?></td>
                    </tr>
                    <?php
                          $i++;
                        }
                    ?>
                    </table>
                     <?php
                      } else {
                        echo "No result found";
                      }
                    }
                    ?>

                </div>
            </div>     
        </div>
  </section>
</body>
</html>