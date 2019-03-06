<script>
    $(document).ready(function() {

        console.log("Hello");

        $.ajax({
            type: 'POST',
            url: 'api-users',
            dataType: 'json',
            success: function(data) {
                console.log(data);
            }
        });

    });
</script>