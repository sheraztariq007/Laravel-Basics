<script>
    window.addEventListener('load',function(e){
        $("#published_at").datetimepicker({
            allowInputToggle: true,
            format: "YYYY-MM-DD HH:mm:ss",
            showClear: true,
            defaultDate: "{{$model->published_at}}"
        });
    });

</script>

