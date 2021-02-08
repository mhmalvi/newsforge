@extends('admin.layouts.app')
@push('css')
    <link href="{{asset('assets/admin/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <div class="ibox">
                    <div class="ibox-content" id="categoryForm">
                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="category" class="form-control" placeholder="Enter new category here...">
                                <cite class="tex-light" style="font-size: 8px; display: block;">*Max 255 characters</cite>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Parent Category</label>
                                <select name="category" data-placeholder="Choose a Country..." class="chosen-select"  tabindex="2">
                                    <option value disabled>Select category...</option>
                                </select>
                                <cite class="tex-light" style="font-size: 8px; display: block;">*Choose its parent category</cite>
                            </div>
                            <button type="submit" id="submit" class="btn btn-sm btn-primary" data-style="expand-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ibox ">
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="categories">
                                <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
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
    <script src="{{asset('assets/admin/js/plugins/chosen/chosen.jquery.js')}}"></script>

    <!-- Ladda -->
    <script src="{{asset('assets/admin/js/plugins/ladda/spin.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/ladda/ladda.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/ladda/ladda.jquery.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('.chosen-select').chosen({width: "100%"});

            $('#categories').DataTable({
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {
                        text: '<i class="fa fa-trash-o" aria-hidden="true"></i>',
                        action: function ( e, dt, node, config ) {
                            alert( 'Button activated' );
                        }
                    },
                    {
                        extend: 'pdf', 
                        text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>', 
                        title: 'QuadQue'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print" aria-hidden="true"></i>',
                        customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                    },
                    {extend: 'excel', title: 'QuadQue'},
                    {extend: 'csv',  title: 'QuadQue'}
                ]
            });

        });

    </script>

    <script>
        $(document).ready(function (){
            var btn = $( '#submit' ).ladda();
            
            $("#categoryForm").submit(function(event){
                event.preventDefault();

                btn.ladda('start');

                setTimeout(function(){
                    btn.ladda('stop');
                }, 2000)
            })
        });
</script>
@endpush
