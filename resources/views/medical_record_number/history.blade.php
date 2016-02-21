@extends('template')


@section('header')
    @include('util.header')
@stop


@section('content')
    <div class="ui padded grid">
        <div class="sixteen wide column grid " >
            @include('util.messages')
            <div class="ui grid">
                <div class="four wide column">
                    @include('util.form_left_sidebar')
                </div>

                <div class="twelve wide column">
                    <div class="ui grid">

                        <div class="twelve wide stretched column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        Disposition History
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <table class="ui celled striped table">
                                        <thead>
                                        <tr><th colspan="3">
                                                Disposition History
                                            </th>
                                        </tr></thead>
                                        <tbody>
                                        @foreach($record->history as $history)
                                        <tr>
                                            <td>{{ $history->disposition->name }}</td>
                                            <td>{{ $history->created_at->toDayDateTimeString() }}</td>
                                            <td class="right aligned"> {{ $history->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
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

        $("#callback_date").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $('.dropdown').dropdown();

        $('.message .close').on('click', function()
        {
            $(this).closest('.message').transition('fade');
        });

        $('#callback_modal').click(function(){
            $('.ui.modal').modal('show');
        });

        $('#submit_callback').click(function(){
            $('#callback_form').submit();
        });
    </script>
@stop
