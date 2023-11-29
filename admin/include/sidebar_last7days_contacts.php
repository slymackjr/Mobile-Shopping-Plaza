<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-phone-fill"></i><span>Manage Contacts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="todays-contact.php">
                        <i class="bi bi-circle"></i><span>Today's Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="last-sevendays-contacts.php" class="active">
                        <i class="bi bi-circle"></i><span>Last 7 Days Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="all-contacts.php">
                        <i class="bi bi-circle"></i><span>All Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="update-email.php">
                        <i class="bi bi-circle"></i><span>Update Admin Email</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Manage Contacts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Manage Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="product-list.php">
                        <i class="bi bi-circle"></i><span>Product List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Manage Products Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="users.php">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li><!-- End Users Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="sales.php">
                <i class="bi bi-cash"></i>
                <span>Sales</span>
            </a>
        </li><!-- End Sales Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="logout.php">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Logout Page Nav -->

    </ul>

</aside><!-- End Sidebar-->