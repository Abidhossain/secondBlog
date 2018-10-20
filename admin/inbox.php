<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>

<div class="grid_10">
    <div class="box round first grid">
                <h2>Inbox Message</h2>
				<?php 
					 if (isset($_GET['msgid'])) {  
						$msgid = $_GET['msgid'];
						$query = "UPDATE tbl_contact
									SET
									status = '1'
									WHERE id= '$msgid'";
						$sentmail = $db->update($query);
					   if ($sentmail) { 
					   echo '<span class="success">Mail Sent to the seen box. </span>';
					   }else{ 
					   echo '<span class="error">Mail Not Sent in the seen box !</span>';
					   }
					   }
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile No</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody> 
					<?php
						$query = "select * from tbl_contact where status = 0 order by id desc";
						$getmessage = $db->select($query);
						$i = 0;
						if ($getmessage) {
								while ($result = $getmessage->fetch_assoc()) { 
									$i++;
					?>  
						<tr class="odd gradeX">
							<td width=""><?php echo $i ?></td>
							<td><?php echo $result['username']?></td>
							<td><?php echo $result['email'] ?></td> 
							<td><?php echo $result['phone'] ?></td>
							<td><?php echo $fm->textShort($result['massage'], 30) ?></td>
							<td><?php echo $fm->dmyFormat($result['date']) ?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['id']?>">View</a> ||
								<a href="replymsg.php?msgid=<?php echo $result['id']?>">Reply</a>   ||
								<a href="?msgid=<?php echo $result['id']?>"  onclick="return confirm('Are you sure to move in seen box?');" >Seen</a>
							</td>
						</tr>
					<?php } } ?>
					</tbody>
				</table> 
				 </div>
				 
    <div class="box round first grid">
			<h2>Seen Message</h2>
				<?php 
					if (isset($_GET['delid'])) {
						$delid = $_GET['delid'];
						$query   = "DELETE FROM tbl_contact WHERE id = '$delid'  ";
						$delete  = $db->delete($query);
						if($delete){
							echo "<span class='error'>Massage successfully Deleted.</span>";
						}else{
							echo "<span class='error'>Massage not Deleted !!</span>";
						}
					}
				?>
			<div class="block">        
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody> 
					<?php
						$query = "select * from tbl_contact where status = 1 order by id asc";
						$getmessage = $db->select($query);
						$i = 0;
						if ($getmessage) {
								while ($result = $getmessage->fetch_assoc()) { 
									$i++;
					?>  
						<tr class="odd gradeX">
							<td width=""><?php echo $i ?></td>
							<td><?php echo $result['username']?></td>
							<td><?php echo $result['email'] ?></td>
							<td><?php echo $result['phone'] ?></td>
							<td><?php echo $fm->textShort($result['massage'], 30) ?></td>
							<td><?php echo $fm->dmyFormat($result['date']) ?></td>
							<td> 
								<a href="?delid=<?php echo $result['id']?>"  onclick="return confirm('Are you sure to delete the massage?');" >Delete</a>
							</td>
						</tr>
					<?php } } ?>
					</tbody>
				</table>
		</div>
	</div>  
</div>  
<?php include 'inc/footer.php' ?>