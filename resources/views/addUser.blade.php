@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>

                    {{ session('success') }}
                    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="classSMBSD">{{ __('Kelas SMB') }}</label>
                            <select id="classSMBSD" class="form-control" name="classSMBSD">
                                <option value="Boddhicitta" selected>A</option>
                                <option value="Rahula">B</option>
                                <option value="Siddhartha">C</option>
                                <option value="BYU">BYU</option>
                            </select>
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

                        <div class="form-group">
                            <label for="role">{{ __('Role') }}</label>
                            <select id="role" class="form-control" name="role">
                                <option value="member" selected>Member</option>
                                <option value="parent">Orang tua</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            {{ __('Add User') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
