@extends('admin.layout.admin')

@section('content')
    <div class="card">
        <h5 class="card-header">Add Product</h5>
        <div class="card-body">
            <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}" id="">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="category-dropdown" class="form-label">Category</label>
                        <select name="category_id" id="category-dropdown" class="form-control">
                            <option value="">Select One Value Only</option>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="subcategory-dropdown" class="form-label">SubCategory</label>
                        <select name="subcategory_id" id="subcategory-dropdown" class="form-control">
                            <option value="">Select SubCategory</option>
                            @foreach ($subcategories as $key => $subcategory)
                                <option value="{{ $subcategory->id }}" @if ($subcategory->id == $product->subcategory_id) selected @endif>
                                    {{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product-name" class="form-label">Product Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" id="product-name" required
                            class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product-price" class="form-label">Product Original Price</label>
                        <input type="number" value="{{ $product->original_price }}" name="original_price"
                            id="product-price" required class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sale-price" class="form-label">Product Sale Price</label>
                        <input type="number" value="{{ $product->sale_price }}" name="sale_price" id="sale-price" required
                            class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="images" class="form-label">Thumbnail</label>
                        <input type="file" name="image" id="images" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="delivery-charge" class="form-label">Product Delivery Charge</label>
                        <input type="number" name="delivery_charge" value="{{ $product->delivery_charge }}"
                            id="delivery-charge" class="form-control">
                    </div>
                    {{-- <div class="form-group col-md-6">
                        <label for="delivery-time" class="form-label">Delivery Days</label>
                        <input type="text" name="delivery_time" value="{{ $product->delivery_time }}" id="delivery-time" class="form-control">
                    </div> --}}
                    {{-- <div class="form-group col-md-6">
                        <label for="discount-price" class="form-label">Product Discount Price</label>
                        <input type="number" name="discount_price" value="{{ $product->discount_price }}" id="discount-price" class="form-control" value="0">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="discount-time" class="form-label">Discount Time</label>
                        <input type="text" name="discount_time" value="{{ $product->discount_time }}" id="discount-time" class="form-control">
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
                    <div class="form-group col-md-12">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                    </div>

                </div>
                <input type="submit" class="btn btn-primary" value="Update">
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
