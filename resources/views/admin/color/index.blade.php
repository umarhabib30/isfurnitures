@extends('admin.layout.admin')

@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- data table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        Colors
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $index => $color)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>
                                        <form action="{{ route('color.delete') }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" value="{{$color->id}}" name="id">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="{{ route('color.edit') }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" value="{{$color->id}}" name="id">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end data table  -->
        <!-- ============================================================== -->
    </div>
@endsection
