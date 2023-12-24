@extends('master_admin')


    


@section('content')

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        /* width: 714px!important; */
        /* height: 65px; */
        /* padding-bottom: 2px!important; */
        margin-top: -13px!important;
        margin-left: -17px!important;
    }
    </style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Edit Sub Category</h3>
     
      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-light">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('update.subcategory',$subcat->id)}}" method="post"> 
                @csrf 

                <div class="form-group ">
                  <label >Category Name</label>
                  <select  class="form-control "name="category_id" >
         
                    @foreach($category as $row)
                    <option value="{{ $row->id }}"> {{ $row->category_name }}  </option> 
                    @endforeach  
          
                     </select>
                    
                </div>

                <div class="form-group mb-3">
                    <label >Sub Category Name</label>
                    <input type="text" name="subcategory_name"  class="form-control" value="{{ $subcat->subcategory_name }}">
           
                    <span style="color: red;">
                        @error('subcategory_name')
                            {{$message}}
                        @enderror
                        </span>
                      
                  </div>

              
               
              
                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

            </div>
          </div>
        </div>

</div>

<script>
    $(".select2").select2();
  
  </script>
  
@endsection