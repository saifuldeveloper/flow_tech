@extends('master_admin')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')

<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title "> List Product</h3>



      <nav aria-label="breadcrumb">
        <a href="{{ route('page.combo')}}" class="btn btn-primary mb-3">Add combo</a>
      </nav>
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
                  <th>Combo Image </th>
                  <th>Combo Product Name </th>
                  <th>Combo Price</th>
                  <th>Combo Discount</th>
                  <th>Status</th>
                  <th class="d-flex justify-content-end">Action</th>

                </tr>
              </thead>
              <tbody>

                @foreach($combo as $key => $row)
                <tr>
                  <td>{{ $key+1 }}</td>

                  <td>{{ Str::limit($row->product_name, 30)}}</td>
                  <td> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"> </td>
                  <td>{{ $row->first_product_name }}</td>
                  <td>{{ $row->first_selling_price }}</td>
                  <td>{{ $row->first_discount_price }}</td>
                  <td >
                    @if($row->status == 1)
                       <span class="badge text-success">Active</span>
                    @else
                       <span class="badge text-danger">Inactive</span>
                    @endif

                 </td>

                  <td class="d-flex justify-content-end">

                    @if($row->status == 1)
                    <a href="{{ URL::to('inactive/combo/'.$row->id) }}" class="btn-lg bg-danger" title="Inactive" ><i class="lni lni-thumbs-down text-white "></i></a>&nbsp;
                               @else
                     <a href="{{ URL::to('active/combo/'.$row->id) }}" class=" btn-lg btn-info" title="Active" ><i class="lni lni-thumbs-up text-danger "></i></a>&nbsp;
                               @endif

                    {{-- <a href="{{ route('details.combo',$row->id)}}" class="btn btn-success">View</a>&nbsp; --}}
                    {{-- <a href="{{ route('edit.combo',$row->id)}}" class="btn btn-primary">Edit</a>&nbsp; --}}
                    <a href="{{ route('delete.combo',$row->product_id)}}" class="btn btn-danger" id="delete">Delete</a>

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
