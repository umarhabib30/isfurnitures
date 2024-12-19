@extends('admin.layout.app')

@section('content')
    <div class="single-product-tab-area mg-b-30">
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description">Store SubCategory</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <form action="{{ route('subcategory.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">

                                            <input name="id" type="hidden" value="{{ $SubCategory->id }}">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="text" value="{{ $SubCategory->name }}"
                                                            name="name" required class="form-control"
                                                            placeholder="Enter SubCategory Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
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
