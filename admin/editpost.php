<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php

    if (!isset($_GET['postid']) || $_GET['postid'] == NULL) {
        echo '<script>window.location = "postlist.php" </script>';
    }else{
      echo  $postid = $_GET['postid'];
    } 
?>
        <div class="grid_10"> 
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php 
                 if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
                    $title   = mysqli_real_escape_string($db->link , $_POST['title']);
                    $category   = mysqli_real_escape_string($db->link , $_POST['catid']);
                    $body   = mysqli_real_escape_string($db->link , $_POST['body']);
                    $tags   = mysqli_real_escape_string($db->link , $_POST['tags']);
                    $author   = mysqli_real_escape_string($db->link , $_POST['author']);
                    $userid   = mysqli_real_escape_string($db->link , $_POST['userId']);
                    //Update Image 
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];
                
                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "uploads/".$unique_image; 

                    //Form Validation
                    if($title == "" || $category == "" || $body == "" || $title == "" || $tags == "" || $author == ""){
                        echo '<span class="error">Field Must Not be Empty </span>';
                    }
                    if(!empty($file_name)){
                         if ($file_size >1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!</span>";
                    } elseif (in_array($file_ext, $permited) === false) {
                        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                    } else{
                           move_uploaded_file($file_temp, $uploaded_image);
                           
                           $query = "UPDATE tbl_post
                                    SET
                                    catid   = '$category', 
                                    title   = '$title',
                                    body    = '$body', 
                                    author  = '$author',
                                    image   = '$uploaded_image',
                                    tags    = '$tags',
                                    userId  = '$userid' 
                                    WHERE id = '$postid'";
                           $inserted_rows = $db->update($query);
                           if ($inserted_rows) {
                            echo "<span class='success'>Post Inserted Successfully.
                            </span>";
                           }else {
                            echo "<span class='error'>Image Not Inserted !</span>";
                           }
                        }
                        }else{ 
                           $query = "UPDATE tbl_post
                                    SET
                                    title   = '$title',
                                    catid     = '$category', 
                                    body    = '$body', 
                                    author  = '$author',
                                    tags    = '$tags',
                                    userId  = '$userid'
                                    WHERE id = '$postid'";
                           $inserted_rows = $db->update($query);
                           if ($inserted_rows) {
                            echo "<span class='success'>Post Inserted Successfully.
                            </span>";
                           }else {
                            echo "<span class='error'>Image Not Inserted !</span>";
                           } 
                        }
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
                        <input type="text" name="title" value="<?php echo $result['title'] ?>" class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catid">
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
                        <input type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                        <?php echo $result['body'] ?>
                        </textarea>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Tags</label>
                    </td>
                    <td>
                        <input type="text" name="tags" value="<?php echo $result['tags'] ?>" class="medium" />
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
                        <input type="submit" name="submit" Value="Save" />
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