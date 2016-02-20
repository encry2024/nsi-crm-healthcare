@extends('template')


@section('header')
    @include('util.header')
    <div class="ui compact menu attached">
        <a class="active item" href="{{ route('record.show', $record->id) }}">
            <i class="write icon"></i>
            Form</a>
        <a class="item" href="{{ route('callbacks', $record->id) }}">
{{--            <i class="large icons">
                <i class="phone icon"></i>
                <i class="inverted corner repeat icon"></i>
            </i>--}}
            <i class="repeat icon"></i>
            Callbacks</a>
        <a class="item" href="{{ route('history', $record->id) }}">
            <i class="book icon"></i>
            Disposition History</a>
    </div>
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
                <div class="ui {{ Session::get('msg_type') }} message">
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

                    <div class="ui secondary raised orange segment" style="width: 104.05%;">
                        <form class="" action="{{ route('record.update', $record->id) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="ui form">
                                <div class="field @if($errors->has('first_name')) error @endif">
                                    <label>Patient Name </label>
                                    <div class="ui small left icon input">
                                        <input type="text" name="fullName" value="{{ $record->fullName() }}" placeholder="First name" readonly>
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('btn')) error @endif">
                                    <label>BTN/Phone Number <i class="asterisk icon"></i> </label>
                                    <div class="ui small left icon input">
                                        <input type="text" name="btn" value="{{ $record->btn }}" placeholder="BTN/Phone Number" value="{{ Input::old('btn') }}">
                                        <i class="phone icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('reference_no')) error @endif">
                                    <label>Reference Number <i class="asterisk icon"></i> </label>
                                    <div class="ui small left icon input">
                                        <input type="text" name="reference_no" value="{{ $record->reference_no }}" placeholder="Reference Number" value="{{ Input::old('reference_no') }}">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('reference_no')) error @endif">
                                    <label>Medical Record Number <i class="asterisk icon"></i> </label>
                                    <div class="ui small left icon input">
                                        <input type="text" name="mrn" value="{{ $record->mrn }}" placeholder="Medical Record Number" readonly>
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('insurance')) error @endif">
                                    <label>Insurance <i class="asterisk icon"></i> </label>
                                    <div class="ui small left icon input">
                                        <input type="text" name="insurance" value="{{ $record->insurance }}" placeholder="Insurance">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('pcp')) error @endif">
                                    <label>PCP <i class="asterisk icon"></i> </label>
                                    <div class="ui small left icon input">
                                        <input type="text" name="pcp" value="{{ $record->pcp }}" placeholder="pcp">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('date_of_birth')) error @endif">
                                    <label>Date of Birth <i class="asterisk icon"></i> </label>
                                    <div class="ui small left icon input">
                                        <input name="date_of_birth" value="{{ date('F d, Y', strtotime($record->date_of_birth)) }}" placeholder="Date of Birth" id="dob">
                                        <i class="calendar icon"></i>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Call Disposition <i class="asterisk icon"></i> </label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="disposition">
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
                                    <div class="ui small left icon input">
                                        <textarea name="call_notes">{{ $record->call_notes }}</textarea>
                                        <i class="pencil icon"></i>
                                    </div>
                                </div>

                                <button class="ui button fluid">Update and Dispose</button>
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

                        <div class="twelve wide column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        Demographics
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form action="{{ route('submit_demographics', $record->id) }}" class="ui form" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label style="font-size: 16px;">1) Date of most recent office visit</label>
                                            <div class="ui big left icon input">
                                                <input name="q1" id="v_d">
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label for="q2" style="font-size: 16px;">2) Is PCP listed in PCT (patient care team?)</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q2" id="q2" checked="checked" value="yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q2" id="q2" value="no">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 16px;">3) SMG PCP (In Patient Care Team)</label>
                                            <div class="ui big left input">
                                                <input name="q3" id="q3">
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label for="q4" style="font-size: 16px;">4) Did patient Request to NOT be contacted?</label>
                                            <div class="ui big left input">
                                                <input name="q4" id="q4">
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label style="font-size: 16px;">5) Date of Chart review</label>
                                            <div class="ui big left icon input">
                                                <input name="q5" id="date_chart_review">
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="ui divider"></div>

                                        <div class="actions">
                                            <button class="ui button primary fluid">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="four wide column">
                            <div class="row">
                                <div class="ui vertical fluid right tabular menu" style="width: 81.5% !important;">
                                    <a class="active item">
                                        Demographics
                                    </a>
                                    <a class="item" href="{{ route('bcs', $record->id) }}">
                                        Breast Cancer Screening
                                    </a>
                                    <a class="item" href="{{ route('ccs', $record->id) }}">
                                        Colon Cancer Screening
                                    </a>
                                    <a class="item" href="{{ route('fv', $record->id) }}">
                                        Flu Vaccination
                                    </a>
                                    <a class="item" href="{{ route('pv', $record->id) }}">
                                        Pneumonia Vaccination
                                    </a>
                                    <a class="item" href="{{ route('bp', $record->id) }}">
                                        Blood pressure
                                    </a>
                                    <a class="item" href="{{ route('da1c', $record->id) }}">
                                        Diabetes: A1C
                                    </a>
                                    <a class="item" href="{{ route('dee', $record->id) }}">
                                        Diabetes: Eye Exam
                                    </a>
                                    <a class="item" href="{{ route('hrm', $record->id) }}">
                                        High Risk Meds
                                    </a>
                                    <a class="item" href="{{ route('o', $record->id) }}">
                                        Other
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="ui secondary raised orange segment">
                                    <form class="" action="{{ url('record/' . $record->id . '/checklist') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="ui form">
                                            <div class="field">
                                                <label>Other Checklist</label>
                                            </div>
                                            @foreach($record->checklist as $checklist)
                                                <div class="inline field">
                                                    <div class="ui checkbox">
                                                        <input type="checkbox" id="check-{{ $checklist->id }}" name="checklist[]" value="{{ $checklist->name }}" @if($checklist->checked != 0) checked="checked" @endif>
                                                        <label style="cursor: pointer;" for="check-{{ $checklist->id }}">{{ $checklist->description }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <button class="ui  button fluid">Update Checklist</button>
                                        </div>
                                    </form>
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

        $('.dropdown').dropdown();

        $('.message .close').on('click', function()
        {
            $(this).closest('.message').transition('fade');
        });
    </script>
@stop
