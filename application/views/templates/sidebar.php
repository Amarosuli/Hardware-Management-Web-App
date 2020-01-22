<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-aviatio"></i>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- QUERY MENU -->

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu =  "SELECT user_menu.id , menu
                    FROM user_menu JOIN user_access_menu
                    ON user_menu.id = user_access_menu.menu_id
                    WHERE user_access_menu.role_id =  $role_id
                    ORDER BY user_access_menu.menu_id ASC";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB-MENU SESUAI MENU HEAD -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                        FROM user_sub_menu JOIN user_menu
                        ON user_sub_menu.menu_id = user_menu.id
                        WHERE user_sub_menu.menu_id = ?
                        AND user_sub_menu.is_active = 1";

        $subMenu = $this->db->query($querySubMenu, array($menuId))->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($sm['menu_url']); ?>">
                    <i class="<?= $sm['menu_icon']; ?>"></i>
                    <span><?= $sm['menu_title']; ?></span></a>
            </li>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->