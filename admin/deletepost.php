<?php
	include '../lib/Session.php';
	    Session::checkSession();
?>
<?php include '../config/config.php'?>
<?php include '../lib/Database.php'?>
<?php include '../helpers/Format.php'?>
<?php 
	$db = new Database(); 
?>
<?php 
    if (!isset($_GET['delpostid']) || $_GET['delpostid'] == NULL ) {
    echo '<script>window.location = "postlist.php" </script>';
    }else{
        $delid = $_GET['delpostid'];
        $query = "select * from tbl_post where id = '$delid'";
        $getData = $db->select($query);
        if($getData){
            while ($delimg = $getData->fetch_assoc()) {
                $dellink = $delimg['image'];
                unlink($dellink);
                }
        }
        $delquery = "delete from tbl_post where id = '$delid'";
        $delData = $db->delete($delquery);
        if($delData){
            echo '<script>alert("Data deleted Succssfully.")</script>';
            echo '<script>window.location = "postlist.php" </script>';
        }else{
            echo '<script>alert("Data not deleted Succssfully.")</script>';
            echo '<script>window.location = "postlist.php" </script>'; 
        }
    }
?>