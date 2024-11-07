@extends('master_admin')

@section('content')
    {{-- cdin link toaster  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-8">
        <div class="col mx-auto">
            <div class="mb-4 text-center">
                <img src="assets/images/logo-img.png" width="180" alt="" />
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">
                            <h3 class="">Admin Reset Password</h3>

                        </div>

                        <div class="form-body">
                            <form action="{{ route('admin.password.reset.store') }}" class="row g-3" method="post">
                                @csrf
                                <div class="col-12">
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" id="old_password"
                                        placeholder="Enter Old Password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">New
                                        Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control border-end-0"
                                            id="inputChoosePassword" placeholder="Enter New Password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Confirm
                                        Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation"
                                            class="form-control border-end-0" id="inputChoosePassword"
                                            placeholder="Password Confirmation">
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Reset
                                            Password </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->


    @if (Session::has('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
@endsection
