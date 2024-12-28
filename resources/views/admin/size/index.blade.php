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
                        Sizes
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Size</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $index => $size)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $size->name }}</td>
                                        <td>
                                            <form action="{{ route('size.delete') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <input type="hidden" value="{{ $size->id }}" name="id">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('size.edit') }}" method="POST" style="display:inline;">
                                                @csrf
                                                <input type="hidden" value="{{ $size->id }}" name="id">
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
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
