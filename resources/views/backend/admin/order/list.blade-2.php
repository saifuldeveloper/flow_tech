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
                                        <th>Status</th>

                                        <th>Complted Or Pending </th>
                                        {{-- <th>Declined Or Delivery</th> --}}

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order as $key => $row)
                                        <tr data-order-id="{{ $row->id }}">

                                            <td class="order_id" data-order-id="{{ $row->id }}">{{ $key + 1 }}
                                            </td>

                                            <td class="order_status" data-status="{{ $row->status }}">
                                                @if ($row->status == 0)
                                                    <span class="text-warning fw-bold">Order Pending</span>
                                                @elseif($row->status == 1)
                                                    <span class="text-info fw-bold">Order Completed</span>
                                                @elseif($row->status == 2)
                                                    <span class="text-danger fw-bold">Order Declined</span>
                                                @elseif($row->status == 3)
                                                    <span class="text-success fw-bold">Order Delivery</span>
                                                @endif
                                            </td>

                                            <td class="text-right">
                                                <select class="form-select delivery_section"
                                                    aria-label="Default select example"
                                                    onchange="status_update({{ $row->id }},this.value)">
                                                    @if ($row->status == 0)
                                                        <option selected disabled class="fw-bold text-warning">Pending
                                                        </option>
                                                    @elseif ($row->status == 1)
                                                        <option selected disabled class="fw-bold text-info">Completed
                                                        </option>
                                                    @elseif ($row->status == 2)
                                                        <option selected disabled class="fw-bold text-danger">Decline
                                                        </option>
                                                    @elseif ($row->status == 3)
                                                        <option selected disabled class="fw-bold text-success">Delivered
                                                        </option>
                                                    @endif

                                                    <option value="0">Pending</option>
                                                    <option value="1">Completed</option>
                                                    <option value="2">Decline</option>
                                                    <option value="3">Delivered</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('details.order', $row->id) }}"
                                                    class="btn btn-sm btn-success">View</a>&nbsp;
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
                            case '0':
                                orderStatusCell.addClass('text-warning fw-bold').html(
                                    'Order Pending');
                                break;
                            case '1':
                                orderStatusCell.addClass('text-info fw-bold').html(
                                    'Order Completed');
                                break;
                            case '2':
                                orderStatusCell.addClass('text-danger fw-bold').html(
                                    'Order Declined');
                                break;
                            case '3':
                                orderStatusCell.addClass('text-success fw-bold').html(
                                    'Order Delivery');
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
                            case '0':
                                dropdown.addClass('text-warning fw-bold');
                                break;
                            case '1':
                                dropdown.addClass('text-info fw-bold');
                                break;
                            case '2':
                                dropdown.addClass('text-danger fw-bold');
                                break;
                            case '3':
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
