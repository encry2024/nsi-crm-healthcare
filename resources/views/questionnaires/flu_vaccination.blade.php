@extends('template')


@section('header')
    @include('util.header')
@stop


@section('content')
    <div class="ui padded centered grid">
        <div class="sixteen wide column grid " >
            @include('util.messages')
            <div class="ui grid">
                <div class="four wide column">
                    @include('util.form_left_sidebar')
                </div>
                <div class="twelve wide column">
                    <div class="ui grid">
                        <div class="eleven wide column">
                            @include('util.page_title')

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_flu_vaccination', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label style="font-size: 16px;">1) What is the date of most recent flu vaccine? </label>
                                            <div class="two fields">
                                                <div class="field">
                                                    <div class="ui big left icon input">
                                                        <input name="q1" id="v_d"
                                                           @if(count($record->flu_vaccination) > 0)
                                                           value="{{ $record->flu_vaccination->q1 }}"
                                                           @else
                                                           value=""
                                                           @endif
                                                        readonly>
                                                        <i class="calendar icon"></i>
                                                    </div>
                                                </div>

                                                <div class="field">
                                                    <div class="ui big left input">
                                                        <input name="q1_a"
                                                           @if(count($record->flu_vaccination) > 0)
                                                           value="{{ $record->flu_vaccination->q1_a }}"
                                                           @else
                                                           value=""
                                                           @endif
                                                           >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q2')) error @endif">
                                                <label for="q2" style="font-size: 16px;">2) Vaccine given this season? (between August 1, 2015 and March 31, 2016?)</label>
                                                <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                    <input type="radio" name="q2" id="q2"
                                                       @if(count($record->flu_vaccination) > 0)
                                                           @if ($record->flu_vaccination->q2 == "Yes")
                                                            checked="checked"
                                                           @else
                                                           @endif
                                                       @endif
                                                    value="Yes">
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q2')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q2" id="q2"
                                                       @if(count($record->flu_vaccination) > 0)
                                                           @if ($record->flu_vaccination->q2 == "No")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                       @endif
                                                    value="No">
                                                    <label>No</label>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="ui large left input">
                                                    <input name="q2_a"
                                                           @if(count($record->flu_vaccination) > 0)
                                                           value="{{ $record->flu_vaccination->q2_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q3')) error @endif">
                                                <label for="q3" style="font-size: 16px;">3) If the date is NOT between date range, was outreach to patient made?</label>
                                                <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                    <input type="radio" name="q3" id="q3"
                                                       @if(count($record->flu_vaccination) > 0)
                                                           @if ($record->flu_vaccination->q3 == "Yes")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                       @endif
                                                    value="Yes">
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q3')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q3" id="q3"
                                                       @if(count($record->flu_vaccination) > 0)
                                                           @if ($record->flu_vaccination->q3 == "No")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                       @endif
                                                    value="No">
                                                    <label>No</label>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="ui large left input">
                                                    <input name="q3_a"
                                                           @if(count($record->flu_vaccination) > 0)
                                                           value="{{ $record->flu_vaccination->q3_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q7')) error @endif">
                                            <label for="q7" style="font-size: 14px;">4) What was the result of the outreach?</label>
                                            <div class="fields">
                                                <div class="grouped fields">
                                                    <div class="inline fields">
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q7" value="Successful"
                                                                       @if(count($record->flu_vaccination) > 0)
                                                                       @if ($record->flu_vaccination->q7 == "Successful")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>Successful</label>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q7" value="Pending"
                                                                       @if(count($record->flu_vaccination) > 0)
                                                                       @if ($record->flu_vaccination->q7 == "Pending")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>Pending</label>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q7" value="Call Back"
                                                                       @if(count($record->flu_vaccination) > 0)
                                                                       @if ($record->flu_vaccination->q7 == "Call Back")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>Call Back</label>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q7" value="Voicemail"
                                                                       @if(count($record->flu_vaccination) > 0)
                                                                       @if ($record->flu_vaccination->q7 == "Voicemail")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>Voicemail</label>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q7" value="No Action Needed"
                                                                       @if(count($record->flu_vaccination) > 0)
                                                                       @if ($record->flu_vaccination->q7 == "No Action Needed")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>No Action Needed</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="ui large left input">
                                                    <input name="q7_a" id="q7_a"
                                                           @if(count($record->flu_vaccination) > 0)
                                                           value="{{ $record->flu_vaccination->q7_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label for="q4" style="font-size: 16px;">5) If done outside SMG, did you request document from outside provider or patient?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q4" id="q4"
                                                   @if(count($record->flu_vaccination) > 0)
                                                       @if ($record->flu_vaccination->q4 == "Yes")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                   @endif
                                                value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q4" id="q4"
                                                   @if(count($record->flu_vaccination) > 0)
                                                       @if ($record->flu_vaccination->q4 == "No")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                   @endif
                                                   value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 16px;">6) Was document received and recorded in EMR?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q5" id="q5"
                                                   @if(count($record->flu_vaccination) > 0)
                                                       @if ($record->flu_vaccination->q5 == "Yes")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                   @endif
                                                value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q5" id="q5"
                                                   @if(count($record->flu_vaccination) > 0)
                                                       @if ($record->flu_vaccination->q5 == "No")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                   @endif
                                                value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <label style="font-size: 16px;">7) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                            <div class="ui large left icon input">
                                                <input type="text" name="q6"
                                                       @if(count($record->flu_vaccination) > 0)
                                                       value="{{ $record->flu_vaccination->q6 }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
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
                        </div>
                        <div class="five wide column">
                            @include('util.form_right_sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    @include('util.form_scripts')
@stop