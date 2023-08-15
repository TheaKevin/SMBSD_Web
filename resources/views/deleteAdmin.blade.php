@extends('layout.app')

@section('content')
    <h1>Hapus Admin</h1>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form method="POST" action="{{ route('deleteAdminProcess') }}">
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
                        <th>Email</th>
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
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary">Hapus Admin</button>
    </form>

    <link href="{{ asset('css/addAdminView.css') }}" rel="stylesheet">
@endsection
