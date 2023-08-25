@extends('layout.app') {{-- You can adjust your app layout here --}}

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    {{ $user->fullName }}'s Profile
                </div>
                <div class="card-body">
                    <h5 class="card-title">Personal Information</h5>
                    <p>Email: {{ $user->email }}</p>
                    @if($user->userDetail)
                        <p>Gender: {{ $user->userDetail->gender }}</p>
                        {{-- Display other user detail fields here --}}
                    @endif
                    <h5 class="card-title">Child Progress</h5>
                    <ul>
                        @foreach($user->childProgress as $progress)
                            <li>
                                <a href="#" onclick="openProgressModal({{ $progress->id }});">
                                    {{ date('M Y', strtotime($progress->createdDate)) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @foreach($user->childProgress as $progress)
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
