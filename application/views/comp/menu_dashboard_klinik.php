<nav class="navbar navbar-light navbar-expand-lg sticky-top border rounded-0 shadow-sm navigation-clean">
	<div class="container-fluid">
		<a class="navbar-brand border rounded shadow-sm" style="color: #1375c6;" href="<?php echo site_url(MODULE_POLIKLINIK);?>">
			<i class="fa fa-plus-circle" style="color: #e61352;"></i> SIER - KLINIK
		</a>

		<button data-toggle="collapse" class="navbar-toggler shadow-sm" data-target="#navcol-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navcol-1">
			<ul class="nav navbar-nav ml-auto">
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">
						Laporan Harian
					</a>
					<div class="dropdown-menu border rounded" role="menu">
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/klinik_umum_harian');?>">
							Klinik Umum
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/klinik_gigi_harian');?>">
							Klinik Gigi
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/kia_harian');?>">
							Klinik Ibu dan Anak
						</a>
					</div>
				</li>
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">
						Laporan Bulanan
					</a>
					<div class="dropdown-menu border rounded" role="menu">
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/klinik_umum_bulanan');?>">
							Klinik Umum
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/klinik_gigi_bulanan');?>">
							Klinik Gigi
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/kia_bulanan');?>">
							Klinik Ibu dan Anak
						</a>
					</div>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" style="font-size: 14px;padding-top: 5px;padding-right: 20px;padding-bottom: 5px;padding-left: 20px;color: #9975aa;">
						Account
					</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link border rounded shadow-sm" data-bs-hover-animate="pulse" href="<?php echo site_url(MODULE_POLIKLINIK . '/aauthlogout');?>">
						<i class="fa fa-power-off" style="color: #e61352;"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>