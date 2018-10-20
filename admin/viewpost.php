<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php

    if (!isset($_GET['postid']) || $_GET['postid'] == NULL) {
        echo '<script>window.location = "postlist.php"</script>' ; 
    }else{
      echo  $postid = $_GET['postid'];
    } 
?>
        <div class="grid_10"> 
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php 
                 if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  
                    echo '<script>window.location = "postlist.php"</script>' ; 
                    }
                ?>
        <div class="block">               
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                
                <?php
                    $query = "select * from tbl_post where id = '$postid' ";
                    $getpost = $db->select($query); 
                    if ($getpost) {
                        while($result = $getpost->fetch_assoc()){  
                ?>
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" readonly name="title" value="<?php echo $result['title'] ?>" class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select readonly id="select" name="catid">
                        <option>Select Category</option>
                    <?php 
                        $query = "SELECT * FROM tbl_category";
                        $category = $db->select($query); 
                        if($category){
                            while($catid = $category->fetch_assoc()){
                    ?>
                            <option 
                            <?php 
                                if ($catid['id'] == $result['catid']) { ?>
                                selected = "selected"
                                <?php } ?>value="<?php echo $catid['id'] ?>"><?php echo $catid['name'] ?></option>
                            <?php }}  ?>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                            <img src="<?php echo $result['image']?>" alt="post_image" height="100px" width="200px" ><br/>
                        <input disabled type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea readonly class="tinymce" name="body">
                        <?php echo $result['body'] ?>
                        </textarea>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Tags</label>
                    </td>
                    <td>
                        <input readonly type="text" name="tags" value="<?php echo $result['tags'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <input type="text" readonly name="author" value="<?php echo Session::get('username')?>" class="medium" />
                        <input type="hidden" name="userId" value="<?php echo Session::get('userId')?>" class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Go Back" />
                    </td>
                </tr>
            </table>
            </form>
        <?php }} ?>
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