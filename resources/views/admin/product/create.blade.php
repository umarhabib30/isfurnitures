@extends('admin.layout.app')

@section('content')
    <div class="single-product-tab-area mg-b-30">
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description">Store Product</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <form action="{{ route('admin.productstore') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row " style="margin-bottom: 10px">
                                            <!-- Category Dropdown -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="category-dropdown" class="lable">Category</label>
                                                <select name="category_id" id="category-dropdown"
                                                    class="form-control pro-edt-select form-control-primary">
                                                    <option value="">Select One Value Only</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- SubCategory Dropdown -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="subcategory-dropdown" class="lable">SubCategory</label>
                                                <select name="subcategory_id" id="subcategory-dropdown"
                                                    class="form-control pro-edt-select form-control-primary">
                                                    <option value="">Select SubCategory</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <!-- Product Name -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="product-name" class="lable">Product Name</label>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="text" name="name" id="product-name" required
                                                            class="form-control" placeholder="Enter Product Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Original Price -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="product-price" class="lable">Product Original Price</label>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="number" name="original_price" id="product-price"
                                                            required class="form-control" placeholder="Enter Product Price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Product Name -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="product-name" class="lable">Product Sale Price</label>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="number" name="sale_price" id="product-name" required
                                                            class="form-control" placeholder="Enter Product Sale Price">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <!-- Product delivery fee -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="product-name" class="lable">Product Delivery Charge</label>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="number" name="delivery_charge" id="product-name"
                                                             class="form-control" value="0" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Delivery  time-->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="product-price" class="lable">Delivery Time</label>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="text" name="delivery_time" id="product-price"
                                                             class="form-control" placeholder="Enter Delivery Time">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Product delivery fee -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="product-name" class="lable">Product Discount Price </label>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="number" name="discount_price" id="product-name"
                                                             class="form-control" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Delivery  time-->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="product-price" class="lable">Discount Time</label>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="text" name="discount_time" id="product-price"
                                                             class="form-control"
                                                            placeholder="Enter Number of Days">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <!-- Product Description -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="product-name" class="lable">Product Description</label>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea type="text" name="description" id="product-name"  class="form-control"
                                                            placeholder="Enter product description"></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit"
                                                        class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category-dropdown').change(function() {
                var categoryId = $(this).val();
                var subcategoryDropdown = $('#subcategory-dropdown');

                subcategoryDropdown.html('<option value="">Select SubCategory</option>');

                if (categoryId) {
                    $.ajax({
                        url: "{{ route('get.subcategories', '') }}/" + categoryId,
                        type: "GET",
                        success: function(data) {
                            if (data.length > 0) {
                                data.forEach(function(subcategory) {
                                    subcategoryDropdown.append('<option value="' +
                                        subcategory.id + '">' + subcategory.name +
                                        '</option>');
                                });
                            }
                        },
                        error: function() {
                            alert('Unable to fetch subcategories. Please try again.');
                        }
                    });
                }
            });
        });
    </script>
@endsection

@section('css')
    <style>
        .lable {
            color: white
        }
    </style>
@endsection
