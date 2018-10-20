<?php include 'inc/header.php' ?> 
<div style='margin-bottom:50px;'></div>
<?php 
	if (!isset($_GET['search']) || $_GET['search'] == NULL) {
		header('Location:404.php');
	}
	else{
		$search = $_GET['search'];
	}
?>

<?php
	$query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%' OR author LIKE '%$search%' ";
	$post = $db->select($query);
	if ($post) {
		while ($result = $post->fetch_assoc()) { ?>
<section class="post-space featured-posts no-padding-top">
    <div class="container">
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
            <div class="text col-lg-7">
                <div class="text-inner d-flex align-items-center">
                    <div class="content">
                        <header class="post-header">
                            <div class="category">
                                <a href="#">
                                    <?php echo $result['tags']?>
                                </a>
                            </div>
                            <a href="post.php?postid=<?php echo $result['id']?>">
                                <h2 class="h4">
                                    <?php echo $result['title']?>
                                </h2>
                            </a>
                        </header>
                        <p>
                            <?php echo $fm->textShort($result['body'],250)?>
                        </p>
                        <footer class="post-footer d-flex align-items-center">
                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                <div class="avatar">
                                    <img src="img/icon.png" alt="..." class="img-fluid">
                                </div>
                                <div class="title">
                                    <span>
                                        <?php echo $result['author']?>
                                    </span>
                                </div>
                            </a>
                            <div class="date">
                                <i class="icon-clock"></i>
                                <?php echo $fm->dateFormat($result['date']) ?>
                            </div>
                            <div class="comments">
                                <i class="icon-comment"></i>12
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
            <div class="image col-lg-5">
                <img src="admin/<?php echo $result['image']?>" alt="...">
            </div>
        </div>
        <!-- Post        -->
</section> 
<?php } }else{
	echo "<span class='breadcrumb' style='margin-bottom:110px;'><center>Sorry nothing has found !!</center></span>";
} ?> 
<?php include 'inc/footer.php' ?> 