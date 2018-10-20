<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>All User List</h2>
		<?php 
			if (isset($_GET['deluser'])) {
				$userid = $_GET['deluser'];
				$query   = "DELETE FROM tbl_user WHERE id = '$userid' ";
				$delete  = $db->delete($query);
				if($delete){
					echo "<span class='success'>User Deleted successfully.</span>";
				}else{
					echo "<span class='error'>User not Deleted !!</span>";
				}
			}
		?>
		<div class="block">        
			<table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Name</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Details</th>
					<th>Role</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$query  = "select * from tbl_user ";
				$userlist = $db->select($query);
				$i=0;
				if($userlist){
					while($result = $userlist->fetch_assoc()){ 
						$i++;
			?>
			<tr class="odd gradeX">
				<td><?php echo $i ?></td>
				<td><?php echo $result['name'] ?></td>
				<td><?php echo $result['username'] ?></td>
				<td><?php echo $result['email'] ?></td>
				<td><?php echo $result['info'] ?></td>
				<td>   
                <?php  
                    if($result['role'] == 0){
                        echo "Admin";
                    }elseif($result['role'] == 1){
                        echo "Editor";
                    }elseif($result['role'] == 2){
                        echo "Author";
                    }
                ?>
                </td>
				<td>
					<a href="viewuser.php?userid=<?php echo $result['id'] ?>">view</a>
					<?php
					if(Session::get('userrole') == '0' ){?> 
						 || <a onclick="return confirm('Are you sure to Delete ?')" href="?deluser=<?php echo $result['id']?>">Delete</a>
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