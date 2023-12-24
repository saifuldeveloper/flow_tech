@extends('master_admin')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')

<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Track Request</h3>




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
                  <th>Invoice</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Total Amount</th>


                  <th class="d-flex justify-content-end">Action</th>

                </tr>
              </thead>
              <tbody>

                @foreach($tracks as $key=>$row)
              <tr>
                <td>{{ $key+1}}</td>
                <td>{{ $row->invoice_num}}</td>

                <td>
                    @if($row->status == 0)
                       <span class="text-danger">Tracking Pending</span>
                    @else
                       <span class="text-success">Tracking Delivery</span>
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>
                <td>{{ $row->name}}</td>
                <td>{{ $row->phone}}</td>
                <td>{{ $row->address}}</td>
                <td>{{ $row->city}}</td>
                <td><span class="text-info" style="font-size: 16px;">{{ $row->total}}</span></td>




                <td class="text-right">

                    @if($row->status == 1)
                    <a href="{{ URL::to('inactive/track/'.$row->id) }}" class="badge badge-danger" title="Inactive" ><i class="fa fa-thumbs-down"  style="background-color: #dc3545; padding: 5px; border-radius: 50%; color: white;"></i></a>&nbsp;

                               @else
                     {{-- <a href="{{ URL::to('active/track/'.$row->id) }}" class="btn btn-sm btn-info" title="Active" ><i class="fa fa-thumbs-up"></i></a>&nbsp; --}}

                     <a href="{{ URL::to('active/track/'.$row->id) }}" class="badge badge-info" title="Active">
                        <i class="fa fa-thumbs-up" style="background-color: #17a2b8; padding: 5px; border-radius: 50%; color: white;"></i>
                    </a>

                               @endif

                  {{-- <a href="{{ route('details.track',$row->id)}}" class="btn btn-sm btn-success" >View</a>&nbsp; --}}

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

@endsection
