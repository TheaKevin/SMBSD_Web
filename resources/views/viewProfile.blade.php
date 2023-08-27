@extends('layout.app') {{-- You can adjust your app layout here --}}

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="mb-0">{{ $user->fullName }}</h2>

                    <div class="d-flex justify-content-between">
                        <div>
                            @if($user->userDetail)
                                <p class="mb-1">{{ $user->userDetail->nickname }}</p>
                                <p class="mb-1">{{ $user->userDetail->gender }}, {{ $user->userDetail->calculateAge() }} tahun</p>
                            @endif
                        </div>

                        <div>
                            @if($user->userDetail)
                                <p class="mb-1">Kelas: {{ $user->userDetail->classSMBSD }}</p>
                                <p class="mb-1">Point: {{ $user->userDetail->point }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Perkembangan Murid</h5>
                    @foreach($childProgress as $progress)
                        <div class="card mb-3">
                            <a href="#"
                            onclick="openProgressModal({{ $progress->id }});"
                            class="card-body text-decoration-none"
                            style="color: black;">
                                <div class="card-text">
                                    {{ date('M Y', strtotime($progress->created_at)) }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{ $childProgress->links() }}
                </div>
            </div>
        </div>
    </div>

    @foreach($childProgress as $progress)
        @include('partials.childProgressModal', ['progress' => $progress])
    @endforeach
@endsection

@section('scripts')
    <script>
        function openProgressModal(progressId) {
            $('#progressModal' + progressId).modal('show');
        }
    </script>
@endsection
