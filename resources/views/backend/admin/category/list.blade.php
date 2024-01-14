@extends('master_admin')



@section('content')


      <h3 class="page-title"> List Category</h3>


      <nav aria-label="breadcrumb">
        <a href="{{ route('add.category')}}" class="btn btn-primary">Add Category</a>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card bg-light">
          <div class="card-body">
            <div class="table-responsive">
							<table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th class="wd-15p">Category Image</th>
                  <th>Category Name</th>
                  <th>Category Slug</th>
                  <th>Meta Tag</th>
                  <th>Meta Description</th>
                  <th class="d-flex justify-content-end">Action</th>

                </tr>
              </thead>
              <tbody>

                @foreach($categories as $key => $category)
                <tr>
                  <td>{{ $key+1}}</td>
                  <td> <img src="{{ URL::to($category->category_img)}}" height="50px;" width="50px;"> </td>
                  <td>{{ $category->category_name }}</td>
                  <td>{{ $category->category_slug }}</td>
                  <td>{{ $category->meta_tag}}</td>
                  <td>{{ $category->meta_description}}</td>
                  <td class="d-flex justify-content-end">
                    <a href="{{ route('details.category',$category->id)}}" class="btn btn-success">View</a>&nbsp;
                    <a href="{{ route('edit.category',$category->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                    <a href="{{ route('delete.category',$category->id)}}" class="btn btn-danger" id="delete">Delete</a>
                  </td>

                </tr>
                @endforeach

              </tbody>
            </table>
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
