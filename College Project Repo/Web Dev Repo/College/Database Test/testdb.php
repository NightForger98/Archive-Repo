<?php  //Connect Database new connection for output
                    $conn2 = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
                    //Select Database
                    $db_select2 = mysqli_select_db($conn2,testdb) or die(mysqli_error());
                    
                    //Qwery to update the list , use same list id
                    $sql2 = "SELECT * FROM information";
                    //Execute Query
                    $res2 = mysqli_query($conn2,$sql2);
                        //Check whether query executed successfully or not
                        if($res2 == true)
                        {//Display the lists
                            //count rows
                            $count_rows2 = mysqli_num_rows($res2);
                            //if there is data in database then display all in dropdown else display none as option
                            if($count_rows2>0){
                                //display data
                                while($row2=mysqli_fetch_assoc($res2)){
                                    //get individual values
                                    $list_id =$row2['ID'];
                                    $list_name = $row2['Uname'];
                                    ?>
                                    <option value="<?php echo $list_id; ?>"><?php echo $list_name; ?></option>
                                    
                                    <?php

                                }
                        }else{  //no list added
                               //display none
                               ?>
                               <option value="0">None</option>
                               <?php 
                        }
                    }
                        ?>