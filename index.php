<?php include 'inc/header.php' ?>
<?php include 'inc/slider.php' ?>
<!-- Intro Section-->
<section class="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="h3">Some great intro here</h2>
                <p class="text-big">Place a nice
                    <strong>introduction</strong> here
                    <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.
                </p>
            </div>
        </div>
    </div>
</section>
<?php 
    $query = "SELECT * FROM tbl_post ORDER BY RAND() limit 3";
    $getpost = $db->select($query);
    if($getpost){
      while($result = $getpost->fetch_assoc()){
?>
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
                                    <img src="img/boy.png" alt="..." class="img-fluid">
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
<?php } } ?>
<!-- Divider Section-->
<section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2>
                <a href="#" class="hero-link">View More</a>
            </div>
        </div>
    </div>
</section>
<!-- Latest Posts -->
<section class="latest-posts">
    <div class="container">
        <header>
            <h2>Latest from the blog</h2>
            <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </header>
        <div class="row">
            <?php 
        $query = "select * from tbl_post order by id desc limit 3";
        $getpost = $db->select($query);
        if($getpost){
          while($result = $getpost->fetch_assoc()){
      ?>
            <div class="post col-md-4">
                <div class="post-thumbnail">
                    <a href="post.php?postid=<?php echo $result['id']?>">
                        <img style="height:230px;" src="admin/<?php echo $result['image'] ?>" alt="..." class="img-fluid">
                    </a>
                </div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date">
                            <?php echo $fm->dmyFormat($result['date'])?> |
                            <?php echo $fm->year($result['date'])?>
                        </div>
                        <div class="category">
                            <a href="">
                                <?php echo $result['tags']?>
                            </a>
                        </div>
                    </div>
                    <a href="post.php?postid=<?php echo $result['id']?>">
                        <h3 class="h4">
                            <?php echo $result['title']?>
                        </h3>
                    </a>
                    <p class="text-muted">
                        <?php echo $fm->textShort($result['body'],120)?>
                    </p>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>
<!-- Newsletter Section-->
<section class="newsletter no-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Subscribe to Newsletter</h2>
                <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-md-8">
                <div class="form-holder">
                    <form action="#">
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Type your email address">
                            <button type="submit" class="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Section-->
<section class="gallery no-padding">
    <div class="row">
        <div class="mix col-lg-3 col-md-3 col-sm-6">
            <div class="item">
                <a href="img/gallery-1.jpg" data-fancybox="gallery" class="image">
                    <img src="img/gallery-1.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <i class="icon-search"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
            <div class="item">
                <a href="img/gallery-2.jpg" data-fancybox="gallery" class="image">
                    <img src="img/gallery-2.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <i class="icon-search"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
            <div class="item">
                <a href="img/gallery-3.jpg" data-fancybox="gallery" class="image">
                    <img src="img/gallery-3.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <i class="icon-search"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
            <div class="item">
                <a href="img/gallery-4.jpg" data-fancybox="gallery" class="image">
                    <img src="img/gallery-4.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <i class="icon-search"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'?>
