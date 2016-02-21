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
                                        Callbacks
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
                                            <tr>
                                                <th colspan="3">History</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($record->callback as $callback)
                                        <tr>
                                            <td>{{ $callback->schedule->toDayDateTimeString() }}</td>
                                            <td class="right aligned"> {{ $callback->schedule->diffForHumans() }}</td>
                                            <td>{{ $callback->notes }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <button class="ui primary button" id="callback_modal">
                                        Add New Callback
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            Add Callback
        </div>
        <div class="content">
            <form class="" action="{{ url('record/'.$record->id.'/callbacks') }}" method="POST" id="callback_form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="ui form">
                    <div class="fields">
                        <div class="eight wide field @if($errors->has('callback_date')) error @endif">
                            <label>Callback Date <i class="asterisk icon"></i> </label>
                            <div class="ui big left icon input">
                                <input name="callback_date" value="" placeholder="Callback Date" id="callback_date">
                                <i class="calendar icon"></i>
                            </div>
                        </div>
                        <div class="eight wide field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Hour <i class="asterisk icon"></i> </label>
                                    <select class="ui fluid dropdown" name="callback_hour">
                                        @for($i=0;$i<=23;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Minutes <i class="asterisk icon"></i> </label>
                                    <select class="ui fluid dropdown" name="callback_minute">
                                    @for($i=0;$i<=59;$i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field @if($errors->has('notes')) error @endif">
                        <label>Call Note <i class="asterisk icon"></i> </label>
                        <div class="ui big left icon input">
                            <textarea name="notes"></textarea>
                            <i class="pencil icon"></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="actions">
            <div class="ui cancel button">Cancel</div>
            <button class="ui ok primary button" id="submit_callback">Submit</button>
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
            autoclose: true,
            startDate: moment().format()
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
