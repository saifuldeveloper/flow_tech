@extends('master_admin')
@section('title', 'Flow Tech BD | Edit Slider')
@section('content')

    <div class="page-header">
        <h3 class="page-title">Edit Slider</h3>

    </div>
    <div class="row ">
        <div class="col-md-6 grid-margin stretch-card ">
            <div class="card bg-light">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('update.slider.site', $homesitesliders->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Marquee Text Slider</label>
                            <input type="text" name="marquee" class="form-control"
                                value="{{ $homesitesliders->marquee }}">

                            <span style="color: red;">
                                @error('marquee')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label">Meta Tag</label><br>
                            <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput"
                                readonly value="{{ $homesitesliders->meta_tag }}">

                            <span style="color: red;">
                                @error('meta_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label">Meta Description</label><br>
                            <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $homesitesliders->meta_description }}</textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label">Slider Image</label>
                            <input type="file" name="slider_img" class="form-control" id="logo" accept="image/*">
                            <br>

                            <img id="logo-preview" src="{{ URL::to($homesitesliders->slider_img) }}"
                                style="max-width: 200px;">

                            <div id="preview"></div>

                            <input type="hidden" name="old_logo" value="{{ $homesitesliders->slider_img }}">

                        </div>
                        <button type="submit" class="btn btn-primary mr-2 mt-2">Update</button>
                        <a class="btn btn-light" href="">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script type="text/javascript">
        document.getElementById('logo').addEventListener('change', function(event) {
            const preview = document.getElementById('logo-preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
            } else {
                preview.src = '{{ URL::to($homesitesliders->slider_img) }}';
            }
        });
    </script>
@endpush
