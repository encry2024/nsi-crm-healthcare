<script type="text/javascript">
    $("#dob").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#v_d").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#date_chart_review").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $('.dropdown').dropdown();

    $('.message .close').on('click', function()
    {
        $(this).closest('.message').transition('fade');
    });
</script>