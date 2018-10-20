<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<div class="grid_10"> 
    <div class="box round first grid">
                <h2>Update Copyright Text</h2>
        <div class="block copyblock">  
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $copyright = mysqli_real_escape_string($db->link, $_POST['copyright']);
                    $query = "UPDATE tbl_copyright
                            SET
                            copyright = '$copyright'
                            WHERE id = 1 ";
                    $copyright = $db->update($query);
                    if ($copyright) {
                        echo "<span class='success'>Copyright updated successfully.</span>";
                    }else{
                        echo "<span class='error'>Copyright not updated !!</span>"; 
                    }
                }
            ?>
            <form action="" method="POST">
            <table class="form">					
                <tr>
                    <td>
                    <?php
                    $query = "select * from tbl_copyright";
                    $copy = $db->select($query)->fetch_assoc(); 
                    ?>
                        <input type="text" value='<?php echo $copy["copyright"] ?>' name="copyright" class="large" /> 
                    </td>
                </tr>
                
                    <tr> 
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