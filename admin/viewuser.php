<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?> 

<?php
    if (!isset($_GET['userid']) || $_GET['userid'] == NULL) {
        echo '<script>window.location = ("userlist.php")</script>' ; 
    }else{
    echo  $userid = $_GET['userid'];
    } 
?>
<div class="grid_10"> 
    <div class="box round first grid">
        <h2>View User Profile</h2>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
                echo '<script>window.location = ("userlist.php")</script>' ;
            }
        ?>
                <div class="block">  
    <?php  
        $query = "SELECT * FROM tbl_user WHERE id = '$userid' ";
        $viewuser = $db->select($query); 
        if ($viewuser) { 
        while ($post_result = $viewuser->fetch_assoc()) {
    ?>             
    <form action="" method="POST" >
    <table class="form">
        
        <tr>
            <td>
                <label>Name</label>
            </td>
            <td>
                <input type="text" readonly name="name" value="<?php echo $post_result['name']?>" class="medium" />
            </td>
        </tr> 
        <tr>
            <td>
                <label>User Name</label>
            </td>
            <td>
                <input type="text" readonly name="username" value="<?php echo $post_result['username']?>" class="medium" />
            </td>
        </tr> 
        <tr>
            <td>
                <label>Email Id</label>
            </td>
            <td>
                <input type="text" readonly name="email" value="<?php echo $post_result['email']?>" class="medium" />
            </td>
        </tr>  
        <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
            </td>
            <td>
                <textarea readonly class="tinymce" name="details">
                        <?php echo $post_result['info'] ?>
                </textarea>
            </td>
        </tr> 
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="OK" />
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