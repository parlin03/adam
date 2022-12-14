<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img class="img-profile" src="<?= base_url('assets/img/favicon.ico') ?>">
        </div>
        <div class="sidebar-brand-text mx-3">ADAM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Query Menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT
	`user_menu`.`id`, `menu` FROM `user_menu` JOIN `user_access_menu` ON
	`user_menu`.`id` = `user_access_menu`.`menu_id` WHERE
	`user_access_menu`.`role_id`= $role_id ORDER BY `user_access_menu`.`menu_id`
	ASC ";
    $menu = $this->db->query($queryMenu)->result_array(); ?>

    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT  `user_sub_menu`.`id`, `user_sub_menu`.`menu_id`,`user_sub_menu`.`title`,
            `user_sub_menu`.`url`, `user_sub_menu`.`icon`, `user_sub_menu`.`is_active`, `menu` 
                        FROM `user_sub_menu` JOIN `user_menu`  
                        ON `user_sub_menu`.`menu_id`  = `user_menu`.`id`
                        WHERE `user_sub_menu`.`menu_id`= $menuId
                        AND `user_sub_menu`.`is_active` = 1
        ";
        $subMenu = $this->db->query($querySubMenu)->result_array(); //
        // var_dump($subMenu);
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                </li>

                <li class="nav-item">
                <?php endif; ?>

                <?php
                $subMenuId = $sm['id'];
                // echo $subMenuId;
                $queryAltSubMenu = "SELECT * 
                        FROM `user_alt_submenu` JOIN `user_sub_menu`  
                        ON `user_alt_submenu`.`submenu_id`  = `user_sub_menu`.`id`
                        WHERE `user_alt_submenu`.`submenu_id`= $subMenuId
                        AND `user_alt_submenu`.`is_active` = 1
                        ORDER BY `user_alt_submenu`.`id` ASC
                        ";
                $altSubMenu = $this->db->query($queryAltSubMenu);
                //                var_dump($altSubMenu); 
                ?>
                <?php if ($altSubMenu->num_rows() < 1) : ?>
                    <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span>
                            <?= $sm['title']; ?>
                        </span>
                    </a>
                <?php else : ?>
                    <?php
                    // $uri = $this->uri->segment(1);
                    $uri = $this->uri->segment(1) . "/" . $this->uri->segment(2);
                    if ($uri == $sm['url']) {
                        $show = 'show';
                        $colaps = '';
                    } else {
                        $show = '';
                        $colaps = 'collapsed';
                    }

                    ?>
                    <a class="nav-link <?= $colaps; ?> pb-0" href="<?= base_url($sm['url']); ?>" data-toggle="collapse" data-target="#<?= str_replace('/', '', $sm['url']); ?>" aria-expanded="true" aria-controls="<?= str_replace('/', '', $sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span>
                            <?= $sm['title']; ?>
                        </span>
                        <!-- <?php var_dump(str_replace('/', '', $sm['url'])); ?>  //check collapse id-->
                    </a>
                    <?php $rasm = $altSubMenu->result_array(); ?>




                    <div id="<?= str_replace('/', '', $sm['url']); ?>" class="collapse <?= $show; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php foreach ($rasm as $asm) : ?>

                                <?php if ($asm['alt_url'] == uri_string()) : ?>
                                    <a class="collapse-item active" href="<?= base_url($asm['alt_url']); ?>">
                                        <?= $asm['alt_title']; ?>
                                    </a>
                                    <?php $show = 'show'; ?>
                                <?php else : ?>
                                    <a class="collapse-item" href="<?= base_url($asm['alt_url']); ?>">
                                        <?= $asm['alt_title']; ?>
                                    </a>
                                <?php endif; ?>


                                <!-- <?php var_dump($asm);; ?> -->

                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                </li>

            <?php endforeach; ?>
            <hr class="sidebar-divider mt-3" />
        <?php endforeach; ?>

        <!-- Nav Item - Dashboard -->

        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>
<!-- End of Sidebar -->