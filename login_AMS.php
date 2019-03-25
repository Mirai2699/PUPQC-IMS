<?php
                                      include ("db.php");
                                        
                                        if(isset($_POST['submit']))
                                        {
                                          $username = $_POST['username'];
                                          $password = $_POST['password'];
                                          
                                          $query = "SELECT * FROM ims_r_account WHERE Username = '".$username."' and Paswrd = '".$password."'";

                                          $result = mysqli_query($connection,$query) or die(mysqli_error());
                                          if (mysqli_num_rows($result) > 0)
                                          {
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                              $user_id = $row['Employee_ID'];
                                              $UserName = $row['Username'];
                                              $type = $row['Account_Type'];
                                              $account = $row['Account_ID'];
                                              $dept = $row['Depart_Name'];
                                            }
                                            echo 'OK!';

                            
                                          session_start();
                                          

                                            $_SESSION['Logged_In'] = $UserName;
                                            $_SESSION['User_ID'] = $user_id;
                                            $UserID = $_SESSION['User_ID'];
                                            $loginname = $_SESSION['Logged_In'];
                                            $_SESSION['TYPE'] = $type;
                                            $_SESSION['AccountID'] = $account;
                                            $_SESSION['DEPART'] = $dept;


                                          if($_SESSION['TYPE'] == "ProCus")
                                          {
                                            $header ='Location:IMS/IMS-PC/PCmainpage.php? username='.$UserName.'&Account_Type = '.$type.'';
                                            header($header);
                                          }
                                          else if($_SESSION['TYPE'] == "Director")
                                          {
                                            
                                            $header ='Location:IMS/IMS-DIR/DMmainpage.php? username='.$UserName.'&Account_Type = '.$type.'';
                                            header($header);
                                          } 
                                          else if($_SESSION['TYPE'] == "Dept")
                                          {
                                            
                                            $header ='Location:IMS/IMS-DEPT/DPmainpage.php? username='.$UserName.'&Account_Type = '.$type.'';
                                            header($header);
                                          } 
                                          else if($_SESSION['TYPE'] == "Inspect")
                                          {
                                            
                                            $header ='Location:IMS/IMS-INS/INSmainpage.php? username='.$UserName.'&Account_Type = '.$type.'';
                                            header($header);
                                          } 
                                         
                                         
                                          
                                        }
                                else
                                        {
                                          echo "<p style='color:red ; margin-left: 15%'>Incorrect Username or Password! </p>";         
                                            }
                                      }
                                ?>