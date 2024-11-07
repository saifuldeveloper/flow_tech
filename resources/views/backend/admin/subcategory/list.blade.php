@extends('master_admin')
@section('title', 'Flowtech BD | List Subcategory')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> List Sub Category</h3>

            <nav aria-label="breadcrumb ">
                <a href="{{ route('add.subcategory') }}" class="btn btn-primary">Add Sub Category</a>
            </nav>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th class="wd-15p">Image</th>
                                        <th class="wd-15p">Banner</th>
                                        <th>Category Name</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Meta Tag</th>
                                        <th class="d-flex justify-content-end">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subcat as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>

                                                <img src="{{ !empty($row->subcategory_img) ? URL::to($row->subcategory_img) : config('app.placeholder') . '/150X150' }}"
                                                    height="50px;" width="50px;">
                                            </td>

                                            <td>
                                                <img src="{{ !empty($row->subcategory_banner) ? URL::to($row->subcategory_banner) : config('app.placeholder') . '/150X150' }}"
                                                    height="50px;" width="50px;">
                                            </td>

                                            <td>{{ $row->category_name }}</td>
                                            <td>{{ $row->subcategory_name }}</td>
                                            <td>{{ $row->subcategory_slug }}</td>
                                            <td>{{ $row->meta_tag }}</td>
                                            <td class="d-flex justify-content-end align-items-center">

                                                {{-- <a href="{{ route('details.subcategory', $row->id) }}"
                                                    class="btn btn-success">View</a>&nbsp; --}}

                                                <a href="{{ route('edit.subcategory', $row->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>Edit
                                                </a>&nbsp;
                                                <a href="{{ route('delete.subcategory', $row->id) }}"
                                                    class="btn btn-sm btn-danger" id="delete"> <i
                                                        class="fa fa-trash"></i>Delete</a>

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
    </div>
@endsection
@push('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
