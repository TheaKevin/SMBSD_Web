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
                <div class="card-header">{{ __('Update Progress Siswa') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateProgressProcess') }}">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">{{ __('Nama Siswa') }}</label>
                            <select id="user_id" class="form-control" name="user_id">
                                @foreach ($members as $member)
                                    <option value="{{$member->id}}">{{$member->fullName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="childProgressSummary">{{ __('Ringkasan Perkembangan Siswa') }}</label>
                            <input id="childProgressSummary" type="text" class="form-control @error('childProgressSummary') is-invalid @enderror" name="childProgressSummary" value="{{ old('childProgressSummary') }}" required>
                            @error('childProgressSummary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="childProgressLearned">{{ __('Hal Yang Dipelajari Siswa') }}</label>
                            <input id="childProgressLearned" type="text" class="form-control @error('childProgressLearned') is-invalid @enderror" name="childProgressLearned" value="{{ old('childProgressLearned') }}" required>
                            @error('childProgressLearned')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            {{ __('Update Progress Siswa') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
