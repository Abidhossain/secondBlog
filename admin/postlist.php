<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2> 
                <div class="block">  
                    <table class="data display datatable table" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Post Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Image</th>
							<th>Post Tags</th>
							<th>Author</th> 
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = "SELECT tbl_post.* , tbl_category.name FROM tbl_post
							INNER JOIN tbl_category 
							ON tbl_post.catid = tbl_category.id 
							ORDER By tbl_post.title ASC";
						$post  = $db->select($query);
						$i=0;
						if($post){
							while ($result = $post->fetch_assoc()) {
								$i++; 
					?>
						<tr class="odd gradeX">
							<td width="5%"><?php echo $i ?></td> 
							<td width="10%"><?php echo $fm->textShort($result['title'], 20)?></td> 
							<td width="15%" width="5%"><?php echo $fm->textShort($result['body'], 80);?></td> 
							<td width="10%"><?php echo $result['name']?></td> 
							<td width="10%">
								<img height="45px" src="<?php echo $result['image']?>" alt="post-image">
							</td> 
							<td width="15%"><?php echo $result['tags']?></td> 
							<td width="10%"><?php echo $result['author']?></td> 
							<td width="10%"><?php echo $fm->dateFormat($result['date']) ?></td> 
							<td width="15%">
							<a href="viewpost.php?postid=<?php echo $result['id'] ?>">View</a>
		<?php 
			if (Session::get('userId') == $result['userId'] || Session::get('userrole') == '0')
			
			 {
				 
		?>
				|| <a href="editpost.php?postid=<?php echo $result['id'] ?>">Edit</a> ||<a href="deletepost.php?delpostid=<?php echo $result['id'] ?>" onclick="return confirm('Are you sure to delete this post ?')">Delete</a> 
			<?php } ?>
							
						</td>
						</tr>
						 <?php } } ?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div> 
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
	<?php include 'inc/footer.php'?>