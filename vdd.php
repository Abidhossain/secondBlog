<?php include 'inc/header.php'?> 
<link rel="stylesheet" href='css/freelancer.min.css'> 
<style>
.error{
  color:red;
}
</style>
    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary">Contact Me</h2>
        
<?php 
               if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
                    $username   = mysqli_real_escape_string($db->link , $_POST['username']);
                    $email      = mysqli_real_escape_string($db->link , $_POST['email']);
                    $phone      = mysqli_real_escape_string($db->link , $_POST['phone']);
                    $massage    = mysqli_real_escape_string($db->link , $_POST['massage']);
                    
          $errorf       = "";
          $errorl       = "";
          $errore       = "";
          $errorb       = "";
          $successmsg       = "";

          if (empty($username)){ 
            $errorf = "User name must not be empty !";
          }if(empty($email)){
            $errorl = "Email must not be empty !";
          }
          if (empty($phone)) { 
            $errore = "Mobile number not be empty !";
          }if(empty($massage)){
            $errorb = "Massage must not be empty !";
          }else{
            $query = "INSERT INTO tbl_contact(username,email,phone,massage) VALUES('$username','$email','$phone','$massage')";
            $contactmsg = $db->insert($query);
            if($contactmsg){
              $successmsg = "<span style='color:green;'>Message sent successfully.</span>";
            }else{
              $error =  "<span class='error'>Message not sent !!</span>";
            }
          }

      }
    ?>
    <?php 
      if(isset($successmsg)){
        echo "<div class='alert alert-success'><span class='success'>$successmsg</span></div>";
      }
    ?>
       
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto"> 
              <div class="box">
                <h2>Login</h2>
                <form action="contact.php" method="POST">
                  <div class="inputBox">
                    <input type="text" name="" required="">
                    <label>Username</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" name="" required="">
                    <label>Password</label>
                  </div>
                  <input type="submit" name="" value="Submit">
                </form>
              </div>
            <form action="contact.php" method="POST">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls ">
                  <label>Name</label>
                  <?php  
                    if (isset($username)) {
                    echo '<span class="error">'.$errorf.'</span>';
                    }
                  ?>
                  <input class="form-control" name="username" id="name" type="text" placeholder="User Name" >
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls ">
                  <label>Email Address</label>
                  <?php  
                    if (isset($email)) {
                    echo '<span class="error">'.$errorl.'</span>';
                    }
                  ?>
                  <input class="form-control" name="email" id="email" type="email" placeholder="Email Address">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls ">
                  <label>Phone Number</label>
                  <?php  
                    if (isset($phone)) {
                    echo '<span class="error">'.$errore.'</span>';
                    }
                  ?>
                  <input class="form-control" name="phone" id="phone" type="tel" placeholder="Phone Number"  >
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls ">
                  <label>Message</label>
                  <?php  
                    if (isset($massage)) {
                    echo '<span class="error">'.$errorb.'</span>';
                    }
                  ?>
                  <textarea class="form-control" name="massage" id="message" rows="5" placeholder="Message"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<link rel="stylesheet" href="js/bootstrap.min.js"> 
<?php include 'inc/footer.php'?>