@extends('master_admin')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')
    <div class="page-header">
      <h3 class="page-title"> List blog</h3>

      <nav aria-label="breadcrumb">
        <a href="{{ route('add.blog')}}" class="btn btn-primary">Add blog</a>
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
                  <th class="wd-15p">Image</th>
                  <th>Autor Name</th>
                  <th>Meta Title</th>
                  <th>Meta Tag</th>
                  <th>Meta Description</th>
                  <th>Short Description</th>
                  <th class="d-flex justify-content-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($blog as $key => $row)
                <tr>
                  <td>{{ $key+1}}</td>
                  <td> <img src="{{ URL::to($row->image) }}" height="50px;" width="50px;"> </td>
                  <td>{{$row->autor_name}}</td>
                  <td>{{$row->meta_title}}</td>
                  <td>{{$row->meta_tag}}</td>
                  <td>{{$row->meta_description}}</td>
                  <td>{{$row->short_description}}</td>
                  <td class="d-flex justify-content-end">
                    <a href="{{ route('details.blog',$row->id)}}" class="btn btn-success">View</a>&nbsp;
                    <a href="{{ route('edit.blog',$row->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                    <a href="{{ route('delete.blog',$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
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


    @if(Session::has('success'))
    <script>
        toastr.success("{{ session("success") }}");
    </>
    @endif

    @if(Session::has('error'))
    <script>
        toastr.error("{{ session("error") }}");
    </script>
    @endif


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
$('#example2').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf' , 'print'
    ]
} );
</script>
@endsection
