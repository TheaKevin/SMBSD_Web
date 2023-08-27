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
                <div class="card-header">{{ __('Tambah Orang Tua') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addParentProcess') }}">
                        @csrf

                        <div class="form-group">
                            <label for="child">{{ __('Anak') }}</label>
                            <select id="child" class="form-control" name="child">
                                @foreach ($members as $member)
                                    <option value="{{$member->id}}">{{$member->fullName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="parent">{{ __('Orang Tua') }}</label>
                            <select id="parent" class="form-control" name="parent">
                                @foreach ($parents as $parent)
                                    <option value="{{$parent->id}}">{{$parent->fullName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            {{ __('Tambah Orang Tua') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
