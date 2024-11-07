@extends('master_admin')

@section('content')
    <div>
        <h3 class="page-title"> Child Category List</h3>
        <nav aria-label="breadcrumb">
            <a href="{{ route('add.childcategory') }}" class="btn btn-primary">Add Child Category</a>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th class="wd-15p">Image</th>
                                    <th>Banner Image</th>
                                    <th>Child Category Name</th>
                                    <th>Child Category Slug</th>
                                    <th>Meta Tag</th>

                                    <th class="d-flex justify-content-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>

                                            <img src="{{ !empty($category->childcategory_img) ? URL::to($category->childcategory_img) : config('app.placeholder') . '/150X150' }}"
                                                height="50px;" width="50px;">
                                        </td>

                                        <td>
                                            <img src="{{ !empty($category->childcategory_banner) ? URL::to($category->childcategory_banner) : config('app.placeholder') . '/150X150' }}"
                                                height="50px;" width="50px;">
                                        </td>

                                        <td>{{ $category->childcategory_name }}</td>
                                        <td>{{ $category->childcategory_slug }}</td>
                                        <td>{{ $category->meta_tag }}</td>

                                        <td class="d-flex justify-content-end align-items-center">

                                            {{-- <a href="{{ route('details.childcategory', $category->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fa fa-eye"></i>View
                                            </a>&nbsp; --}}
                                            <a href="{{ route('edit.childcategory', $category->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit"></i>Edit
                                            </a>&nbsp;
                                            <a href="{{ route('delete.childcategory', $category->id) }}"
                                                class="btn btn-sm btn-danger" id="delete">
                                                <i class="fa fa-trash"></i>Delete
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
