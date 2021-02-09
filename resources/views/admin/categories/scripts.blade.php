<script>
    $(document).ready(function(){
        var category = $("#category_id").select2({
            placeholder: "Select a parent category",
            allowClear: true,
            minimumResultsForSearch: Infinity,

            ajax: {
                url: 'categories/all',
                dataType: 'json',
                type: "GET",
                processResults: function (res) {
                    var response = res.data;
                    var options = [];

                    response.map((item) => {
                        options.push({
                            'id': item.id,
                            'text': item.category
                        })
                    })

                    return {
                        results: options
                    };
                }
            }
        });

        var btn = $( '#submit' ).ladda();

        /*
        * Datatable
        */
        var table = $('#categories').DataTable({
            responsive: true,
            processing: true,
            serverSide: false,
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
            ],
            ajax: {
                url: 'categories/all',
                dataSrc: 'data'
                },
            columns: [
                { data: null, defaultContent: '' },
                { data: "category" },
                { data: "created_at"},
            ],
            columnDefs: [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function (data, type, full, meta){
                    return '<input type="checkbox" class="checkBox" name="id[]" value="' + $('<div/>').text(data.id).html() + '">';
                }
            }],
        });

        /*
        * Store New Category
        */
        $("#categoryForm").submit(function(e){
            e.preventDefault();
            btn.ladda('start');
            
            $.ajax({
                url: 'categories/store',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'JSON',
                success: function(res){
                    if(res.data.status == 200){
                        $('#categoryForm').trigger('reset');
                        table.ajax.reload();
                        var option = new Option(res.data.resp.name, res.data.resp.id, false, false);
                        category.append(option).trigger('change');
                        btn.ladda('stop');
                    }
                }
            })
        });


        /*
        * Check - Uncheck
        */
        $('#select-all').on('click', function(){
            // Get all rows with search applied
            var rows = table.rows({ 'search': 'applied' }).nodes();

            // Check/uncheck checkboxes for all rows in the table
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });
    });

</script>