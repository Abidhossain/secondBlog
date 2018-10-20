
<?php        
		$query = "select * from tbl_post limit 1";
		$getpageid = $db->select($query);
		if ($getpageid) {
			while ($result = $getpageid->fetch_assoc()) { ?>
				<title><?php echo $result['tags']?> | <?php echo TITLE?></title> 
			<?php } }   elseif (isset($_GET['id'])) {
		$postid = $_GET['id'];   
		$query = "select * from tbl_post where id = $postid";
		$getpost = $db->select($query);
		if ($getpost) {
			while ($result = $getpost->fetch_assoc()) { ?>
				<title><?php echo $result['title']?> | <?php echo TITLE?></title> 
			<?php } } }
			else{ ?>
				<title><?php echo $fm->title() ?> | <?php echo TITLE ?></title> 
			<?php } ?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<?php
			if (isset($_GET['id'])) {
				$postid = $_GET['id'];
            $query = "select * from tbl_post where id = '$postid' ";
            $keyword = $db->select($query);
            if ($keyword) {
                while ($result = $keyword->fetch_assoc()) { ?> 
				<meta name="keywords" content="<?php echo $result['title'] ?>">
        <?php }}}else{?>
		<meta name="keywords" content="<?php echo KEYWORD ?>">
		<?php } ?>
	<meta name="author" content="Delowar">