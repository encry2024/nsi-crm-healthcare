@extends('template')


@section('header')
    @include('util.header')
@stop


@section('content')
    <div class="ui padded grid">

        <div class="sixteen wide column grid " >

            @if (count($errors) > 0)
                <div class="ui negative message">
                    <i class="close icon"></i>
                    <div class="header">
                        User was not able to save because of the following reason(s):
                    </div>
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('message'))
                <div class="ui success message">
                    <i class="close icon"></i>
                    <div class="ui header">
                        <i class="check circle icon"></i>
                        <div class="content">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="ui grid">
                <div class="four wide column">
                    <div class="ui raised segment">
                        <form class="" action="{{ route('record.update', $record->id) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="ui form">
                                <div class="field @if($errors->has('btn')) error @endif">
                                    <label>First name <i class="asterisk icon"></i> </label>
                                    <div class="ui big left icon input">
                                        <input type="text" name="first_name" value="{{ $record->first_name }}" placeholder="First name" value="{{ Input::old('first_name') }}">
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('btn')) error @endif">
                                    <label>Last name <i class="asterisk icon"></i> </label>
                                    <div class="ui big left icon input">
                                        <input type="text" name="last_name" value="{{ $record->last_name }}" placeholder="Last name" value="{{ Input::old('last_name') }}">
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('btn')) error @endif">
                                    <label>BTN/Phone Number <i class="asterisk icon"></i> </label>
                                    <div class="ui big left icon input">
                                        <input type="text" name="btn" value="{{ $record->btn }}" placeholder="BTN/Phone Number" value="{{ Input::old('btn') }}">
                                        <i class="phone icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('reference_no')) error @endif">
                                    <label>Reference Number <i class="asterisk icon"></i> </label>
                                    <div class="ui big left icon input">
                                        <input type="text" name="reference_no" value="{{ $record->reference_no }}" placeholder="Reference Number" value="{{ Input::old('reference_no') }}">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('date_of_birth')) error @endif">
                                    <label>Date of Birth <i class="asterisk icon"></i> </label>
                                    <div class="ui big left icon input">
                                        <input name="date_of_birth" value="{{ date('F d, Y', strtotime($record->date_of_birth)) }}" placeholder="Date of Birth" id="dob">
                                        <i class="calendar icon"></i>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Call Disposition <i class="asterisk icon"></i> </label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="gender">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Call Disposition</div>
                                        <div class="menu">
                                            @foreach ($dispositions as $disposition)
                                                <div class="item" data-value="{{ $disposition->id }}">{{ $disposition->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('call_notes')) error @endif">
                                    <label>Call Note <i class="asterisk icon"></i> </label>
                                    <div class="ui big left icon input">
                                        <textarea name="call_notes">{{ $record->call_notes }}</textarea>
                                        <i class="pencil icon"></i>
                                    </div>
                                </div>

                                <button class="ui button fluid">Update</button>
                            </div>

                        </form>
                    </div>
                </div>

                {{--
                Tab 1 - Demographics
                Tab 2 - Breast Cancer Screening
                Tab 3 - Colon Cancer Screening
                Tab 4 - Flu Vaccination
                Tab 5 - Pneumonia Vaccination
                Tab 6 - Blood pressure
                Tab 7 - Diabetes: A1C
                Tab 8 - Diabetes: Eye exam
                Tab 9 - High Risk Meds
                Tab 10 Other
                --}}

                <div class="twelve wide column">
                    <div class="ui grid">

                        <div class="twelve wide stretched column">
                            <div class="ui basic segment">
                                <form action="" class="ui form">
                                    <div class="field @if($errors->has('q1')) error @endif">
                                        <label style="font-size: 16px;">1) Date of most Recent Mammogram Date</label>
                                        <div class="ui big left icon input">
                                            <input name="q1" id="v_d">
                                            <i class="calendar icon"></i>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q2')) error @endif">
                                        <label for="q2" style="font-size: 16px;">2) Screening up to date?</label>
                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                            <input type="radio" name="q2" id="q2" checked="checked">
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q2')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q2" id="q2">
                                            <label>No</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q3')) error @endif">
                                        <label for="q3" style="font-size: 16px;">3) If not up to date, was outreach to patient made?</label>
                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                            <input type="radio" name="q3" id="q3" checked="checked">
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q3')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q3" id="q3">
                                            <label>No</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q4')) error @endif">
                                        <label for="q4" style="font-size: 16px;">3) Action</label>
                                        <div class="ui big left input">
                                            <input name="q4" id="q4">
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q5')) error @endif">
                                        <label for="q5" style="font-size: 16px;">4) Enter appt date if mammo or office appt made</label>
                                        <div class="ui big left input">
                                            <input name="q5" id="appt_date">
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q6')) error @endif">
                                        <label for="q6" style="font-size: 16px;">2) Was document received and recorded in EMR?</label>
                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                            <input type="radio" name="q6" id="q6" checked="checked">
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q6')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q6" id="q6">
                                            <label>No</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q7')) error @endif">
                                        <label>Closed loop: appt kept or task acted on/closed by office?</label>
                                        <div class="ui big left icon input">
                                            <input type="text" name="q7" >
                                            <i class="info icon"></i>
                                        </div>
                                    </div>

                                    <div class="ui divider"></div>

                                    <div class="actions">
                                        <button class="ui button primary fluid">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="four wide column">
                            <div class="ui vertical fluid right tabular menu" style="width: 81.5% !important;">
                                <a class="active item">
                                    Demographics
                                </a>
                                <a class="item">
                                    Breast Cancer Screening
                                </a>
                                <a class="item">
                                    Colon Cancer Screening
                                </a>
                                <a class="item">
                                    Flu Vaccination
                                </a>
                                <a class="item">
                                    Pneumonia Vaccination
                                </a>
                                <a class="item">
                                    Blood pressure
                                </a>
                                <a class="item">
                                    Diabetes: A1C
                                </a>
                                <a class="item">
                                    Diabetes: Eye Exam
                                </a>
                                <a class="item">
                                    High Risk Meds
                                </a>
                                <a class="item">
                                    Other
                                </a>
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

        $("#appt_date").datepicker({
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
@stop