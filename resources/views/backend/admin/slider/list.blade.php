@extends('master_admin')
@section('title', 'Flow Tech BD | List Slider')
@section('content')
    <h3 class="page-title"> List Slider</h3>

    </div>
    <div class="row m-2">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th class="wd-15p">Silder Image</th>
                                    <th>Title</th>
                                    <th>Meta Tag</th>
                                    <th>Meta Description</th>
                                    <th class="d-flex justify-content-end">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($slider as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> <img src="{{ URL::to($row->slider_img) }}" height="50px;" width="50px;"> </td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->meta_tag }}</td>
                                        <td>{{ $row->meta_description }}</td>
                                        <td class="d-flex justify-content-end">

                                            {{-- <a href="{{ route('details.slider',$row->id)}}" class="btn btn-success">View</a>&nbsp; --}}
                                            <a href="{{ route('edit.slider', $row->id) }}" class="btn btn-sm btn-primary">
                                                <fa class="fa fa-edit"></fa>
                                                Edit
                                            </a>&nbsp;
                                            {{-- <a href="{{ route('delete.slider',$row->id)}}" class="btn btn-danger" id="delete">Delete</a> --}}

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
