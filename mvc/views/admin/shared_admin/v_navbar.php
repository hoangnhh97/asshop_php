<?php 
    $root = Common::template_directory();
?>
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h5 class="m-0">Hoàng Nguyễn</h5>
        <p class="font-weight-light text-muted mb-0">Web developer</p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dasboard</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="<?php echo $root ?>/Admin/Index" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Dashboard
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $root ?>" target="_blank" class="nav-link text-dark font-italic">
                <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                Trang chủ
            </a>
    </li>
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Quản lý</p>
    <li class="nav-item">
      <a href="<?php echo $root ?>/Admin/QuanLyNguoiDung" class="nav-link text-dark font-italic">
                <i class="fa fa-user-friends mr-3 text-primary fa-fw"></i>
                Người dùng
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $root ?>/Admin/QuanLySanPham" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Sản phẩm
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $root ?>/Admin/QuanLyDanhMuc" class="nav-link text-dark font-italic">
                <i class="fa fa-tags  mr-3 text-primary fa-fw"></i>
                Danh mục
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $root ?>/Admin/QuanLyThe" class="nav-link text-dark font-italic">
                <i class="fa fa-tag mr-3 text-primary fa-fw"></i>
                Tags
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $root ?>/Admin/QuanLyQuyen" class="nav-link text-dark font-italic">
                <i class="fa fa-user-alt-slash mr-3 text-primary fa-fw"></i>
                Quyền
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $root ?>/Admin/QuanLyDonHang" class="nav-link text-dark font-italic">
                <i class="fa fa-box mr-3 text-primary fa-fw"></i>
                Đơn hàng
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $root ?>/Admin/QuanLyChiTietDonHang" class="nav-link text-dark font-italic">
                <i class="fa fa-box mr-3 text-primary fa-fw"></i>
                Chi tiết đơn hàng
            </a>
    </li>
  </ul>

  
  <hr>

  <div class="container">
    <p class="text-center">Copyright &copy; 2019 - by HoangNguyen</p>
  </div>

</div>
<!-- End vertical navbar -->
