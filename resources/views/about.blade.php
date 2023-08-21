@extends('layout.app')

@section('content')
	<div class="title">
		<h1>About</h1>
	</div>

	<div>
		<h2 class="subTitle-about mb-3">Filosofi Logo</h2>

		<img src="{{asset('storage/logo.png')}}" class="image-size"><br>
	</div>

	<ul class="text">
		<li>Rumah</li>
		<p>Melambangkan SMB kita, dengan pintu yang terbuka; SMB diharapkan bisa menjadi rumah kedua, baik untuk para guru maupun siswa untuk sama-sama terus belajar. Pintu yang terbuka berarti kita sangat open untuk siapa saja yang mau belajar dhamma, dan kita selalu berusaha untuk melihat ke dunia luar untuk terus belajar, supaya SMBSD tetap terus relevan dengan perkembangan zaman.</p>

		<li>Pohon Bodhi</li>
		<p>Pohong Bodhi yang menaungi SMB, yang berarti kita akan terus bertumbuh dan berjuang bersama mengembangkan kebijaksanaan, seperti salah satu perjuangan Siddhartha mencapai penerangan sempurna di bawah Pohon Sala.</p>

		<li>5 Helai Daun</li>
		<p>Melambangkan Pancasila, sebagai salah satu pedoman yang SMB pegang teguh dalam keseluruhan kegiatannya.</p>

		<li>Warna Jingga</li>
		<p>Diambil dari salah satu warna bendera Buddhis, agar kita semua selalu penuh semangat.</p>
	</ul>

	<section class="section-card">
		<div class="wrapper-about">
			<div class="collapsible-1">
				<input type="checkbox" id="collapsible-head-1">

				<label for="collapsible-head-1">Visi</label>

				<div class="collapsible-text-1">
					<h3>Visi</h3>

					<p>Menjadi wadah pelayanan terpadu dan sistematis untuk membentuk generasi muda ‘Buddhis seutuhnya’ yang siap menjaga kelangsungan Dhamma dalam kehidupan sehari-hari</p>
				</div>
			</div>
		</div>

		<div class="wrapper-about">
			<div class="collapsible-2">
				<input type="checkbox" id="collapsible-head-2">

				<label for="collapsible-head-2">Misi</label>

				<div class="collapsible-text-2">
					<h3>Misi</h3>

					<p>Menyelenggarakan pendidikan sekolah minggu berdasarkan nilai-nilai Buddhis, sesuai dengan masing-masing kuadran siswa</p>

					<p>Menyelenggarakan pendidikan yg sistematis, terbuka dan melibatkan partisipasi aktif orang tua</p>

					<p>Saddha, Sila, Sippa</p>
				</div>
			</div>
		</div>

		<div class="wrapper-about">
			<div class="collapsible-3">
				<input type="checkbox" id="collapsible-head-3">

				<label for="collapsible-head-3">Value</label>

				<div class="collapsible-text-3">
					<h3>Value</h3>

					<table border="2" cellspacing="0" cellpadding="3">
						<thead>
							<tr>
								<th>Faith</th>
								<th>Respect</th>
								<th>Integrity</th>
								<th>Excellence</th>
							</tr>
						</thead>

						<tbody>
							<td>Mengembangkan keyakinan seutuhnya untuk terus hidup sesuai Buddha Dhamma</td>
							<td>Hormat kepada Triratna, saudara se-Dhamma, dan semua makhluk</td>
							<td>Berpikir, bertindak, dan berucap sesuai Dhamma</td>
							<td>Selalu mengusahakan yang terbaik dalam setiap “peran hidup” yang dijalankan</td>
						</tbody>

						<thead>
							<tr>
								<th>Non-stop improvement</th>
								<th>Dedicated service</th>
								<th>Love</th>
								<th>Young</th>
							</tr>
						</thead>

						<tbody>
							<td>Terus meningkatkan kualitas diri dan kolektif, melalui teori dan praktek Dhamma secara seimbang	</td>
							<td>Melayani dan mengabdi dengan tulus tanpa pamrih; demi kebahagiaan semua makhluk</td>
							<td>Terus mengembangkan cinta dan welas asih terhadap semua makhluk dan mengesampingkan ego pribadi</td>
							<td>Selalu bersemangat dan penuh sukacita menjalankan Dhamma; serta memastikan proses regenerasi yang berkualitas</td>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>


	<h2>Kelas</h2>

	<section class="section-kelas">
		<div class="d-flex flex-row justify-content-around mb-3 subSection-kelas">
			<div class="kelas kelas1">
				<h3>Boddhicitta</h3>
	
				<p>PG - 2SD</p>
			</div>
	
			<div class="kelas kelas2">
				<h3>Rahula</h3>
	
				<p>3SD - 6SD</p>
			</div>
		</div>

		<div class="d-flex flex-row justify-content-around mb-3 subSection-kelas">
			<div class="kelas kelas3">
				<h3>Siddhartha</h3>
	
				<p>SMP</p>
			</div>
	
			<div class="kelas kelas4">
				<h3>Buddhist Youth Union</h3>
				
				<p>SMA - Kuliah</p>
			</div>
		</div>
	</section>
		
@endsection