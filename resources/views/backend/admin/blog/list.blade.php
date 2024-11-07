@extends('master_admin')
@section('title', 'Flow Tech BD | List Blog')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> List blog</h3>

        <nav aria-label="breadcrumb">
            <a href="{{ route('add.blog') }}" class="btn btn-primary">Add blog</a>
        </nav>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="shihab"></div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered display nowrap">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th class="wd-15p">Image</th>
                                    <th>Autor Name</th>
                                    <th>Meta Title</th>
                                    <th>Meta Tag</th>
                                    {{-- <th>Meta Description</th> --}}
                                    <th>Short Description</th>
                                    <th class="d-flex justify-content-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blog as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> <img src="{{ URL::to($row->image) }}" height="50px;" width="50px;"> </td>
                                        <td>{{ $row->autor_name }}</td>
                                        <td>{{ $row->meta_title }}</td>
                                        <td>{{ $row->meta_tag }}</td>
                                        {{-- <td>{{ $row->meta_description }}</td> --}}
                                        <td>{{ $row->short_description }}</td>
                                        <td class="d-flex justify-content-end">

                                            <a href="{{ route('edit.blog', $row->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit"></i>
                                                Edit</a>&nbsp;
                                            <a href="{{ route('delete.blog', $row->id) }}" class="btn btn-sm btn-danger"
                                                id="delete">
                                                <i class="fa fa-trash"></i>
                                                Delete</a>
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
@push('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#example2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endpush
