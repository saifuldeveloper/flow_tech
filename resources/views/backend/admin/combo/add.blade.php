@extends('master_admin')
@section('title', 'Flow Tech BD | Add Combo Product')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')


    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Add Product</h3>

        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('add.combo') }}" method="post">
                            @csrf

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Product</label>
                                        <select class="form-select main_product_id" name="main_product_id" required>
                                            <option value="">----Select Your Product----</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" data-image="{{ $product->image_one }}">
                                                    {{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('main_product_id')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-10 mt-3">
                                    <div class="form-group">
                                        <label> Combo Product</label>
                                        <select class="form-select sub_product_id" name="sub_product_id[]"
                                            multiple="multiple" required>

                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" data-image="{{ $product->image_one }}">

                                                    {{ Str::limit($product->product_name, 30) }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @error('sub_product_id')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <button id="submit" type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a class="btn btn-light" href="">Cancel</a>
                                </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".sub_product_id").select2({
            placeholder: "Select Your Combo Product",
            allowClear: true,
            templateResult: productImageShow,
            templateSelection: productImageShow
        });

        $(".main_product_id").select2({
            placeholder: "----Select Your Product----",
            allowClear: true,
            templateResult: productImageShow,
            templateSelection: productImageShow
        });

        function productImageShow(product) {
            if (!product.id) {
                return product.text;
            }
            var baseUrl = "{{ asset('/') }}";
            var $product = $(
                '<span><img src="' + baseUrl + $(product.element).data('image') +
                '" style="width:30px;height:30px;" /> ' + product.text + '</span>'
            );
            return $product;
        }

        $('.sub_product_id').on('change', function() {
            let sub_product_id = $(this).val();
            let main_product_id = $('.main_product_id').val();


            if (main_product_id == sub_product_id) {
                $("#submit").attr("disabled", true);
            } else {
                $("#submit").attr("disabled", false);
            }
        });
    </script>
@endpush
