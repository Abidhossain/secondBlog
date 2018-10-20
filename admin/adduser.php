<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?> 
<?php
    if (!Session::get('userrole') == '0') {
        echo '<script>window.location = ("index.php")</script>' ; 
    }
?>
<div class="grid_10">		
<div class="box round first grid">
    <h2>Add New Category</h2>
    <div class="block copyblock"> 
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  
      $username  = $fm->validation(mysqli_real_escape_string($db->link , $_POST['username']));
      $password  = $fm->validation(mysqli_real_escape_string($db->link,md5($_POST['password'])));
      $email     = $fm->validation(mysqli_real_escape_string($db->link, $_POST['email']));
      $role      = $fm->validation(mysqli_real_escape_string($db->link , $_POST['role']));

    if($username == "" || $password == "" || $email == "" || $role == ""){
        echo "<span class='error'>Field must not be  empty !!</span>";
    } 
    else{
        $checkmail   = "select * from tbl_user where username = '$username' || email = '$email'";
        $getmail = $db->select($checkmail);
        if($getmail){
            while($result = $getmail->fetch_assoc()){ 
                if($result['username' ] == $username){
                    echo "<span class='error'>Enter Unique username !!</span>";
                }
                elseif($result['email' ] == $email){
                    echo "<span class='error'>Enter a valid email address !!</span>";
                }
            }
        }else{

        $query = "INSERT INTO tbl_user(username, password, email, role) VALUES('$username','$password','$email','$role')";
        $userinsret = $db->insert($query); 
    if($userinsret){
        echo "<span class='success'>User Created successfully.</span>";
    }else{
        echo "<span class='error'>User Not Created successfully !!</span>";
    }
    }
    }
}   
    ?>
    <form action="" method="POST">
    <table class="form">					
        <tr>
        <td><label for="">User Name</label></td>
            <td>
                <input type="text" name="username" placeholder="Enter User Name " class="medium" />
            </td>
        </tr>
        <tr>
        <td><label for="">Email</label></td>
            <td>
                <input type="email" name="email" placeholder="Enter Email ">
            </td>
        </tr>
        <tr>
        <td><label for="">Password</label></td>
            <td>
                <input type="password" name="password" placeholder="Enter Password ">
            </td>
        </tr>
       
        <tr>
        <td><label for="">User Role</label></td>
            <td>
                <select name="role" id="select">
                    <option>Select User Role</option>
                    <option value="0">Admin</option>
                    <option value="1">Author</option>
                    <option value="2">Editor</option>
                </select>
            </td>
        </tr>
        <tr> 
        <td></td>
            <td>
                <input type="submit" name="submit" Value="Create" />
            </td>
        </tr>
    </table>
    </form>
        </div>
    </div>
</div> 
<?php include 'inc/footer.php'?>