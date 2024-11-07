@extends('master_admin')
@section('title', 'Flow Tech BD | List Coupon')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> List Coupon</h3>
            <nav aria-label="breadcrumb">
                <a href="{{ route('add.coupon') }}" class="btn btn-primary">Add Coupon</a>
            </nav>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th class="wd-15p">Coupon Name</th>
                                        <th>Discount</th>
                                        <th class="d-flex justify-content-end">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($coupon as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $row->coupon }}</td>
                                            <td>{{ $row->discount }}</td>

                                            <td class="d-flex justify-content-end">

                                                <a href="{{ route('edit.coupon', $row->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                    Edit</a>&nbsp;
                                                <a href="{{ route('delete.coupon', $row->id) }}"
                                                    class="btn btn-sm btn-danger" id="delete">
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
    </div>

@endsection
@push('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
