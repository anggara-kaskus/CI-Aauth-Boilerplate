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
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/pasien_umum_harian');?>">
							Pasien Umum
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/karyawan_harian');?>">
							Pasien Karyawan
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/bpjs_tk_harian');?>">
							Pasien BPJS TK
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/bpjs_kesehatan_harian');?>">
							Pasien BPJS Kesehatan
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/diagnosis_penyakit_terbanyak_harian');?>">
							Diagnosis Penyakit Terbanyak
						</a>
					</div>
				</li>
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">
						Laporan Bulanan
					</a>
					<div class="dropdown-menu border rounded" role="menu">
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/pasien_umum_bulanan');?>">
							Pasien Umum
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/karyawan_bulanan');?>">
							Pasien Karyawan
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/bpjs_tk_bulanan');?>">
							Pasien BPJS TK
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/bpjs_kesehatan_bulanan');?>">
							Pasien BPJS Kesehatan
						</a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/dashboard/diagnosis_penyakit_terbanyak_bulanan');?>">
							Diagnosis Penyakit Terbanyak
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