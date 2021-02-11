@extends('admin.layouts.app')
@push('css')
    <link href="{{asset('assets/admin/css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row py-3">
                    {{--  --}}
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Post News Here</h4>
                            </div>
        
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="title" id="" class="form-control" placeholder="Title..."/>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <textarea name="details" id="details"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    {{--  --}}
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <select name="category" id="category">
                                            <option value disabled>Choose a category</option>
                                            <option value selected>uncategorized</option>
                                            @forelse ($categories as $item)
                                                <option value="{{$item->id}}">{{$item->category}}</option>
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <select name="subcategory" id="subcategory" data-placeholder="choose a category first..."></select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="tags[]" class="form-control" id="tags" placeholder="type your tags here..." style="display: block!important;"/>
                                    </div>
                                </div>
                                <div class="pb-2 d-flex justify-content-center">
                                    <img src="{{asset('assets/admin/placeholder-image.png')}}" alt="" class="img-thumbnail"  id="image-preview" />
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                        <cite class="tex-light" style="font-size: 8px; display: block;">*max-upload-size: 2mb</cite>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary pl-2">
                                            <input id="checkbox2" type="checkbox" name="published" checked="">
                                            <label for="checkbox2">
                                                Publish
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    {{-- Chosen --}}
    <script src="{{asset('assets/admin/js/plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('assets/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/tinymce/custom.js')}}"></script>
    @include('admin.news.script')
@endpush
