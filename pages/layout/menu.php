<?php
$qz = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "' ");
$dz = mysqli_fetch_array($qz);
?>
<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item <?php echo ($page == "users" ? "active" : "") ?>">
        <a href="<?php echo ($page == "users" ? "index.php" : "../users") ?>" class='sidebar-link'>
            <i class="bi bi-people"></i>
            <span>Users</span>
        </a>
    </li>

    <li class="sidebar-item <?php echo ($page == "populate_details" ? "active" : "") ?>">
        <a href="<?php echo ($page == "populate_details" ? "index.php" : "../populate_details") ?>" class='sidebar-link'>
            <i class="bi bi-building"></i>
            <span>Shrines</span>
        </a>
    </li>

    <li class="sidebar-item <?php echo ($page == "visitor_crud" ? "active" : "") ?>">
        <a href="<?php echo ($page == "visitor_crud" ? "index.php" : "../visitor_crud") ?>" class='sidebar-link'>
            <i class="bi bi-arrow-repeat"></i>
            <span>Visitor</span>
        </a>
    </li>

    <li class="sidebar-item <?php echo ($page == "province" ? "active" : "") ?>">
        <a href="<?php echo ($page == "province" ? "index.php" : "../province") ?>" class='sidebar-link'>
            <i class="bi bi-house"></i>
            <span>Province</span>
        </a>
    </li>

    <li class="sidebar-item <?php echo ($page == "district" ? "active" : "") ?>">
        <a href="<?php echo ($page == "district" ? "index.php" : "../district") ?>" class='sidebar-link'>
            <i class="bi bi-house"></i>
            <span>District</span>
        </a>
    </li>

    <li class="sidebar-item <?php echo ($page == "sub_district" ? "active" : "") ?>">
        <a href="<?php echo ($page == "sub_district" ? "index.php" : "../sub_district") ?>" class='sidebar-link'>
            <i class="bi bi-house"></i>
            <span>Sub District</span>
        </a>
    </li>

    <li class="sidebar-item <?php echo ($page == "village" ? "active" : "") ?>">
        <a href="<?php echo ($page == "village" ? "index.php" : "../village") ?>" class='sidebar-link'>
            <i class="bi bi-house"></i>
            <span>Village</span>
        </a>
    </li>

    <li class="sidebar-item">
        <a href="../../apps/logout.php " class='sidebar-link'>
            <i class="bi bi-arrow-left-square"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>