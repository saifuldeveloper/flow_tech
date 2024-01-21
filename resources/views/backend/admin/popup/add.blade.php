@extends('master_admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add Popup</h6>

                    <form action="{{ route('store.popup') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                            <label class="form-label">Popup Link</label><br>
                            <input type="text" name="popup_link" class="form-control">

                            <span style="color: red;">
                                @error('popup_link')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Popup Image </label>

                            <input type="file" name="popup_img" class="form-control " id="upload_file"
                                onchange="getImagePreview(event)" required>
                            <br>
                            <span class="custom-file-control "></span>

                            <div id="preview"></div>


                        </div>

                        <button type="submit" class="btn btn-info">Submit</button>
                        <a class="btn btn-secondary" href="">Cancel</a>
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
