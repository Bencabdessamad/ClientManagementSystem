<?php
                            require('DB/connection.php');
                            session_start();
                            if (isset($_POST["submit"])) {
                                $name = $_POST["name"];
                                $pass = $_POST["pass"];
                                $select = "select * from admin where nomUtilisateur = '$name' && motDePasse = '$pass' ";
                                $result = mysqli_query($conn, $select);
                                $rows = mysqli_num_rows($result);
                                if ($rows == 1) {
                                    $_SESSION['nomUtilisateur'] = $name && $_SESSION['motDePasse'] = $pass;
                                    header("Location: php/index.php");
                                } else {
                                    header("Location: log-in.html");
                                }
                            }
                            ?>