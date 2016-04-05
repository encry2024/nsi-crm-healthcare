@extends('template')


@section('header')
    @include('util.header')
@stop

@if($record->user_id == Auth::user()->id)
    @section('content')
        <div class="ui padded grid">
            @include('util.messages')
            <div class="ui doubling stackable three column row" >
                <div class="four wide column">
                    @include('util.form_left_sidebar')
                </div>
                <div class="nine wide column">
                    @include('util.page_title')

                    <div class="row">
                        <div class="ui divider"></div>
                    </div>

                    <div class="row">
                        <div class="ui basic segment">
                            <form method="POST" action="{{ route('submit_pneuomia_vaccination', $record->id) }}" class="ui form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="field @if($errors->has('q1')) error @endif">
                                    <label style="font-size: 15px;">1) What is the date of most recent pneumovax for patients 65 or older (N/A if pt < 65) </label>
                                    <div class="two fields">
                                        <div class="field">
                                            <div class="ui big left icon input">
                                                <input name="q1" id="v_d"
                                                   @if(count($record->pneumonia_vaccination) > 0)
                                                   value="{{ $record->pneumonia_vaccination->q1 }}"
                                                   @else
                                                   value=""
                                                   @endif
                                                >
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="ui big left input">
                                                <input name="q1_a"
                                                   @if(count($record->pneumonia_vaccination) > 0)
                                                   value="{{ $record->pneumonia_vaccination->q1_a }}"
                                                   @else
                                                   value=""
                                                   @endif
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="two fields">
                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label for="q4" style="font-size: 15px;">2) Is the patient >65 years old and was a pneumovax given</label>
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q4" id="q4"
                                                   @if(count($record->pneumonia_vaccination) > 0)
                                                       @if ($record->pneumonia_vaccination->q4 == "Yes")
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
                                                   @if(count($record->pneumonia_vaccination) > 0)
                                                       @if ($record->pneumonia_vaccination->q4 == "No")
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
                                                <input name="q4_a" id="q4_a"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       value="{{ $record->pneumonia_vaccination->q4_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 15px;">3) If the date is NOT between date range, was outreach to patient made?</label>
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q5" id="q5"
                                                   @if(count($record->pneumonia_vaccination) > 0)
                                                       @if ($record->pneumonia_vaccination->q5 == "Yes")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                   @endif
                                                value="Yes">
                                                <label>Yes</label>
                                            </div>

                                            <div class="field @if($errors->has('q5')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q5" id="q5"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                           @if ($record->pneumonia_vaccination->q5 == "No")
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
                                                    <input name="q5_a" id="q5_a"
                                                           @if(count($record->pneumonia_vaccination) > 0)
                                                           value="{{ $record->pneumonia_vaccination->q5_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q8')) error @endif">
                                    <label for="q8" style="font-size: 15px;">4) What was the result of the outreach?</label>
                                    <div class="ui selection dropdown outreach">
                                        <input type="hidden" name="q8">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Outreach result</div>
                                        <div class="menu">
                                            <div class="item" data-value="Patient Transferred">Patient Transferred</div>
                                            <div class="item" data-value="Scheduled Appointment">Scheduled Appointment</div>
                                            <div class="item" data-value="Patient Refused">Patient Refused</div>
                                            <div class="item" data-value="NPC">NPC</div>
                                            <div class="item" data-value="Pending">Pending</div>
                                            <div class="item" data-value="Call back">Call back</div>
                                            <div class="item" data-value="Voicemail">Voicemail</div>
                                            <div class="item" data-value="No answer">No answer</div>
                                            <div class="item" data-value="Disconnected Number">Disconnected Number</div>
                                            <div class="item" data-value="Do Not Call">Do Not Call</div>
                                            <div class="item" data-value="Privacy Manager">Privacy Manager</div>
                                            <div class="item" data-value="Deceased">Deceased</div>
                                            <div class="item" data-value="Different PCP">Different PCP</div>
                                            <div class="item" data-value="Up-to-date">Up-to-date</div>
                                            <div class="item" data-value="Done Outside SMG">Done Outside SMG</div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q8_a" id="q8_a"
                                                   @if(count($record->pneumonia_vaccination) > 0)
                                                   value="{{ $record->pneumonia_vaccination->q8_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q9')) error @endif">
                                    <label for="q9" style="font-size: 15px;">5) If done outside SMG, did you request document from outside provider or patient?</label>
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q9" id="q9"
                                               @if(count($record->pneumonia_vaccination) > 0)
                                               @if ($record->pneumonia_vaccination->q9 == "Yes")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif
                                               value="Yes">
                                        <label>Yes</label>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q9')) error @endif">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q9" id="q9"
                                               @if(count($record->pneumonia_vaccination) > 0)
                                               @if ($record->pneumonia_vaccination->q9 == "No")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif
                                               value="No">
                                        <label>No</label>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q6')) error @endif">
                                    <label for="q6" style="font-size: 15px;">6) Was document received and recorded in EMR?</label>
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q6" id="q6"
                                           @if(count($record->pneumonia_vaccination) > 0)
                                               @if ($record->pneumonia_vaccination->q6 == "Yes")
                                               checked="checked"
                                               @else
                                               @endif
                                           @endif
                                        value="Yes">
                                        <label>Yes</label>
                                    </div>
                                </div>
                                <div class="field @if($errors->has('q6')) error @endif">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q6" id="q6"
                                           @if(count($record->pneumonia_vaccination) > 0)
                                               @if ($record->pneumonia_vaccination->q6 == "No")
                                               checked="checked"
                                               @else
                                               @endif
                                           @endif
                                        value="No">
                                        <label>No</label>
                                    </div>
                                </div>


                                <div class="field @if($errors->has('q7')) error @endif">
                                    <label style="font-size: 15px;">7) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                    <div class="ui large left icon input">
                                        <input type="text" name="q7"
                                               @if(count($record->pneumonia_vaccination) > 0)
                                               value="{{ $record->pneumonia_vaccination->q7 }}"
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
                <div class="three wide column">
                    @include('util.form_right_sidebar')
                </div>
            </div>
        </div>
    @stop
