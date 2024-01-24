@extends('master_admin')
@section('content')
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <div class="page-header">
        <h3 class="page-title">Submite Answer</h3>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="row">
                <div class="card bg-light">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('update.answer', $answer->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name </label>
                                    <input type="text" class="form-control" name="product_name"
                                        value="{{ $answer->product_name }}">

                                    <span style="color: red;">
                                        @error('product_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Question </label>
                                    <input type="text" class="form-control" name="question"
                                        value="{{ $answer->question }}">

                                    <span style="color: red;">
                                        @error('question')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Question Answer</label><br>

                                    <textarea class="form-control" id="summernote" cols="15" rows="15" name="answer" required> {{ $answer->answer }}</textarea>

                                    <span style="color: red;">
                                        @error('answer')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            {{-- <a class="btn btn-light" href="">Cancel</a> --}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script type="text/javascript">
        document.getElementById('logo').addEventListener('change', function(event) {
            const preview = document.getElementById('logo-preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
            } else {
                preview.src = '{{ URL::to($blog->image) }}';
            }
        });
    </script> --}}
    <script>
        $('#summernote').summernote({

            tabsize: 2,
            height: 100
        });
    </script>
@endsection
