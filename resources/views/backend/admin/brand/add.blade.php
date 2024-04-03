@extends('master_admin')


@section('content')
    <div class="page-header">
        <h3 class="page-title">Add Brand</h3>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" name="brand_name">

                            <span style="color: red;">
                                @error('brand_name')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Tag</label><br>
                            <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput">

                            <span style="color: red;">
                                @error('meta_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Description</label><br>
                            <textarea class="form-control" name="meta_description" id="" cols="30" rows="10"></textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group">
                            <label class="form-label">Brand Logo</label>
                            <input type="file" name="brand_logo" class="form-control" id="upload_file"
                                onchange="getImagePreview(event)" required>

                            <span class="custom-file-control "></span>
                            <br>
                            <div id="preview"></div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light" href="">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('preview');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "150";
            newimg.height = "150";
            imagediv.appendChild(newimg);
        }
    </script>
@endsection
