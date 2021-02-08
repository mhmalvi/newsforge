@extends('admin.layouts.app')

@push('css')
    <link href="{{asset('assets/admin/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
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

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                responsive: true,
                dom: '<"html5buttons"B>Tlfgitp',
                buttons: [
                    {
                        text: 'Remove',
                        action: function ( e, dt, node, config ) {
                            alert( 'Button activated' );
                        }
                    },
                    {
                        text: 'Restore',
                        action: function ( e, dt, node, config ) {
                            alert( 'Button activated' );
                        }
                    },
                    {
                        text: 'Clear Trash',
                        action: function ( e, dt, node, config ) {
                            alert( 'Button activated' );
                        }
                    },
                ]
            });

        });

    </script>
@endpush
