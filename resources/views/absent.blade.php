@extends('layout.app')

@section('content')
    <h1>Absen</h1>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>

            {{ session('error') }}
            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('absentProcess') }}">
        @csrf
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama Lengkap</th>
                        <th>Nama Panggilan</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" name="selected_users[]" value="{{ $user->id }}">
                        </td>
                        <td>{{ $user->fullName }}</td>
                        <td>{{ $user->userDetail->nickname }}</td>
                        <td>{{ $user->userDetail->calculateAge() }}</td>
                        <td>{{ $user->userDetail->gender }}</td>
                        <td>{{ $user->userDetail->classSMBSD }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <link href="{{ asset('css/addAdminView.css') }}" rel="stylesheet">
@endsection
