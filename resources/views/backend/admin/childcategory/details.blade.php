@extends('master_admin')


@section('content')
    <div class="page-header">
        <h3 class="page-title">Details Category</h3>

    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">

                    <div class="form-group">
                        <label>Sub Category Name</label>
                        <select class="form-control select2" name="sub_category_id">
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}"
                                    {{ $categories->sub_category_id == $row->id ? 'selected' : '' }} @readonly(true)>
                                    {{ $row->category_name }} -> {{ $row->subcategory_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Child Category Name</label>
                        <input type="text" class="form-control" name="childcategory_name" readonly
                            value="{{ $categories->childcategory_name }}">

                        <span style="color: red;">
                            @error('childcategory_name')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div class="form-group">
                        <label class="form-label">Child Category Slug</label><br>
                        <input type="text" name="childcategory_slug" class="form-control"
                            value="{{ $categories->childcategory_slug }}">

                        <span style="color: red;">
                            @error('childcategory_slug')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Tag</label><br>
                        <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput"
                            readonly value="{{ $categories->meta_tag }}">

                        <span style="color: red;">
                            @error('meta_tag')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Description</label><br>
                        <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $categories->meta_description }}</textarea>

                        <span style="color: red;">
                            @error('meta_description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <center>
                        <div class="form-group">
                            <label class="form-label">Category Image</label>
                            <br>

                            <img id="logo-preview" src="{{ URL::to($categories->childcategory_img) }}" alt="Brand Logo"
                                style="max-width: 400px;" required>

                        </div>
                    </center>
                </div>
            </div>
        </div>
    @endsection
