<?php
	$qz = mysqli_query($koneksi,"SELECT * FROM users WHERE username='".$_SESSION['username']."' ");
	$dz = mysqli_fetch_array($qz);
?>
<ul class="menu">
    <li class="sidebar-title">Menu</li>
	<?php 
		if($dz["ug_id"]=="1"){
	?>
    <li class="sidebar-item <?php echo ($page == "users" ? "active" : "")?>">
    <a href="<?php echo ($page == "users" ? "index.php" : "../users")?>" class='sidebar-link'>
            <i class="bi bi-people"></i>
            <span>Users</span>
        </a>
    </li>
		<?php } ?>
    <li class="sidebar-item <?php echo ($page == "populate_details" ? "active" : "")?>">
        <a href="<?php echo ($page == "populate_details" ? "index.php" : "../populate_details")?>" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Shrines</span>
        </a>
    </li>
    <?php 
		if($dz["ug_id"]=="1"){
	?>
    <li class="sidebar-item <?php echo ($page == "visitor_crud" ? "active" : "")?>">
        <a href="<?php echo ($page == "visitor_crud" ? "index.php" : "../visitor_crud")?>" class='sidebar-link'>
            <i class="bi bi-question"></i>
            <span>Visitor</span>
        </a>
    <!-- </li> -->
		<?php } else{ ?>
			<li class="sidebar-item <?php echo ($page == "kuesioner" ? "active" : "")?>">
				<a href="<?php echo ($page == "kuesioner" ? "index.php" : "../kuesioner")?>" class='sidebar-link'>
					<i class="bi bi-question"></i>
					<span>Questionnaire</span>
				</a>
			</li>
		<?php }?>
	<li class="sidebar-item">
        <a href="../../apps/logout.php " class='sidebar-link'>
            <i class="bi bi-arrow-left-square"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
