<script type="text/javascript">
    $("#dob").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#update_timestamp").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#v_d").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#appt_date").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#most_recent_bp").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#a1c").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#pcp_ov").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#prev_sched").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#prev_sched_appts").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#date_of_pcp_ov").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#pneumax").datepicker({
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