@extends('master_admin')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')

<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> List Coupon</h3>
      <nav aria-label="breadcrumb">
        <a href="{{ route('add.coupon')}}" class="btn btn-primary">Add Coupon</a>
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

                @foreach($coupon as $key => $row)
                <tr>
                  <td>{{ $key+1}}</td>
           
                  <td>{{ $row->coupon }}</td>
                  <td>{{ $row->discount }}%</td>

                  <td class="d-flex justify-content-end">
                    <a href="{{ route('details.coupon',$row->id)}}" class="btn btn-success">View</a>&nbsp;
                    <a href="{{ route('edit.coupon',$row->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                    <a href="{{ route('delete.coupon',$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
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