@extends('master_admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Order Reports</h3>

        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        {{-- <th>Shipping Address</th> --}}
                                        <th>City</th>
                                        <th>Amount</th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order as $key => $row)
                                        <tr data-order-id="{{ $row->id }}">

                                            <td class="order_id" data-order-id="{{ $row->id }}">{{ $key + 1 }}
                                            </td>

                                            {{-- <td class="order_status" data-status="{{ $row->status }}">
                                                @if ($row->status == 'pending')
                                                    <span class="text-warning fw-bold">Pending</span>
                                                @elseif($row->status == 'completed')
                                                    <span class="text-info fw-bold">Completed</span>
                                                @elseif($row->status == 'rejected')
                                                    <span class="text-danger fw-bold">Rejected</span>
                                                @elseif($row->status == 'processing')
                                                    <span class="text-success fw-bold">Processing</span>
                                                @elseif($row->status == 'paid')
                                                    <span class="text-success fw-bold">Paid</span>
                                                @elseif($row->status == 'unpaid')
                                                    <span class="text-success fw-bold">Unpaid</span>
                                                @endif
                                            </td> --}}
                                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->address }}</td>
                                            {{-- <td>{{ $row->shipping_address }}</td> --}}
                                            <td>{{ $row->city }}</td>
                                            {{-- <td>{{ $row->zone}}</td> --}}
                                            <td><span class="text-info fw-bold"
                                                    style="font-size: 16px;">{{ $row->total }}</span></td>
                                            <td class="text-right">
                                                <select class="form-select delivery_section"
                                                    aria-label="Default select example"
                                                    onchange="status_update({{ $row->id }},this.value)">
                                                    @if ($row->status == 'pending')
                                                        <option selected disabled class="fw-bold text-warning">Pending
                                                        </option>
                                                    @elseif ($row->status == 'completed')
                                                        <option selected disabled class="fw-bold text-info">Completed
                                                        </option>
                                                    @elseif ($row->status == 'processing')
                                                        <option selected disabled class="fw-bold text-danger">Processing
                                                        </option>
                                                    @elseif ($row->status == 'paid')
                                                        <option selected disabled class="fw-bold text-success">Paid
                                                        </option>
                                                    @elseif ($row->status == 'unpaid')
                                                        <option selected disabled class="fw-bold text-success">Unpaid
                                                        </option>
                                                    @elseif ($row->status == 'rejected')
                                                        <option selected disabled class="fw-bold text-success">Rejected
                                                        </option>
                                                    @endif

                                                    <option value="pending">Pending</option>
                                                    <option value="processing">Processing</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="paid">Paid</option>
                                                    <option value="unpaid">Unpaid</option>
                                                    <option value="rejected">Rejected </option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('details.order', $row->id) }}"
                                                    class="btn btn-sm btn-success">View</a>&nbsp;
                                                <a href="{{ route('invoice.orderlist', $row->id) }}"
                                                    class="btn btn-sm btn-info">Invoice</a>&nbsp;
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

    @if (Session::has('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    <script>
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>

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
        jQuery(document).ready(function() {

            // ****************************** Update Data  *****************************

            jQuery(document).on('change', '.delivery_section', function() {
                var status = $(this).val();
                var id = $(this).closest('tr').find('.order_id').data('order-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin/status/update/' + id,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id': id,
                        'status': status,
                    },
                    success: function(result) {

                        // Update the order_status cell class based on the new status

                        var orderStatusCell = $('tr[data-order-id="' + id + '"] .order_status');
                        orderStatusCell.removeClass().addClass('order_status');

                        switch (status) {
                            case 'pending':
                                orderStatusCell.addClass('text-warning fw-bold').html(
                                    'Pending');
                                break;
                            case 'completed':
                                orderStatusCell.addClass('text-info fw-bold').html(
                                    'Completed');
                                break;
                            case 'rejected':
                                orderStatusCell.addClass('text-danger fw-bold').html(
                                    'Rejected');
                                break;
                            case 'processing':
                                orderStatusCell.addClass('text-success fw-bold').html(
                                    'Processing');
                                break;
                            case 'paid':
                                orderStatusCell.addClass('text-success fw-bold').html(
                                    'Paid');
                                break;
                            case 'unpaid':
                                orderStatusCell.addClass('text-success fw-bold').html(
                                    'Unpaid');
                                break;
                            default:
                                break;
                        }
                        // After update show this message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'cemter',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        });
                        Toast.fire({
                            icon: 'success',
                            title: ' Update Successfully'
                        });

                        // Update the dropdown options based on the updated status
                        var dropdown = $('tr[data-order-id="' + id + '"] .delivery_section');
                        dropdown.removeClass().addClass(
                            'form-select delivery_section'); // Reset all classes

                        switch (status) {
                            case 'pending':
                                dropdown.addClass('text-warning fw-bold');
                                break;
                            case 'completed':
                                dropdown.addClass('text-info fw-bold');
                                break;
                            case 'rejected':
                                dropdown.addClass('text-danger fw-bold');
                                break;
                            case 'processing':
                                dropdown.addClass('text-success fw-bold');
                                break;
                            case 'paid':
                                dropdown.addClass('text-success fw-bold');
                                break;
                            case 'unpaid':
                                dropdown.addClass('text-success fw-bold');
                                break;
                            default:
                                break;
                        }
                        // Set the selected value to the updated status
                        dropdown.val(status);
                        dropdown.find('option[value="' + status + '"]').attr('selected',
                            'selected').attr('disabled',
                            'disabled'); // Disable and select the updated status option
                    }


                });

            });


        });
    </script>
@endsection
