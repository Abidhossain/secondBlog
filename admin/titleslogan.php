<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<style>
    .leftside{float:left;width:70%;}
    .rightside{float:right;width:20%;}
    .rightside img{height:100px;width:120px;}
</style>

       
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
            <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  
                $slogan     = $fm->validation($_POST['slogan']); 
                $category   = mysqli_real_escape_string($db->link ,$slogan); 
                //Logo Insert
                $permited  = array('png');
                $file_name = $_FILES['logo']['name'];
                $file_size = $_FILES['logo']['size'];
                $file_temp = $_FILES['logo']['tmp_name'];
            
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $same_image = 'logo'.'.'.$file_ext;
                $uploaded_image = "uploads/logo/".$same_image; 

                //Form Validation
                if($slogan == "" ){
                    echo '<span class="error">Field Must Not be Empty </span>';
                }else{
                if(!empty($file_name)){
                    if ($file_size >1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{ 
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "UPDATE title_slogan
                                SET  
                                slogan   = '$slogan',
                                logo     = '$uploaded_image'
                                WHERE id = '1' ";
                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            echo "<span class='success'>Post Updated Successfully.</span>";
                        }else {
                            echo "<span class='error'>Post Not Updated !</span>";
                        }
                    }
            }else{
                    $query = "UPDATE title_slogan
                            SET  
                            slogan    = '$slogan'
                            WHERE id  = '1' ";
                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            echo "<span class='success'>Post Updated Successfully.</span>";
                        }else {
                            echo "<span class='error'>Post Not Updated !</span>";
                        }
                }
            }
        }
        ?>
        <?php
            $query = "select * from title_slogan where id = 1";
            $title_slogan = $db->select($query);
            if ($title_slogan) {
                while ($result = $title_slogan->fetch_assoc()) { 
        ?>
                <div class="block sloginblock">               
                <form action="" method="POST" enctype="multipart/form-data">
                 <div class="leftside">
                    <table class="form"> 
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'] ?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
                    <div class="rightside">
                         <img src="<?php echo $result['logo'] ?>" alt="logo">
                    </div>
                </div>
            <?php } } ?>
            </div>
        </div> 
<?php include 'inc/footer.php'?>