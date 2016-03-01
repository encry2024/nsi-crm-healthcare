<script type="text/javascript">
    $("#dob").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#update_timestamp").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#v_d").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#appt_date").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true
    });

    $("#most_recent_bp").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#a1c").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#pcp_ov").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#prev_sched").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#prev_sched_appts").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#date_of_pcp_ov").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#pneumax").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $("#date_chart_review").datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        clearBtn: true
    });

    $('.dropdown').dropdown();

    $('.message .close').on('click', function()
    {
        $(this).closest('.message').transition('fade');
    });
</script>