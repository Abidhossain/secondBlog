<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $facebook = mysqli_real_escape_string($db->link, $_POST['fb']);
                    $linkedin = mysqli_real_escape_string($db->link, $_POST['ln']);
                    $twitter = mysqli_real_escape_string($db->link, $_POST['tw']);
                    $google = mysqli_real_escape_string($db->link, $_POST['gg']);
                    $query = "UPDATE tbl_social
                            SET
                            fb    = '$facebook',
                            ln    = '$linkedin',
                            tw    = '$twitter',
                            gg    = '$google'
                            WHERE id = 1 ";
                    $copyright = $db->update($query);
                    if ($copyright) {
                        echo "<span class='success'>Socail Media Link Updated Successfully.</span>";
                    }else{
                        echo "<span class='error'>Socail Media Link Not Updated Successfully!!</span>"; 
                    }
                }
            ?>
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">
                    <?php
                    $query = "select * from tbl_social";
                    $sociallink = $db->select($query)->fetch_assoc(); 
                    ?>					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $sociallink['fb']?>" class="medium" />
                            </td>
                        </tr> 
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln"value="<?php echo $sociallink['ln']?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw"value="<?php echo $sociallink['tw']?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gg"value="<?php echo $sociallink['gg']?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div> 
<?php include 'inc/footer.php'?>