@extends('master_admin')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')

<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> List Sub Category</h3>



      <nav aria-label="breadcrumb ">
        <a href="{{ route('add.subcategory')}}" class="btn btn-primary">Add Sub Category</a>
      </nav>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card bg-light">
          <div class="card-body">
            <div class="table-responsive">
							<table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Category Name</th>
                  <th>Sub Category Name</th>
                  <th class="d-flex justify-content-end">Action</th>
        
                </tr>
              </thead>
              <tbody>

                @foreach($subcat as $key => $row)
                <tr>
                  <td>{{ $key+1}}</td>
                  <td>{{ $row->category_name }}</td>
                  <td>{{ $row->subcategory_name }}</td>
                  <td class="d-flex justify-content-end">

                    <a href="{{ route('details.subcategory',$row->id)}}" class="btn btn-success">View</a>&nbsp;
                    <a href="{{ route('edit.subcategory',$row->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                    <a href="{{ route('delete.subcategory',$row->id)}}" class="btn btn-danger" id="delete">Delete</a>

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