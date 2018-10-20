<?php include 'inc/header.php' ?>
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
        <div class="row">
        <?php $query = "SELECT tbl_post.* , tbl_category.name FROM tbl_post
							INNER JOIN tbl_category 
							ON tbl_post.catid = tbl_category.id ORDER BY RAND()";
        $getpost = $db->select($query);
        if($getpost){
          while($result = $getpost->fetch_assoc()){
      ?>
            <div class="post col-md-6">
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
                                <?php echo $result['name']?>
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
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
                <li class="page-item"><a href="#" class="page-link active">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
              </ul>
            </nav>
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
                $query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 6";
                $getpost = $db->select($query);
                if($getpost){
                  while($result = $getpost->fetch_assoc()){
            ?>
            <a href="post.php?postid=<?php echo $result['id']?>">
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
    </div>
    
<?php include 'inc/footer.php'?>
