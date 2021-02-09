@extends('admin.layouts.app')
@push('css')
    <link href="{{asset('assets/admin/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-md-2">
                <div class="ibox">
                    <div class="ibox-content">
                        <form method="post" id="categoryForm">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="category" id="category" class="form-control" placeholder="Enter new category here...">
                                <cite class="tex-light" style="font-size: 8px; display: block;">*Max 255 characters</cite>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Parent Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option></option>
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <cite class="tex-light" style="font-size: 8px; display: block;">*Choose its parent category</cite>
                            </div>
                            <button type="submit" id="submit" class="btn btn-sm btn-primary" data-style="expand-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ibox ">
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="categories">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" value="1" id="select-all"></th>
                                        <th>Categories</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/admin/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/ladda/spin.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/ladda/ladda.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/ladda/ladda.jquery.min.js')}}"></script>
    @include('admin.categories.scripts')
@endpush
