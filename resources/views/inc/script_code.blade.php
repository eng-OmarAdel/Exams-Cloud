<script type="text/javascript">
    $(document).ready(function () {
        $("#series").chained("#mark");
        
    });
</script>
<script type="text/javascript">
    $('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9 ضصثقفغعهخحجدشسيبلاتنمكطئءؤرﻻىةوزظذﻵآ؟?أﻷ @._, #$&]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});

</script>