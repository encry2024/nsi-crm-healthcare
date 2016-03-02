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
                            @include('util.page_title')
                            <div class="row">
                            <div class="ui divider"></div>
                            </div>
                            <div class="row">
                                <div class="ui basic segment">
                                    <form action="{{ route('submit_breast_cancer_screening', $record->id) }}" method="POST" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label style="font-size: 14px;">1. What is the date of the most recent Mammogram?</label>
                                            <div class="two fields">
                                                <div class="field">
                                                    <div class="ui large left icon input">
                                                        <input name="q1" id="v_d"
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                value="{{ $record->breast_cancer_screening->q1 }}"
                                                            @else
                                                                value=""
                                                            @endif
                                                        >
                                                        <i class="calendar icon"></i>
                                                    </div>
                                                </div>

                                                <div class="field">
                                                    <div class="ui large left input">
                                                        <input name="q1_a"
                                                               @if(count($record->breast_cancer_screening) > 0)
                                                               value="{{ $record->breast_cancer_screening->q1_a }}"
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
                                                <label for="q2" style="font-size: 14px;">2) Is this a date between date range: 1/1/2014-current date?</label>
                                                <div class="field @if($errors->has('q2')) error @endif">
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q2" id="q2"
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                @if ($record->breast_cancer_screening->q2 == "Yes")
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
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                @if ($record->breast_cancer_screening->q2 == "No")
                                                                checked="checked"
                                                                @else
                                                                @endif
                                                            @endif
                                                        value="No">
                                                        <label>No</label>
                                                    </div>
                                                </div>

                                                <div class="field">
                                                    <div class="ui large input">
                                                        <input name="q2_a" id="q2_a"
                                                               @if(count($record->breast_cancer_screening) > 0)
                                                               value="{{ $record->breast_cancer_screening->q2_a }}"
                                                               @else
                                                               value=""
                                                                @endif
                                                        >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q3')) error @endif">
                                                    <label for="q3" style="font-size: 14px;">3) If the date is NOT between date range, was outreach to patient made?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q3" id="q3"
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                @if ($record->breast_cancer_screening->q3 == "Yes")
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
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                @if ($record->breast_cancer_screening->q3 == "No")
                                                                checked="checked"
                                                                @else
                                                                @endif
                                                            @endif
                                                        value="No">
                                                        <label>No</label>
                                                    </div>
                                                </div>

                                                <div class="field">
                                                    <div class="ui large input">
                                                        <input name="q3_a" id="q3_a"
                                                               @if(count($record->breast_cancer_screening) > 0)
                                                               value="{{ $record->breast_cancer_screening->q3_a }}"
                                                               @else
                                                               value=""
                                                                @endif
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label for="q4" style="font-size: 14px;">4) What was the result of the outreach?</label>
                                            <div class="fields">
                                                <div class="grouped fields">
                                                    <div class="inline fields">
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q4" value="Successful"
                                                                @if(count($record->breast_cancer_screening) > 0)
                                                                    @if ($record->breast_cancer_screening->q4 == "Successful")
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
                                                                <input type="radio" name="q4" value="Pending"
                                                                @if(count($record->breast_cancer_screening) > 0)
                                                                    @if ($record->breast_cancer_screening->q4 == "Pending")
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
                                                                <input type="radio" name="q4" value="Call Back"
                                                                @if(count($record->breast_cancer_screening) > 0)
                                                                    @if ($record->breast_cancer_screening->q4 == "Call Back")
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
                                                                <input type="radio" name="q4" value="Voicemail"
                                                                       @if(count($record->breast_cancer_screening) > 0)
                                                                       @if ($record->breast_cancer_screening->q4 == "Voicemail")
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
                                                                <input type="radio" name="q4" value="No Action Needed"
                                                                @if(count($record->breast_cancer_screening) > 0)
                                                                    @if ($record->breast_cancer_screening->q4 == "No Action Needed")
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
                                                    <input name="q4_a" id="q4_a"
                                                           @if(count($record->breast_cancer_screening) > 0)
                                                           value="{{ $record->breast_cancer_screening->q4_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 14px;">5) Enter appt date if appt made</label>
                                            <div class="ui large left icon input">
                                                <input name="q5" id="appt_date"
                                                    @if(count($record->breast_cancer_screening) > 0)
                                                        value="{{ $record->breast_cancer_screening->q5 }}"
                                                        @else
                                                        value=""
                                                    @endif
                                                >
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="two fields">
                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q6')) error @endif">
                                                    <label for="q6" style="font-size: 14px;">6) If done outside SMG, did you request document from outside provider or patient?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q6" id="q6" value="Yes"
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                @if ($record->breast_cancer_screening->q6 == "Yes")
                                                                checked="checked"
                                                                @else
                                                                @endif
                                                            @endif
                                                        >
                                                        <label>Yes</label>
                                                    </div>
                                                </div>

                                                <div class="field @if($errors->has('q6')) error @endif">
                                                    <div class="ui radio checkbox">
                                                        <input type="radio" name="q6" id="q6" value="No"
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                @if ($record->breast_cancer_screening->q6 == "No")
                                                                checked="checked"
                                                                @else
                                                                @endif
                                                            @endif
                                                        >
                                                        <label>No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q7')) error @endif">
                                                    <label for="q7" style="font-size: 14px;">7) Was document received and recorded in EMR?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q7" id="q7" value="Yes"
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                @if ($record->breast_cancer_screening->q7 == "Yes")
                                                                checked="checked"
                                                                @else
                                                                @endif
                                                            @endif
                                                        >
                                                        <label>Yes</label>
                                                    </div>
                                                </div>

                                                <div class="field @if($errors->has('q7')) error @endif">
                                                    <div class="ui radio checkbox">
                                                        <input type="radio" name="q7" id="q7" value="No"
                                                            @if(count($record->breast_cancer_screening) > 0)
                                                                @if ($record->breast_cancer_screening->q7 == "No")
                                                                checked="checked"
                                                                @else
                                                                @endif
                                                            @endif
                                                        >
                                                        <label>No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q8')) error @endif">
                                            <label style="font-size: 14px;">8) Closed loop: appt kept or task acted on/closed by office?</label>
                                            <div class="ui large left icon input">
                                                <input type="text" name="q8"
                                                    @if(count($record->breast_cancer_screening) > 0)
                                                        value="{{ $record->breast_cancer_screening->q8 }}"
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