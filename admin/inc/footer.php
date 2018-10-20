
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
        <p>&copy;
              <?php 
                echo date('Y'); 
                $query = "select * from tbl_copyright";
                $copy = $db->select($query)->fetch_assoc(); 
                echo $copy['copyright'].' Admin Panel';
              ?>
              </p>
        </p>
    </div>
</body>
</html>
