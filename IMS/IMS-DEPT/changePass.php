                                                                             <?php
                                                                             include('../../db.php');

                                                                              $No = $_POST['ID'];
                                                                              $pass = $_POST['Pass'];
                                                                              $conpass = $_POST['ConPass'];
                                                                              if($pass == $conpass)
                                                                              {
                                                                                $query = mysqli_query($connection,"UPDATE pso_r_user SET U_PASSWORD = '$pass' WHERE U_ID = '$No'");

                                                                                  //header('Location:../../Portal.php');
                                                                                  //echo "Logging out.";
                                                                               echo "<script type=\"text/javascript\">".
                                                                                         "alert
                                                                                         ('YOUR PASSWORD HAS BEEN CHANGED!');".
                                                                                        "</script>";
                                                                               echo "<script>setTimeout(\"location.href = 'DPmainpage.php';\",0);</script>";
                                                                               }
                                                                              else if($pass != $conpass)
                                                                              {
                                                                                echo "<label style='color:red ; margin-left: 5%; font-weight: 10px; font-size: 15px'>Password Do Not Match!</label>";
                                                                              }
                                                                            ?>


