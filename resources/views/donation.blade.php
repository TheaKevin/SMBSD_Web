@extends('layout.app')

@section('content')
	<div class="donationHeader"><h1>Donation</h1></div>

	<div class="donationWrapper">
        <img class="img-fluid align-self-center donationImage" src="{{asset('storage/vihara.jpg')}}">

        <div class="donationItem">
			<h3 class="display-10 fw-bold lh-1 mb-3">
				Bagi yang ingin berdana untuk operasional SMB Suvanna Dipa, dana bisa ditransfer ke rekening SMB Suvanna Dipa dibawah ini:
			</h3>
			<div class="lead">
				<div class="donationTextNorek">
					<h2 class="fw-bold">3372-01-021056-53-9 a/n SMB Suvanna Dipa (BRI)</h2>
				</div>
			</div>
        </div>
    </div>
	
	<div class="donationFooter">
		<div class="donationTextFooter">
			<h4>Anumodana atas dukungan Kalyanamitta sekalian</h4>
		</div>
	</div>
@endsection