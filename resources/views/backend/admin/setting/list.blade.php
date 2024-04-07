@extends('master_admin')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')

<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> List Setting</h3>



      <nav aria-label="breadcrumb">
        {{-- <a href="{{ route('add.category')}}" class="btn btn-primary">Add Category</a> --}}
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
                  <th class="d-flex justify-content-end">Action</th>
                  <th>Home Page Active</th>
                  <th class="wd-15p">Logo</th>
                  <th>Shopname</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Message</th>
                  <th style="width:10%">Facebook</th>
                  <th>Twitter</th>
                  <th>Youtube</th>
                  <th>Linkedin</th>
                  <th>instagram</th>
                  <th>Google Maps</th>
                  {{-- <th>Computer laptop and gameing pc </th>
                  <th>Laptop</th>
                  <th>Desktop</th>
                  <th>EMI Page </th>
                  <th>Privacy Policy</th>
                  <th>Contact Us </th>
                  <th>About Us</th>
                  <th>Terms and condition</th>
                  <th>Online Delivery</th>
                  <th>Refund and return Policy</th> --}}
                  <th>Shipping Charge</th>
                </tr>
              </thead>
              <tbody>

                @foreach($setting as $key => $row)
                <tr>
                  <td>{{ $key+1}}</td>
                  <td class="d-flex justify-content-end">
                    {{-- <a href="" class="btn btn-success">View</a>&nbsp; --}}
                    <a href="{{ route('edit.setting',$row->id)}}" class="btn btn-primary shihab">Update</a>&nbsp;
                    {{-- <a href="" class="btn btn-danger" id="delete">Delete</a> --}}
                  </td>
                  <td>
                    @if($row->homepage_active =1)
                  Page One 
                  @else
                  Page Two
                  @endif
                  </td>
                  


                  <td> <img src="{{ URL::to($row->logo) }}" height="50px;" width="50px;"> </td>
                  <td>{{ $row->shopname }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>{{ $row->address}}</td>
                  <td>{{ $row->message}}</td>
                  <td style="width:10%">{{ $row->facebook}}</td>
                  <td>{{ $row->twitter}}</td>
                  <td>{{ $row->youtube}}</td>
                  <td>{{ $row->linkedIn}}</td>
                  <td>{{ $row->instagram}}</td>
                  <td>{{ $row->google_maps }}</td>
                  {{-- <td>{!!$row->computer_laptop_gameingPc!!}</td>
                  <td>{!!$row->Best_laptop!!}</td>
                  <td>{!!$row->Best_desktop!!}</td>
                  <td>{!!$row->emipage!!}</td>
                  <td>{!!$row->policypage!!}</td>
                  <td>{!!$row->contactpage!!}</td>
                  <td>{!!$row->aboutpage!!}</td>
                  <td>{!!$row->conditionpage!!}</td>
                  <td>{!!$row->delivery!!}</td>
                  <td>{!!$row->refundpage!!}</td> --}}
                  <td>{{$row->shipping_charge}}</td>
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


    <script>

      $('#datatable').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'csv', 'excel', 'pdf' , 'print'
          ],
          columns: [
        { "data": "column1" },
        { "data": "column2" },
        { "data": "column3" },
        { "data": "column4" },
      } );
    
      </script>


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
