
    <aside class="col-lg-4">
      <!-- Widget [Search Bar Widget]-->
      <div class="widget search">
        <header>
          <h3 class="h6">Search the blog</h3>
        </header>
        <form action="search.php" class="search-form">
          <div class="form-group">
            <input type="search" name="search" placeholder="What are you looking for?">
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
                $query = "SELECT * FROM tbl_post WHERE catid = '$catid' ORDER BY RAND()";
                $getpost = $db->select($query);
                if($getpost){
                  while($result = $getpost->fetch_assoc()){
            ?>
            <a href="post.php?postid=<?php echo $result['id']?>">
              <div class="item d-flex align-items-center">
                <div class="image">
                  <img src="admin/<?php echo $result['post_image'] ?>" alt="..." class="img-fluid img-thumbnail">
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