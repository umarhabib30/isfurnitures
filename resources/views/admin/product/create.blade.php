@extends('admin.layout.admin')

@section('content')
    <div class="card">
        <h5 class="card-header">Add Product</h5>
        <div class="card-body">
            <form action="{{ route('admin.productstore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="category-dropdown" class="form-label">Category</label>
                        <select name="category_id" id="category-dropdown" class="form-control">
                            <option value="">Select One Value Only</option>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="subcategory-dropdown" class="form-label">SubCategory</label>
                        <select name="subcategory_id" id="subcategory-dropdown" class="form-control">
                            <option value="">Select SubCategory</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product-name" class="form-label">Product Name</label>
                        <input type="text" name="name" id="product-name" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product-price" class="form-label">Product Original Price</label>
                        <input type="number" name="original_price" id="product-price" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sale-price" class="form-label">Product Sale Price</label>
                        <input type="number" name="sale_price" id="sale-price" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="images" class="form-label">Thumbnail</label>
                        <input type="file" name="image" id="images" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="delivery-charge" class="form-label">Product Delivery Charge</label>
                        <input type="number" name="delivery_charge" id="delivery-charge" class="form-control"
                            value="0">
                    </div>
                    {{-- <div class="form-group col-md-6">
                    <label for="delivery-time" class="form-label">Delivery Days</label>
                    <input type="text" name="delivery_time" id="delivery-time" class="form-control" >
                </div> --}}
                    {{-- <div class="form-group col-md-6">
                    <label for="discount-price" class="form-label">Product Discount Price</label>
                    <input type="number" name="discount_price" id="discount-price" class="form-control" value="0">
                </div> --}}
                    {{-- <div class="form-group col-md-6">
                    <label for="discount-time" class="form-label">Discount Time</label>
                    <input type="text" name="discount_time" id="discount-time" class="form-control" >
                </div> --}}
                    <div class="form-group col-md-6">
                        <label for="images" class="form-label">Images</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category-dropdown" class="form-label">Color</label>
                        <select name="color_id" id="category-dropdown" class="form-control">
                            <option value="">Select One Value Only</option>
                            @foreach ($colors as $key => $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category-dropdown" class="form-label">Stuff</label>
                        <select name="stuff_id" id="category-dropdown" class="form-control">
                            <option value="">Select One Value Only</option>
                            @foreach ($stuffs as $key => $stuff)
                                <option value="{{ $stuff->id }}">{{ $stuff->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category-dropdown" class="form-label">Seat Number</label>
                        <select name="seatnumber_id" id="category-dropdown" class="form-control">
                            <option value="">Select One Value Only</option>
                            @foreach ($seatNumbers as $key => $seatNumbers)
                                <option value="{{ $seatNumbers->id }}">{{ $seatNumbers->seat_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category-dropdown" class="form-label">Size</label>
                        <select name="size_id" id="category-dropdown" class="form-control">
                            <option value="">Select One Value Only</option>
                            @foreach ($sizes as $key => $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sold_qty" class="form-label">Sold Qty</label>
                        <input type="number" name="sold_qty" id="sold_qty" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>

                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection


@section('script')
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

@section('style')
    <style>
        .lable {
            color: white
        }
    </style>
@endsection