@else
    @section('content')
        <div class="ui padded grid">
            <div class="ui doubling stackable three column row">
                @include('util.messages')
                <div class="four wide column">
                    @include('util.form_left_sidebar')
                </div>
                <div class="nine wide column">
                    @include('util.page_title')

                    <div class="row">
                        <div class="ui divider"></div>
                    </div>

                    <div class="row">
                        <div class="ui basic segment">
                            <form method="POST" action="{{ route('submit_pneuomia_vaccination', $record->id) }}" class="ui form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="disabled field @if($errors->has('q1')) error @endif">
                                    <label style="font-size: 15px;">1) What is the date of most recent pneumovax for patients 65 or older (N/A if pt < 65) </label>
                                    <div class="two fields">
                                        <div class="field">
                                            <div class="ui big left icon input">
                                                <input name="q1" id="v_d"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       value="{{ $record->pneumonia_vaccination->q1 }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="ui big left input">
                                                <input name="q1_a"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       value="{{ $record->pneumonia_vaccination->q1_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="two disabled fields">
                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label for="q2" style="font-size: 15px;">2) Pneumonia Vaccine Status: UTD, appt date, refused</label>
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q2" id="q2"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       @if ($record->pneumonia_vaccination->q2 == "Yes")
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
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       @if ($record->pneumonia_vaccination->q2 == "No")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                       @endif
                                                       value="No">
                                                <label>No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q3')) error @endif">
                                        <label style="font-size: 15px;">3) Date of most recent pneumovax for patients 65 or older (N/A if pt < 65)</label>
                                        <div class="ui big left icon input">
                                            <input name="q3" id="pneumax"
                                                   @if(count($record->pneumonia_vaccination) > 0)
                                                   value="{{ $record->pneumonia_vaccination->q3 }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                            <i class="calendar icon"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="two disabled fields">
                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label for="q4" style="font-size: 15px;">4) Is the patient >65 years old and was a pneumovax given</label>
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q4" id="q4"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       @if ($record->pneumonia_vaccination->q4 == "Yes")
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
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       @if ($record->pneumonia_vaccination->q4 == "No")
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
                                                <input name="q4_a" id="q4_a"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       value="{{ $record->pneumonia_vaccination->q4_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 15px;">5) If the date is NOT between date range, was outreach to patient made?</label>
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q5" id="q5"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       @if ($record->pneumonia_vaccination->q5 == "Yes")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                       @endif
                                                       value="Yes">
                                                <label>Yes</label>
                                            </div>

                                            <div class="field @if($errors->has('q5')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q5" id="q5"
                                                           @if(count($record->pneumonia_vaccination) > 0)
                                                           @if ($record->pneumonia_vaccination->q5 == "No")
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
                                                    <input name="q5_a" id="q5_a"
                                                           @if(count($record->pneumonia_vaccination) > 0)
                                                           value="{{ $record->pneumonia_vaccination->q5_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="disabled field @if($errors->has('q8')) error @endif">
                                    <label for="q8" style="font-size: 15px;">4) What was the result of the outreach?</label>
                                    <div class="ui selection dropdown outreach">
                                        <input type="hidden" name="q8">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Outreach result</div>
                                        <div class="menu">
                                            <div class="item" data-value="Patient Transferred">Patient Transferred</div>
                                            <div class="item" data-value="Scheduled Appointment">Scheduled Appointment</div>
                                            <div class="item" data-value="Patient Refused">Patient Refused</div>
                                            <div class="item" data-value="NPC">NPC</div>
                                            <div class="item" data-value="Pending">Pending</div>
                                            <div class="item" data-value="Call back">Call back</div>
                                            <div class="item" data-value="Voicemail">Voicemail</div>
                                            <div class="item" data-value="No answer">No answer</div>
                                            <div class="item" data-value="Disconnected Number">Disconnected Number</div>
                                            <div class="item" data-value="Do Not Call">Do Not Call</div>
                                            <div class="item" data-value="Privacy Manager">Privacy Manager</div>
                                            <div class="item" data-value="Deceased">Deceased</div>
                                            <div class="item" data-value="Different PCP">Different PCP</div>
                                            <div class="item" data-value="Up-to-date">Up-to-date</div>
                                            <div class="item" data-value="Done Outside SMG">Done Outside SMG</div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q8_a" id="q8_a"
                                                   @if(count($record->pneumonia_vaccination) > 0)
                                                   value="{{ $record->pneumonia_vaccination->q8_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="disabled field @if($errors->has('q9')) error @endif">
                                    <label for="q9" style="font-size: 15px;">7) If done outside SMG, did you request document from outside provider or patient?</label>
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q9" id="q9"
                                               @if(count($record->pneumonia_vaccination) > 0)
                                               @if ($record->pneumonia_vaccination->q9 == "Yes")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif
                                               value="Yes">
                                        <label>Yes</label>
                                    </div>
                                </div>

                                <div class="disabled field @if($errors->has('q9')) error @endif">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q9" id="q9"
                                               @if(count($record->pneumonia_vaccination) > 0)
                                               @if ($record->pneumonia_vaccination->q9 == "No")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif
                                               value="No">
                                        <label>No</label>
                                    </div>
                                </div>

                                <div class="disabled field @if($errors->has('q6')) error @endif">
                                    <label for="q6" style="font-size: 15px;">8) Was document received and recorded in EMR?</label>
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q6" id="q6"
                                               @if(count($record->pneumonia_vaccination) > 0)
                                               @if ($record->pneumonia_vaccination->q6 == "Yes")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif
                                               value="Yes">
                                        <label>Yes</label>
                                    </div>
                                </div>
                                <div class="disabled field @if($errors->has('q6')) error @endif">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q6" id="q6"
                                               @if(count($record->pneumonia_vaccination) > 0)
                                               @if ($record->pneumonia_vaccination->q6 == "No")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif
                                               value="No">
                                        <label>No</label>
                                    </div>
                                </div>


                                <div class="disabled field @if($errors->has('q7')) error @endif">
                                    <label style="font-size: 15px;">7) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                    <div class="ui large left icon input">
                                        <input type="text" name="q7"
                                               @if(count($record->pneumonia_vaccination) > 0)
                                               value="{{ $record->pneumonia_vaccination->q7 }}"
                                               @else
                                               value=""
                                                @endif
                                        >
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="ui divider"></div>

                                <div class="actions">
                                    <button class="ui button primary fluid disabled">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="three wide column">
                    @include('util.form_right_sidebar')
                </div>
            </div>
        </div>
    @stop
@endif


@section('scripts')
    @include('util.form_scripts')

    <script>
        $('.outreach').dropdown('set selected', "{{ isset($record->pneumonia_vaccination->q8)?$record->pneumonia_vaccination->q8:"" }}");
    </script>
@stop