<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php 
    if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL ) {
       echo '<script>window.location = "inbox.php" </script>';
    }else{
        $msgid = $_GET['msgid'];
    }
?>
        <div class="grid_10"> 
            <div class="box round first grid">
                <h2>Add New Page</h2>
                <?php 
                 if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
                    echo '<script>window.location = "inbox.php" </script>';
                    }
                ?>
                <div class="block">   

                 <form action="" method="POST" >
                    <table class="form">
                    <?php
						$query = "select * from tbl_contact where id = '$msgid'";
						$getmessage = $db->select($query); 
						if ($getmessage) {
								while ($result = $getmessage->fetch_assoc()) {  
					?> 
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['username'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $fm->dateFormat($result['date']) ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea readonly class="tinymce" >
                                    <?php echo $result['massage']?>
                                </textarea>
                            </td>
                        </tr> 
                        <tr> 
                         
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                <?php } } ?>
                    </table>
                    </form>
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