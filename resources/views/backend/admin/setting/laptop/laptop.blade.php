@extends('master_admin')
@section('title', 'Flow Tech BD | ডিজিটাল কমার্স নির্দশিকা')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">ডিজিটাল কমার্স নির্দশিকা</h3>
        </div>
        @php
            $setting = DB::table('settings')->first();
        @endphp

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ route('laptop.page.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label><br>
                                        <textarea class="form-control autosize" name="Best_laptop" id="summernote8" style="height: 200px;">{{ $setting->Best_laptop }} </textarea>
                                        <span style="color: red;">
                                            @error('Best_laptop')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary my-4 float-end" type="submit">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote8').summernote({
            tabsize: 2,
            height: 500
        });
    </script>
@endpush
