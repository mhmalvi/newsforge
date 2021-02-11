@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9">

        </div>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h4 class="text-center text-success">Maintenance Mode</h4>
                    <p class="text-center">
                        This will put application in Maintenance mode. Turn this on, while update. Make sure users are notified!
                    </p>

                    <div style="display: flex; justify-content: center;">
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" class="onoffswitch-checkbox" id="example1" {{($maintenance->status) ? 'checked' : ''}} onchange="maintenance(this)">
                                <label class="onoffswitch-label" for="example1">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function maintenance(el){
            var status = (el.checked) ? 1 : 0;

            $.post(
                '{{ route("admin.mainTenance") }}',
                {_token:'{{ csrf_token() }}', id:el.value, status:status},
                function(response){
                    if(response.data.status == 200){
                        toastr.success(response.data.msg, 'Success');
                    }
                    else if(response.data.status == 404){
                        toastr.warning(response.data.msg, 'warning');
                    }
                    else if(response.data.status == 400 || response.data.status == 500){
                        toastr.danger(response.data.msg, 'danger');
                    }
                }
            );
        }
    </script>
@endpush
