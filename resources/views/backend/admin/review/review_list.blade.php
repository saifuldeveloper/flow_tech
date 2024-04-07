@extends('master_admin')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>

@section('content')
    <div class="page-header">
        <h3 class="page-title">Review List</h3>

        <nav aria-label="breadcrumb">
            <a href="{{ route('add.brand') }}" class="btn btn-primary">Add Brand</a>
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
                                    <th class="wd-15p">Product</th>
                                    <th class="wd-15p">Product Name</th>
                                    <th>User</th>
                                    <th>Ratting</th>
                                    <th>Reviwe</th>
                                    <th>status</th>
                                    <th class="d-flex justify-content-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $key => $row)
                                    <tr>
                                        <td class="item_id" data-item-id="{{ $row->id }}">{{ $key + 1 }}</td>
                                        <td> <img src="{{ URL::to($row->product->image_one) }}" height="50px;"
                                                width="50px;"> </td>
                                        <td>{{ $row->product->product_name }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->ratting }}</td>
                                        <td>{{ $row->comments }}</td>
                                        <td class="review_status" data-status="{{ $row->status }}">
                                            @if ($row->active_status == 1)
                                                <span class="badge text-success">Active</span>
                                            @else
                                                <span class="badge text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="justify-content-end">
                                            <select class="form-select delivery_section"
                                                aria-label="Default select example">

                                                @if ($row->active_status == 1)
                                                    <option selected disabled class="fw-bold text-warning">Active</option>
                                                @elseif ($row->active_status == 0)
                                                    <option selected disabled class="fw-bold text-info">Inactive</option>
                                                @endif
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                            {{-- <a href="{{ route('delete.brand', $row->id) }}" class="btn btn-danger"
                                                id="delete">Delete</a> --}}
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


    @if (Session::has('success'))
        <script>
            toastr.success("{{ session('success') }}"); <
            />
            @endif

            @if (Session::has('error'))
                <
                script >
                    toastr.error("{{ session('error') }}");
        </script>
    @endif


    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>

    <script>
        $('#example2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>


    <script>
        jQuery(document).ready(function() {

            // ****************************** Update Data  *****************************

            jQuery(document).on('change', '.delivery_section', function() {
                var status = $(this).val();
                var id = $(this).closest('tr').find('.item_id').data('item-id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin/product/review/status/' + id,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id': id,
                        'status': status,
                    },
                    success: function(result) {
                      window.location.reload();


                      
                    }


                });

            });


        });
    </script>
@endsection
