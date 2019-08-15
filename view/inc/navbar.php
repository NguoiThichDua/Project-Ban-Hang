<div class="navbar b-sd-lg" id="navbar">
	<div class="">
		<a href="index.php" class="float-left">Trang Chủ</a>
	</div>
	<?php
		# Admin
		if(isset($_SESSION['admin'])){																				
	?>
		<div class="">
			<a href="index.php?page=TrangQuanLi" class="float-right">Trang Quản Lí</a>
			<a href="controller/NguoiDungController.php?yc=dangxuat" class="float-right">Log Out</a>
		</div>
	<?php
		# User
		}else if(isset($_SESSION['user'])){
		
	?>
		<a href="index.php?page=Profile" class="float-right">Trang Cá Nhân</a>
		<a href="controller/NguoiDungController.php?yc=dangxuat" class="float-right">Log Out</a>
	<?php
		# Chưa đăng nhập
		}else{
			?>
			<div class="">
				<a href="index.php?page=DangNhap"  class="float-right">Đăng Nhập</a>
				<a href="index.php?page=DangKi"  class="float-right">Đăng Kí</a>
			</div>
		<?php
		}
	?>
</div> 
