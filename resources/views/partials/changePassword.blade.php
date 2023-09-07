<div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ganti Password :</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (session('gantiPasswordError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('gantiPasswordError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="modal-body">
            <form action="{{ route('gantiPassword') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        {{-- Curr Password --}}
                        <input class="mb-3 form-control @error('Password_gantipassword') is-invalid @enderror"
                            type="password"
                            name="Password_gantipassword"
                            id="Password_gantipassword"
                            placeholder="Password"
                            >
                        @error('Password_gantipassword')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                        @enderror


                        {{-- New Password --}}
                        <input class="mb-3 form-control @error('NewPassword') is-invalid @enderror"
                            type="password"
                            name="NewPassword"
                            id="NewPassword"
                            placeholder="New Password"
                            >
                        @error('NewPassword')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                        @enderror

                        
                        {{-- Confirm New Password --}}
                        <input class="mb-3 form-control @error('NewPassword_confirmation') is-invalid @enderror"
                            type="password"
                            name="NewPassword_confirmation"
                            id="NewPassword_confirmation"
                            placeholder="Cofirm New Password"
                            >
                        @error('NewPassword_confirmation')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                        @enderror
                        
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                            
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    @if( ($errors->has('Password_gantipassword') == 1 ||
        $errors->has('NewPassword') == 1 ||
        $errors->has('NewPassword_confirmation') == 1) ||
        Session::has('gantiPasswordError'))

        @if($errors->has('Password_gantipassword') == 1)
            document.getElementById('Password_gantipassword').classList.remove('mb-3');
        @endif

        @if($errors->has('NewPassword') == 1)
            document.getElementById('NewPassword').classList.remove('mb-3');
        @endif

        @if($errors->has('NewPassword_confirmation') == 1)
            document.getElementById('NewPassword_confirmation').classList.remove('mb-3');
        @endif

        $(window).on('load', function() {
            $('#gantiPassword').modal('show');
        });
    @endif
</script>