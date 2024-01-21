@extends('master_admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                  <th>Product Name</th>
                  <th>Question</th>
                  <th>Answer</th>


                  <th >Action</th>

                </tr>
              </thead>
              <tbody>
                {{-- @dd($questions); --}}
                @foreach($questions as $key=>$row)
                <tr data-order-id="{{ $row->id }}">

                <td class="order_id" data-order-id="{{ $row->id }}">{{ $key+1}}</td>


                <td>{{$row->product_name}}</td>
                <td>{{$row->question}}</td>
                <td class="editable" data-type="text" data-name="address"
                                                data-pk="{{ $row->id }}">{{ $row->answer }}</td>
                <td>Action</td>
                {{-- <td><span class="text-info fw-bold" style="font-size: 16px;">{{ $row->total}}</span></td> --}}

              @endforeach

              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>

    @if(Session::has('success'))
    <script>
        toastr.success("{{ session("success") }}");
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        toastr.error("{{ session("error") }}");
    </script>
    @endif

    <script>

        $('#datatable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf' , 'print'
            ]
        } );

        </script>

<script>

    $(document).on("click","#delete", function(e){
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
       if(willDelete){
         window.location.href = link;
       }else{
         swal("Safe Data!");
       }
     });
    });

   </script>
   <script>
     jQuery(document).ready(function(){

           // ****************************** Update Data  *****************************

           jQuery(document).on('change','.delivery_section',function(){
            var status = $(this).val();
            var id = $(this).closest('tr').find('.order_id').data('order-id');
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'/admin/status/update/' + id,
                type:'POST',
                dataType:'json',
                data: {
                    'id': id,
                    'status': status,
                },
                success:function(result){

                              // Update the order_status cell class based on the new status

                 var orderStatusCell = $('tr[data-order-id="' + id + '"] .order_status');
                      orderStatusCell.removeClass().addClass('order_status');

                      switch (status) {
                          case '0':
                              orderStatusCell.addClass('text-warning fw-bold').html('Order Pending');
                              break;
                          case '1':
                              orderStatusCell.addClass('text-info fw-bold').html('Order Completed');
                              break;
                          case '2':
                              orderStatusCell.addClass('text-danger fw-bold').html('Order Declined');
                              break;
                          case '3':
                              orderStatusCell.addClass('text-success fw-bold').html('Order Delivery');
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
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        });
                        Toast.fire({
                        icon: 'success',
                        title: ' Update Successfully'
                        });

                        // Update the dropdown options based on the updated status
                          var dropdown = $('tr[data-order-id="' + id + '"] .delivery_section');
                          dropdown.removeClass().addClass('form-select delivery_section'); // Reset all classes

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
                          dropdown.find('option[value="' + status + '"]').attr('selected', 'selected').attr('disabled', 'disabled'); // Disable and select the updated status option
                      }


            });

         });


    });
   </script>
   <script>
    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editable[data-name="address"]').editable({
        url: "/order/manage",
        type: 'text',
        title: 'Enter Answer'
    });

</script>
@endsection
