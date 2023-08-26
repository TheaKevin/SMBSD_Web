@extends('layout.app')

@section('content')

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{asset('storage/homeImage.png')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="700" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">SMB Suvanna Dipa</h1>
                <p class="lead">Sekolah Minggu Buddha (SMB) Suvanna Dipa hadir di Bandar Lampung untuk dapat memberikan pendidikan tambahan secara non formal guna memenuhi kebutuhan spiritualitas atau pendidikan keagamaan bagi siswa/i yang tidak mendapat pendidikan agama Buddha di sekolah dan juga untuk memberikan tambahan teori maupun praktek tentang pendidikan agama Buddha bagi siswa/i yang sudah mendapatkan pendidikan agama Buddha di sekolah formal.</p>
            </div>
        </div>
    </div>

    <div class="b-example-divider full-width"></div>

    <div class="visiMisiWrapper">
        <div class="align-self-start visiItem">
            <h1 class="display-5 fw-bold lh-1 mb-3">
                Visi:
            </h1>

            <div class="lead">
                Menjadi wadah pelayanan terpadu dan sistematis untuk membentuk generasi muda ‘Buddhis seutuhnya’ yang siap menjaga kelangsungan Dhamma dalam kehidupan sehari-hari
            </div>
        </div>

        <img class="img-fluid align-self-center" src="{{asset('storage/VisionMissionImage.png')}}" style="max-width: 250px">

        <div class="align-self-end misiItem">
            <h1 class="display-5 fw-bold lh-1 mb-3 misiHeader">
                Misi:
            </h1>
            
            <div class="mb-2 lead">
                1. Menyelenggarakan pendidikan sekolah minggu berdasarkan nilai-nilai Buddhis, sesuai dengan masing-masing kuadran siswa
            </div>
            
            <div class="mb-2 lead">
                2. Menyelenggarakan pendidikan yang sistematis, terbuka dan melibatkan partisipasi aktif orang tua
            </div>

            <div class="lead">
                3. Saddha, Sila, Sippa
            </div>
        </div>
    </div>

    <div class="b-example-divider full-width"></div>
    
    <div class="basisPembelajaranWrapper">
        <img class="img-fluid align-self-center" src="{{asset('storage/rodaDhamma.png')}}" style="max-width: 250px">

        <div class="basisPembelajaranItem">
            <h1 class="display-5 fw-bold lh-1 mb-3">Basis Pembelajaran</h1>
            <p class="lead">Kurikulum yang disusun & metode pembelajarannya selalu mengacu ke 3 hal utama yaitu Saddha (keyakinan terhadap Buddha Dhamma), Sila (moralitas sebagai fondasi karakter), dan Sippa (ketrampilan penunjang hidup/life skills)</p>
        </div>
    </div>

    <div class="b-example-divider full-width"></div>

    <h2 style="margin-top: 3rem; margin-bottom: 1rem">Kelas</h2>

	<section class="section-kelas" style="margin-bottom: 3rem;">
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