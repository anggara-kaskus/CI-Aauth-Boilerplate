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
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">Setup Data</a>
					<div class="dropdown-menu border rounded" role="menu">
						
						<a class="dropdown-item <?php echo acl('klinik');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/klinik/data');?>">
							Setup Poli
						</a>
						<a class="dropdown-item <?php echo acl('jenis_layanan');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/jenis_layanan/data');?>">
							Setup Layanan
						</a>
						<a class="dropdown-item <?php echo acl('obat');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/obat/data');?>">
							Setup Obat
						</a>
						
						<a class="dropdown-item <?php echo acl('peralatan_medis');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/inventaris/data');?>">
							Setup Peralatan Medis
						</a>
						<a class="dropdown-item <?php echo acl('icdx');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/icdx/data');?>">
							Setup ICDX
						</a>
						<a class="dropdown-item <?php echo acl('supplier');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/supplier/data');?>">
							Setup Supplier
						</a>
						<a class="dropdown-item <?php echo acl('user');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/user/data');?>">
							Setup User
						</a>
						<!--a class="dropdown-item <?php echo acl('pembuat_keputusan');?>" role="presentation" href="#">
							Setup Pembuat Keputusan
						</a-->
						
					</div>
				</li>

				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">Setup Pasien </a>
					<div class="dropdown-menu border rounded" role="menu">
						<a class="dropdown-item <?php echo acl('personal_information');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/personal_information');?>">
							Pasien Umum
						</a>
						<a class="dropdown-item <?php echo acl('karyawan');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/karyawan/data');?>">
							Karyawan SIER
						</a>
						<a class="dropdown-item <?php echo acl('jabatan');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/jabatan/data');?>">
							Plafon Karyawan
						</a>
						<a class="dropdown-item <?php echo acl('plafon_topup');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/plafon_topup/data');?>">
							Top-up Plafon
						</a>
						<a class="dropdown-item <?php echo acl('plafon_reimburse');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/plafon_reimburse/data');?>">
							Reimbursement
						</a>
					</div>
				</li>


				
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">Tarif &amp; Harga</a>
					<div class="dropdown-menu border rounded" role="menu">
						<a class="dropdown-item <?php echo acl('sk_tarif_layanan');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/sk_tarif_layanan/data');?>">Tarif Layanan Pasien Umum & BPJS KES</a>
						<a class="dropdown-item <?php echo acl('sk_tarif_layanan_bpjstk');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/sk_tarif_layanan_bpjstk/data');?>">Tarif Layanan Pasien BPJS-TK</a>
						<a class="dropdown-item <?php echo acl('sk_harga_obat');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/sk_harga_obat/data');?>">Harga Jual Obat Umum</a>
						<a class="dropdown-item <?php echo acl('sk_harga_obat_bpjstk');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/sk_harga_obat_bpjstk/data');?>">Harga Jual Obat BPJS-TK</a>
						<a class="dropdown-item <?php echo acl('sk_harga_obat_bpjskes');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/sk_harga_obat_bpjskes/data');?>">Harga Jual Obat BPJS-Kesehatan</a>
						<!--a class="dropdown-item <?php echo acl('sk_fasilitas_klinik');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/sk_fasilitas_klinik/data');?>">Fasilitas Klinik</a-->
					</div>
				</li>
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">Admission Rawat Jalan</a>
					<div class="dropdown-menu border rounded" role="menu">
						<a class="dropdown-item <?php echo acl('pendaftaran_pemeriksaan');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/pendaftaran_pemeriksaan');?>">Pendaftaran Pemeriksaan</a>
						<a class="dropdown-item <?php echo acl('rekam_medis');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/rekam_medis/add');?>">Rawat Jalan</a>
						<a class="dropdown-item <?php echo acl('pendaftaran_pemeriksaan');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/pendaftaran_pemeriksaan/antrian');?>">Daftar Antrian</a>
					</div>
				</li>
				<!--li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">Purchase Order</a>
					<div class="dropdown-menu border rounded" role="menu">
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order/warning_stock');?>">Warning Stock Obat <span style="background-color:#fb0202; color:#fff;" class="btn btn-danger badge badge-light"><?php echo warning_stock();?></span></a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item <?php echo acl('purchase_order_inventaris');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order_inventaris');?>">Request Order</a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order');?>">PO Obat kpd Supplier</a>
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order/penerimaan');?>">Penerimaan PO Obat Dari Supplier</a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item <?php echo acl('purchase_order_inventaris');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order_inventaris');?>">PO Peralatan Medis Kpd Supplier </a>
						<a class="dropdown-item <?php echo acl('purchase_order_inventaris');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order_inventaris/penerimaan_inventaris');?>">Penerimaan PO Peralatan Medis</a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item" role="presentation" href="#">List Request Order <span style="background-color:#fb0202; color:#fff;" class="btn btn-danger badge badge-light">0</span></a>
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order/laporan_kepada_supplier');?>">List PO Obat</a>
						<a class="dropdown-item <?php echo acl('penerimaan');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/penerimaan/laporan_penerimaan');?>">List Penerimaan PO Obat</a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item <?php echo acl('purchase_order_inventaris');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order_inventaris/laporan_kepada_supplier_inventaris');?>">List PO Peralatan Medis</a>
						<a class="dropdown-item <?php echo acl('penerimaan_inventaris');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/penerimaan_inventaris/laporan_penerimaan_inventaris');?>">List Penerimaan PO Peralatan Medis</a>
					</div>
				</li-->
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" href="#">Purchase Order</a>
					<div class="dropdown-menu border rounded" role="menu">
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order/warning_stock');?>">Warning Stock Obat <span style="background-color:#fb0202; color:#fff;" class="btn btn-danger badge badge-light"><?php echo warning_stock();?></span></a>
						<a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order/warning_expired_date');?>">Warning Expired Date Obat <span style="background-color:#fb0202; color:#fff;" class="btn btn-danger badge badge-light"><?php echo warning_expired_date();?></span></a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item <?php echo acl('request_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/request_order/obat');?>">Request Order Obat</a>
						<a class="dropdown-item <?php echo acl('request_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/request_order/medis');?>">Request Order Alat Medis</a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<!-- <a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order');?>">PO Obat kpd Supplier</a> -->
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order/penerimaan');?>">Penerimaan PO Obat Dari Supplier</a>
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order_inventaris/penerimaan_inventaris');?>">Penerimaan PO Peralatan Medis</a>
						
						<!-- <a class="dropdown-item" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order_inventaris');?>">PO Peralatan Medis Kpd Supplier </a> -->
						
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item <?php echo acl('request_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/request_order/data_ro_obat');?>">List Request Order Obat  <span style="background-color:#fb0202; color:#fff;" class="btn btn-danger badge badge-light"> <?php echo ro_select_no();?></span> </a>
						<a class="dropdown-item <?php echo acl('request_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/request_order/data_ro_medis');?>">List Request Order Alat Medis  <span style="background-color:#fb0202; color:#fff;" class="btn badge badge-light"> <?php echo ro_medis_select_no()?></span> </a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order/laporan_kepada_supplier');?>">List PO Obat <span style="background-color:#4f962b; color:#fff;" class="btn badge badge-light"><?php echo ro_select_yes();?></span></a>
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/purchase_order_inventaris/laporan_kepada_supplier_inventaris');?>">List PO Peralatan Medis <span style="background-color:#4f962b; color:#fff;" class="btn badge badge-light"><?php echo ro_medis_select_yes()?></span></a>
						<hr style="margin-top:1px; margin-bottom:1px; color:#000;">
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/penerimaan/laporan_penerimaan');?>">List Penerimaan PO Obat</a>
						<a class="dropdown-item <?php echo acl('purchase_order');?>" role="presentation" href="<?php echo site_url(MODULE_POLIKLINIK . '/penerimaan_inventaris/laporan_penerimaan_inventaris');?>">List Penerimaan PO Peralatan Medis</a>
					</div>
				</li>
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link border rounded border-info shadow-sm" data-toggle="dropdown" aria-expanded="false" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;color: #17a2be;" href="#">
						<i class="fa fa-cogs" aria-hidden="true"></i>
					</a>
					<div class="dropdown-menu border rounded border-light shadow-sm" role="menu" style="font-size: 14px;background-color: #007bff;">
						<a class="dropdown-item" role="presentation" style="background-color: #007bff;color: #ffffff;" href="<?php echo site_url(MODULE_POLIKLINIK.'/aauthprofile') ?>">Setting Profile</a>
						<?php if(acl_perms('aauthuser')): ?>
							<!--a class="dropdown-item" role="presentation" style="background-color: #007bff;color: #ffffff;" href="<?php echo site_url(MODULE_POLIKLINIK.'/aauthuser/data') ?>">Setting User</a-->
						<?php endif; ?>

						<?php if(acl_perms('aauthgroup')): ?>
							<a class="dropdown-item" role="presentation" style="background-color: #007bff;color: #ffffff;" href="<?php echo site_url(MODULE_POLIKLINIK.'/aauthgroup/data') ?>">Setting Group Access</a>
						<?php endif; ?>
						<?php if(acl_perms('aauthperms')): ?>
							<a class="dropdown-item" role="presentation" style="background-color: #007bff;color: #ffffff;" href="<?php echo site_url(MODULE_POLIKLINIK.'/aauthperms/data') ?>">Setting Permission Access</a>
						<?php endif; ?>

						<?php if(acl_perms('modul')): ?>
							<!--a class="dropdown-item" role="presentation" style="background-color: #007bff;color: #ffffff;" href="<?php echo site_url(MODULE_POLIKLINIK.'/modul')?>">Setting Modul</a-->
						<?php endif; ?>
					</div>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" style="font-size: 14px;padding-top: 8px;padding-right: 20px;padding-bottom: 5px;padding-left: 20px;color: #9975aa;" href="<?php echo site_url(MODULE_POLIKLINIK . '/aauthprofile');?>">
						<?php echo $this->aauth->get_user()->name;?>
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