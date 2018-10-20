<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php 
     $userid   = Session::get('userId'); 
     $userName = Session::get('username'); 
?>
<div class="grid_10"> 
    <div class="box round first grid">
        <h2>Update User Profile</h2>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
                $name       = mysqli_real_escape_string($db->link , $_POST['name']);
                $username   = mysqli_real_escape_string($db->link , $_POST['username']);
                $email      = mysqli_real_escape_string($db->link , $_POST['email']);
                $info    = mysqli_real_escape_string($db->link , $_POST['info']);  
                if($name == "" || $username == "" || $email == "" || $info == ""){
                    echo "<span class='error'>Field must not be  empty !!</span>";
                }else{
                $query = "UPDATE tbl_user
                        SET 
                        name       = '$name',
                        username   = '$username', 
                        email      = '$email',
                        info       = '$info' 
                        WHERE id = '$userid' AND username = '$userName' ";
                    $updated_rows = $db->update($query); 
                    if ($updated_rows) {
                        echo "<span class='success'>User Profile Updated Successfully.</span>";
                    }else {
                        echo "<span class='error'>User Profile Not Updated !</span>";
                    }
            } }
        ?>
                <div class="block">  
    <?php  
        $query = "SELECT * FROM tbl_user WHERE id = '$userid' AND username = '$userName' ";
        $getpost = $db->select($query); 
        if ($getpost) { 
        while ($post_result = $getpost->fetch_assoc()) {
    ?>             
    <form action="" method="POST" >
    <table class="form">
        
        <tr>
            <td>
                <label>Name</label>
            </td>
            <td>
                <input type="text" name="name" value="<?php echo $post_result['name']?>" class="medium" />
            </td>
        </tr> 
        <tr>
            <td>
                <label>User Name</label>
            </td>
            <td>
                <input type="text" readonly  name="username" value="<?php echo $post_result['username']?>" class="medium" />
            </td>
        </tr> 
        <tr>
            <td>
                <label>Email Id</label>
            </td>
            <td>
                <input type="text" name="email" value="<?php echo $post_result['email']?>" class="medium" />
            </td>
        </tr>  
        <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
            </td>
            <td>
                <textarea class="tinymce" name="info">
                        <?php echo $post_result['info'] ?>
                </textarea>
            </td>
        </tr> 
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
        </tr>
    </table>
    </form>
            <?php } } ?>
                </div>
            </div>
        </div> 
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include 'inc/footer.php'?>