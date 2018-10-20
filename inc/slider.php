
    <!-- Hero Section-->
    <section style="background: url(img/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
          <?php
              $query = "select * from title_slogan where id = 1";
              $slogan = $db->select($query)->fetch_assoc();  
            ?>
            <h1><?php echo $slogan['slogan'] ?></h1><a href="#" class="hero-link">Discover More</a>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>