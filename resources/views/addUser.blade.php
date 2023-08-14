@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Tambah User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addUserProcess') }}">
                        @csrf

                        <div class="form-group">
                            <label for="loginID">{{ __('Login ID') }}</label>
                            <input id="loginID" type="text" class="form-control @error('loginID') is-invalid @enderror" name="loginID" value="{{ old('loginID') }}" required autocomplete="loginID" autofocus>
                            @error('loginID')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fullName">{{ __('Nama Lengkap') }}</label>
                            <input id="fullName" type="text" class="form-control @error('fullName') is-invalid @enderror" name="fullName" value="{{ old('fullName') }}" required>
                            @error('fullName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nickname">{{ __('Nama Panggilan') }}</label>
                            <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}">
                        </div>

                        <div class="form-group">
                            <label for="gender">{{ __('Jenis Kelamin') }}</label>
                            <select id="gender" class="form-control" name="gender">
                                <option value="male" selected>Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">{{ __('Alamat') }}</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>

                        <div class="form-group">
                            <label for="dob">{{ __('Tanggal Lahir') }}</label>
                            <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                        </div>

                        <div class="form-group">
                            <label for="classSMBSD">{{ __('Kelas SMB') }}</label>
                            <input id="classSMBSD" type="text" class="form-control" name="classSMBSD" value="{{ old('classSMBSD') }}">
                        </div>

                        <div class="form-group">
                            <label for="classSchool">{{ __('Kelas Sekolah') }}</label>
                            <input id="classSchool" type="text" class="form-control" name="classSchool" value="{{ old('classSchool') }}">
                        </div>

                        <div class="form-group">
                            <label for="schoolName">{{ __('Nama Sekolah') }}</label>
                            <input id="schoolName" type="text" class="form-control" name="schoolName" value="{{ old('schoolName') }}">
                        </div>

                        <div class="form-group">
                            <label for="hobby">{{ __('Hobi') }}</label>
                            <input id="hobby" type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                        </div>

                        <div class="form-group">
                            <label for="hope">{{ __('Harapan ikut SMB') }}</label>
                            <input id="hope" type="text" class="form-control" name="hope" value="{{ old('hope') }}">
                        </div>

                        <div class="form-group">
                            <label for="ekskul">{{ __('Ekskul') }}</label>
                            <input id="ekskul" type="text" class="form-control" name="ekskul" value="{{ old('ekskul') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Add User') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
