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
                        <div class="eleven wide column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        Pneumonia Vaccination
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_pneuomia_vaccination', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label style="font-size: 16px;">1) What is the date of most recent pneumovax for patients 65 or older (N/A if pt < 65) </label>
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

                                        <div class="two fields">
                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q2')) error @endif">
                                                    <label for="q2" style="font-size: 16px;">2) Pneumonia Vaccine Status: UTD, appt date, refused</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
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
                                                <label style="font-size: 16px;">3) Date of most recent pneumovax for patients 65 or older (N/A if pt < 65)</label>
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

                                        <div class="two fields">
                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q4')) error @endif">
                                                    <label for="q4" style="font-size: 16px;">4) Is the patient >65 years old and was a pneumovax given</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
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
                                            </div>

                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q5')) error @endif">
                                                    <label for="q5" style="font-size: 16px;">5) If the date is NOT between date range, was outreach to patient made?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
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
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q8')) error @endif">
                                            <label for="q8" style="font-size: 14px;">6) What was the result of the outreach?</label>
                                            <div class="ui large left input">
                                                <input name="q8" id="q8"
                                                       @if(count($record->pneumonia_vaccination) > 0)
                                                       value="{{ $record->pneumonia_vaccination->q8 }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q9')) error @endif">
                                            <label for="q9" style="font-size: 16px;">7) If done outside SMG, did you request document from outside provider or patient?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
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

                                        <div class="two fields">
                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q6')) error @endif">
                                                    <label for="q6" style="font-size: 16px;">8) Was document received and recorded in EMR?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
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
                                            </div>

                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q7')) error @endif">
                                                    <label for="q7" style="font-size: 16px;">9) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q7" id="q7"
                                                           @if(count($record->pneumonia_vaccination) > 0)
                                                               @if ($record->pneumonia_vaccination->q7 == "Yes")
                                                               checked="checked"
                                                               @else
                                                               @endif
                                                           @endif
                                                        value="Yes">
                                                        <label>Yes</label>
                                                    </div>
                                                </div>
                                                <div class="field @if($errors->has('q7')) error @endif">
                                                    <div class="ui radio checkbox">
                                                        <input type="radio" name="q7" id="q7"
                                                           @if(count($record->pneumonia_vaccination) > 0)
                                                               @if ($record->pneumonia_vaccination->q7 == "No")
                                                               checked="checked"
                                                               @else
                                                               @endif
                                                           @endif
                                                        value="No">
                                                        <label>No</label>
                                                    </div>
                                                </div>
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