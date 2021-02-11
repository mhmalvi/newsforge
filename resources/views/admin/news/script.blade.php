<script>
    $(document).ready(function(){
        function imagePreview(input){
            if(input.files && input.files[0]){
                var reader =  new FileReader();

                reader.onload = function(e){
                    $("#image-preview").attr('src', e.target.result).hide().fadeIn('slow');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#image').change(function(){
            imagePreview(this);
        })

        $('#category').chosen({width: "100%"});
        $('#subcategory').chosen({width: "100%"});

        $('#tags').tagsinput();
        
    })
</script>