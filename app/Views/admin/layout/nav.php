<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
        <div class="container-fluid">
            <button class="header-toggler px-md-0 me-md-3" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                <svg class="icon icon-lg">
                    <use xlink:href="<?= base_url() ?>Admin/dist/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button><a class="header-brand d-md-none" href="<?= base_url() ?>Admin/dist/#">
                <svg width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="<?= base_url() ?>Admin/dist/assets/brand/coreui.svg#full"></use>
                </svg></a>
            <ul class="header-nav ms-3">
                <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown"
                        href="<?= base_url() ?>Admin/dist/#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-md"><img
                                src="<?= base_url() ?>Admin/dist/assets/img/avatars/admin.png" width="70"
                                alt="user@email.com">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        <a class="dropdown-item" href="<?= base_url() ?>keluar_petugas">
                            <svg class="icon me-2">
                                <use
                                    xlink:href="<?= base_url() ?>Admin/dist/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                                </use>
                            </svg> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item active"><span><?= $judul ?>/</span></li>
                </ol>
            </nav>
        </div>
    </header>