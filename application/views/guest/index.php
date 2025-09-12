 <!-- =========================
         HEADLINE / SLIDER (3 contoh item)
         ========================= -->
    <section class="home-wrapper bg" id="home" style="padding-top:80px;">
		<div class="container-fluid">
			<div class="row vertical-content">
				<div class="col-md-12">
					<div class="text-right m-t-90">                        
						<div class="owl-carousel">
							
							<?php
							$rowHeadline = count($headlines);

							if ($rowHeadline > 0):
								foreach ($headlines as $headline):
									$gambarHeadline = $headline['gambar_headline'];
									$namaHeadline = $headline['nama_headline'];
							?>
								<div class="item">
									<div class="testimonial-box">
										<img src="<?= $path_headline . $gambarHeadline; ?>" alt="<?= $namaHeadline; ?>" style="width:100%">
										<button class="btn-image">Lihat Selengkapnya <span class="ion-arrow-right-c"></span></button>
									</div>
								</div>
							<?php
								endforeach;
							endif;

							if ($rowHeadline <= 1):
							?>
								<div class="item">
									<div class="testimonial-box">
										<img src="<?= $path_headline.'fix-headline.png' ?>" alt="Pabrik Kreativitas" style="width:100%">     
									</div>
								</div>
							<?php endif; ?>
							
						</div>                            
					</div>
				</div>
			</div>
		</div>
	</section>


    <!-- =========================
         SERVICES
         ========================= -->
    <section class="section" id="services" style="padding:40px 0;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-left"><h2>Our Services</h2></div>
            </div>
            <div class="row text-center">
                <div class="col-sm-4 m-t-10 services"><a href="#"><img src="<?= base_url("assets/")?>admin/assets/images/icon/ugd.png" alt="UGD"></a></div>
                <div class="col-sm-4 m-t-10 services"><a href="#"><img src="<?= base_url("assets/")?>admin/assets/images/icon/urc.png" alt="URC"></a></div>
                <div class="col-sm-4 m-t-10 services"><a href="#"><img src="<?= base_url("assets/")?>admin/assets/images/icon/pasen.png" alt="Pasen"></a></div>
                <div class="col-sm-4 m-t-10 services"><a href="#"><img src="<?= base_url("assets/")?>admin/assets/images/icon/posyandu.png" alt="Posyandu"></a></div>
                <div class="col-sm-4 m-t-10 services"><a href="#"><img src="<?= base_url("assets/")?>admin/assets/images/icon/apotik.png" alt="Apotik"></a></div>
                <div class="col-sm-4 m-t-10 services"><a href="#"><img src="<?= base_url("assets/")?>admin/assets/images/icon/vaksin.png" alt="Vaksin"></a></div>
            </div>
        </div>
    </section>

    <!-- =========================
         PASEN (contoh grid 6 item)
         ========================= -->
    <section class="brg-section" id="store" style="margin-top: -60px; padding:20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-11"><h3>PASEN</h3></div>
                <div class="col-lg-1"><button class="btn btn-sm btn-menu" onclick="location.href='pasen?page=1&k=all'">Lihat Semua</button></div>
            </div>

            <div class="row" style="margin-top:10px;">
                <?php foreach ($list_desain as $desain): 
					$idDesain = $desain['id_desain'];
					$gambar = $desain['gambar_desain'] ?? 'default.jpg'; // fallback kalau tidak ada gambar
					$namaDesain = (strlen($desain['nama_desain']) > 30)
						? str_pad(substr($desain['nama_desain'], 0, 30), 35, ".")
						: $desain['nama_desain'];
				?>
					<div class="col-sm-6 col-lg-2 col-xs-6" style="margin-top: 5px;">
						<div class="form-group">
							<div class="card card-cursor" onclick="window.location.assign('<?= site_url('detail_desain?id=' . $idDesain); ?>')">
								<img src="<?= base_url('assets/admin/assets/images/ugd/' . $gambar); ?>" class="card-img-top card-img"><br>
								<div class="card-name">
									<p class="card-title"><?= $namaDesain; ?><br><b><?= rupiah($desain['harga']); ?></b></p>
								</div>                                      
							</div>
						</div>
					</div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- =========================
         UGD (contoh)
         ========================= -->
    <section class="brg-section bg-dark-gray" style="padding:20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-11"><h3>UGD</h3></div>
                <div class="col-lg-1"><button class="btn btn-sm btn-menu" onclick="location.href='ugd?page=1&k=all'">Lihat Semua</button></div>
            </div>
            <div class="row" style="margin-top:10px;">
                <?php foreach ($ugd_desain as $desain): 
					$idDesain = $desain['id_desain'];
					$gambar = $desain['gambar_desain'] ?? 'default.jpg';
					$namaDesain = (strlen($desain['nama_desain']) > 30)
						? str_pad(substr($desain['nama_desain'], 0, 30), 35, ".")
						: $desain['nama_desain'];
				?>
					<div class="col-sm-6 col-lg-2 col-xs-6" style="margin-top: 5px;">
						<div class="form-group">
							<div class="card card-cursor" onclick="window.location.assign('<?= site_url('detail_desain?id=' . $idDesain); ?>')">
								<img src="<?= base_url('assets/admin/assets/images/ugd/' . $gambar); ?>" class="card-img-top card-img"><br>
								<div class="card-name">
									<p class="card-title"><?= $namaDesain; ?><br><b><?= rupiah($desain['harga']); ?></b></p>
								</div>                                      
							</div>
						</div>
					</div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- =========================
         URC (contoh)
         ========================= -->
    <section class="brg-section" style="padding:20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-11"><h3>URC</h3></div>
                <div class="col-lg-1"><button class="btn btn-sm btn-menu" onclick="location.href='urc?page=1&k=all'">Lihat Semua</button></div>
            </div>
            <div class="row" style="margin-top:10px;">
                <?php foreach ($list_cetak as $cetak): 
					$namaCetak = (strlen($cetak['jenis_cetak']) > 30)
						? str_pad(substr($cetak['jenis_cetak'], 0, 30), 35, ".")
						: $cetak['jenis_cetak'];
				?>
					<div class="col-sm-6 col-lg-2 col-xs-6" style="margin-top: 5px;">
						<div class="form-group">
							<div class="card card-cursor" onclick="window.location.assign('<?= site_url('detail_cetak?id=' . $cetak['id_cetak']); ?>')">
								<img src="<?= base_url('assets/admin/assets/images/urc/' . $cetak['icon']); ?>" class="card-img" style="object-fit: contain;"><br>
								<div class="card-name">
									<p class="card-title"><?= $namaCetak; ?><br>
									<b><?= rupiah($cetak['harga']) . ' ' . $cetak['ket_harga']; ?></b></p>
								</div>                                      
							</div>
						</div>
					</div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- =========================
         POSYANDU (contoh)
         ========================= -->
    <section class="brg-section bg-dark-gray" style="padding:20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-11"><h3>POSYANDU</h3></div>
                <div class="col-lg-1"><button class="btn btn-sm btn-menu" onclick="location.href='posyandu?page=1&k=all'">Lihat Semua</button></div>
            </div>
            <div class="row" style="margin-top:10px;">
                <?php foreach ($list_jobs as $job): 
					$idJob = $job['id_jobs'];
					$gambar = $job['gambar_jobs'] ?? 'default.jpg';
					$gambarPath = base_url('assets/admin/assets/images/portofolio/' . $gambar);

					$namaArtikel = (strlen($job['judul_jobs']) > 30)
						? str_pad(substr($job['judul_jobs'], 0, 30), 35, ".")
						: $job['judul_jobs'];
				?>
					<div class="col-sm-6 col-lg-2 col-xs-6" style="margin-top: 5px;">
						<div class="form-group">
							<div class="card card-cursor" onclick="window.location.assign('<?= site_url('detail_posyandu?id=' . $idJob); ?>')">
								<img src="<?= $gambarPath; ?>" class="card-img-top card-img"><br>
								<div class="card-name">
									<p class="card-title"><?= $namaArtikel; ?></p>
									<p class="card-title"><i class="fa fa-user"></i> <?= $job['nama_user']; ?></p>
									<small><i class="ion-pricetag"></i> <?= rupiah($job['harga']); ?></small>
								</div>                                      
							</div>
						</div>
					</div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- =========================
         APOTIK (contoh)
         ========================= -->
    <section class="brg-section" style="padding:20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-11"><h3>APOTIK</h3></div>
                <div class="col-lg-1"><button class="btn btn-sm btn-menu" onclick="location.href='apotik?page=1&k=all'">Lihat Semua</button></div>
            </div>
            <div class="row" style="margin-top:10px;">
                <?php foreach ($list_artikel as $artikel): 
					$judul = (strlen($artikel['judul_artikel']) > 30)
						? str_pad(substr($artikel['judul_artikel'], 0, 30), 35, ".")
						: $artikel['judul_artikel'];
				?>
					<div class="col-sm-6 col-lg-2 col-xs-6" style="margin-top: 5px;">
						<div class="form-group">
							<div class="card card-cursor" onclick="window.location.assign('<?= site_url('detail_apotik?id=' . $artikel['id_artikel']); ?>')">
								<img src="<?= base_url('assets/'.$artikel['gambar_path']); ?>" class="card-img-top card-img"><br>
								<div class="card-name">
									<p class="card-title"><?= $judul; ?></p>
									<p class="card-title"><i class="fa fa-user"></i> <?= $artikel['nama_penulis']; ?></p>
									<small>
										<i class="ion-pricetag"></i> <?= $artikel['nama_kategori']; ?> |
										<i class="fa fa-calendar"></i> <?= format_tanggal($artikel['tgl_artikel']); ?>
									</small>
								</div>                                      
							</div>
						</div>
					</div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- =========================
         VAKSIN (contoh)
         ========================= -->
    <section class="brg-section bg-dark-gray" style="padding:20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-11"><h3>VAKSIN</h3></div>
                <div class="col-lg-1"><button class="btn btn-sm btn-menu" onclick="location.href='vaksin?page=1&k=all'">Lihat Semua</button></div>
            </div>
            <div class="row" style="margin-top:10px;">
                <?php foreach ($list_visit as $visit): 
					$namaVisit = (strlen($visit['nama_visit']) > 30)
						? str_pad(substr($visit['nama_visit'], 0, 30), 35, ".")
						: $visit['nama_visit'];

					$gambarPath = base_url('assets/admin/assets/images/poster/' . $visit['gambar_visit']);
				?>
					<div class="col-sm-6 col-lg-2 col-xs-6" style="margin-top: 5px;">
						<div class="form-group">
							<div class="card card-cursor">
								<img src="<?= $gambarPath; ?>" class="card-img-top card-img"><br>
								<div class="card-name">
									<p class="card-title"><?= $namaVisit; ?><br><b><?= rupiah($visit['biaya']); ?></b></p>
								</div>                                      
							</div>
						</div>
					</div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- =========================
         CLIENTS
         ========================= -->
    <section class="section" id="clients" style="padding:30px 0;">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12"><h3>CLIENTS</h3></div>
            </div>
            <div class="row" style="margin-top:10px;">
                <?php foreach ($list_clients as $client): 
					$nama = $client['nama_client'];
					$namaAwal = explode(' ', $nama)[0];
					$pNamaAwal = strlen($namaAwal);
					$namaAkhir = trim(substr($nama, $pNamaAwal)); // hapus spasi depan
				?>
					<div class="col-sm-12 col-lg-3">
						<div class="client-box m-b-1">
							<p><span><?= $namaAwal; ?></span> <?= $namaAkhir; ?></p>
						</div>
					</div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>
