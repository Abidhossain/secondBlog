<?php include 'inc/header.php'?>
<?php 
  if(!isset($_GET['postid']) || $_GET['postid']== ""){
    header('Location:index.php');
  }else{
    $postid = $_GET['postid'];
  }
?> 
<?php 
    $query = "SELECT * FROM tbl_post WHERE id = $postid";
    $getpost = $db->select($query);
    if($getpost){
      while($result = $getpost->fetch_assoc()){
?>
<div class="container">
  <div class="row">
    <!-- Latest Posts -->
    <main class="post blog-post col-lg-8">
      <div class="container">
        <div class="post-single">
          <div class="post-thumbnail">
            <img src="admin/<?php echo $result['image'] ?>" alt="..." class="img-fluid">
            </div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="category">
                <?php 
                $catid = $result['catid'];
                $sql = "SELECT * FROM tbl_category WHERE id = '$catid'";
                $name = $db->select($sql); 
                if($name){
                while($catname = $name->fetch_assoc()){  ?>
                  <a href="#"><?php echo $catname['name']; }}?></a> 
                </div>
              </div>
             
              <h1><?php echo $result['title'] ?>
                <a href="#">
                  <i class="fa fa-bookmark-o"></i>
                </a>
              </h1>
              <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                <a href="#" class="author d-flex align-items-center flex-wrap">
                  <div class="avatar">
                    <img src="img/boy.png" alt="..." class="img-fluid">
                    </div>
                    <div class="title">
                      <span><?php echo $result['author'] ?></span>
                    </div>
                  </a>
                  <div class="d-flex align-items-center flex-wrap">
                    <div class="date">
                      <i class="icon-clock"></i> <?php echo $fm->dateFormat($result['date']) ?>
                    </div>
                    <div class="views">
                      <i class="icon-eye"></i> 100+
                    </div>
                    <div class="comments meta-last">
                      <i class="icon-comment"></i>12
                    </div>
                  </div>
                </div>
                <div class="post-body">
                  <p class="lead"> 
                    <?php echo $result['body'] ?>
                    </p>
                    <blockquote class="blockquote">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                      <footer class="blockquote-footer">Someone famous in
                      
                        <cite title="Source Title">Source Title</cite>
                      </footer>
                    </blockquote>
                  </div>
                <!--   <div class="post-tags">
                    <a href="#" class="tag">#Business</a>
                    <a href="#" class="tag">#Tricks</a>
                    <a href="#" class="tag">#Financial</a>
                    <a href="#" class="tag">#Economy</a>
                  </div> -->
                  <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                    <a href="#" class="prev-post text-left d-flex align-items-center">
                      <div class="icon prev">
                        <i class="fa fa-angle-left"></i>
                      </div>
                      <div class="text">
                        <strong class="text-primary">Previous Post </strong>
                        <h6>I Bought a Wedding Dress.</h6>
                      </div>
                    </a>
                    <a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                      <div class="text">
                        <strong class="text-primary">Next Post </strong>
                        <h6>I Bought a Wedding Dress.</h6>
                      </div>
                      <div class="icon next">
                        <i class="fa fa-angle-right"></i>
                      </div>
                    </a>
                  </div>  
                          </div>
                        </div>
                      </div>
                    </main>

                    <aside class="col-lg-4">
                      <!-- Widget [Search Bar Widget]-->
                      <div class="widget search">
                        <header>
                          <h3 class="h6">Search the blog</h3>
                        </header>
                        <form action="search.php" class="search-form">
                          <div class="form-group">
                            <input type="search" name="search" placeholder="What are you looking for?" required>
                              <button type="submit" class="submit">
                                <i class="icon-search"></i>
                              </button>
                            </div>
                          </form>
                        </div>
<!-- Widget [Latest Posts Widget]        -->
<div class="widget latest-posts">
  <header>
      <h3 class="h6">Related Posts</h3>
  </header>

    <div class="blog-posts">
        <?php 
            $catid = $result['catid'];
            $query = "SELECT * FROM tbl_post WHERE catid = '$catid' ORDER BY RAND()";
            $getpost = $db->select($query);
            if($getpost){
            while($result = $getpost->fetch_assoc()){
        ?>
      <a href="?postid=<?php echo $result['id']?>">
          <div class="item d-flex align-items-center">
              <div class="image">
                  <img src="admin/<?php echo $result['image'] ?>" alt="..." class="img-fluid img-thumbnail">
              </div>
              <div class="title">
                  <strong> <?php echo $result['title'] ?></strong>
                  <div class="d-flex align-items-center">
                      <div class="views">
                          <i class="icon-eye"></i> 500
                      </div>
                      <div class="comments">
                          <i class="icon-comment"></i>12
                      </div>
                  </div>
              </div>
          </div>
      </a> <?php } }else{ echo "No related post is available "; } ?>
      <?php } }else{ header('Location:404.php'); } ?>
    </div>
</div>

<!-- Widget [Categories Widget]-->
<div class="widget categories">
    <header>
        <h3 class="h6">Categories</h3>
    </header>
    <?php  
        $query = "SELECT * FROM tbl_category ";
        $getcat = $db->select($query); 
        while($resultt = $getcat->fetch_assoc()){
    ?>
    <div class="item d-flex justify-content-between">
        <a href="posts.php?catid=<?php echo $resultt['id'] ?>">
          <?php echo $resultt['name']?>  
        </a>
        <span>
          12  
        </span>
    </div> 
    <?php  } ?>
    </div> 
  </aside>
</div>
<!-- Widget [Tags Cloud Widget]-->  
</div>
<?php include 'inc/footer.php'?>