@extends('master_admin')
@section('content')
      <h3 class="page-title"> List Slider</h3>
      {{-- <nav aria-label="breadcrumb">
        <a href="{{ route('add.slider.site')}}" class="btn btn-primary">Add Category</a>
      </nav> --}}
    </div>
    <div class="row m-2">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card bg-light">
          <div class="card-body">
            <div class="table-responsive">
							<table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th class="wd-15p">Silder Image</th>
                  <th>Marquee Text Slider</th>
                  <th>Meta Tag</th>
                  <th>Meta Description</th>
                  <th class="d-flex justify-content-end">Action</th>
        
                </tr>
              </thead>
              <tbody>

                @foreach($homesitesliders as $key => $row)
                <tr>
                  <td>{{ $key+1}}</td>
                  <td> <img src="{{ URL::to($row->slider_img) }}" height="50px;" width="50px;"> </td>
                  <td>{{ $row->marquee }}</td>
                  <td>{{ $row->meta_tag }}</td>
                  <td>{{ $row->meta_description }}</td>
                  <td class="d-flex justify-content-end">

                    {{-- <a href="{{ route('details.slider',$row->id)}}" class="btn btn-success">View</a>&nbsp; --}}
                    <a href="{{ route('edit.slider.site',$row->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                    {{-- <a href="{{ route('delete.slider.site',$row->id)}}" class="btn btn-danger" id="delete">Delete</a> --}}

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