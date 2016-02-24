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
                        <div class="twelve wide column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        Others
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_others', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 16px;">1) Date of 2nd Chart review (to check status of Prev. Sched. Appts)</label>
                                            <div class="ui big left icon input">
                                                <i class="calendar icon"></i>
                                                <input name="q3" id="prev_sched_appts"
                                                   @if(count($record->other) > 0)
                                                   value="{{ $record->other->q3 }}"
                                                   @else
                                                   value=""
                                                   @endif
                                                >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label style="font-size: 16px;">2) OV1 Appt. status for Current Month</label>
                                            <div class="ui big left input">
                                                <input type="text" name="q4"
                                                   @if(count($record->other) > 0)
                                                   value="{{ $record->other->q4 }}"
                                                   @else
                                                   value=""
                                                   @endif
                                                >
                                            </div>
                                        </div>

                                        <div class="two fields">
                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q5')) error @endif">
                                                    <label for="q5" style="font-size: 16px;">3) Result of Call #1 or Patient Call Back - Was Lab appt. scheduled?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q5" id="q5"
                                                           @if(count($record->other) > 0)
                                                               @if ($record->other->q5 == "Yes")
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
                                                        <input type="radio" name="q5" id="q5" value="No"
                                                        @if(count($record->other) > 0)
                                                            @if ($record->other->q5 == "No")
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
                                                <div class="field @if($errors->has('q6')) error @endif">
                                                    <label for="q6" style="font-size: 16px;">4) Result of Call #1 or Patient Call Back - Was OV appt. scheduled?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q6" id="q6"
                                                           @if(count($record->other) > 0)
                                                               @if ($record->other->q6 == "Yes")
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
                                                        <input type="radio" name="q6" id="q6" value="No"
                                                        @if(count($record->other) > 0)
                                                            @if ($record->other->q6 == "No")
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

                                        <div class="two fields">
                                            <div class="field @if($errors->has('q7')) error @endif">
                                                <label for="q7" style="font-size: 16px;">5) Date of PCP OV July-Dec</label>
                                                <div class="ui big left icon input">
                                                    <i class="calendar icon"></i>
                                                    <input name="q7" id="date_of_pcp_ov"
                                                       @if(count($record->other) > 0)
                                                       value="{{ $record->other->q7 }}"
                                                       @else
                                                       value=""
                                                       @endif
                                                    readonly>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q8')) error @endif">
                                                <label style="font-size: 16px;">6) Status of PCP OV for  July-Dec</label>
                                                <div class="ui big left input">
                                                    <input type="text" name="q8"
                                                       @if(count($record->other) > 0)
                                                       value="{{ $record->other->q8 }}"
                                                       @else
                                                       value=""
                                                       @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="two fields">
                                            <div class="field @if($errors->has('q9')) error @endif">
                                                <label style="font-size: 16px;">7) If OV Not scheduled - select reason:</label>
                                                <div class="ui big left input">
                                                    <input type="text" name="q9"
                                                       @if(count($record->other) > 0)
                                                       value="{{ $record->other->q9 }}"
                                                       @else
                                                       value=""
                                                       @endif
                                                    >
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q10')) error @endif">
                                                <label style="font-size: 16px;">8) Final status of Care Coordinator Outreach </label>
                                                <div class="ui big left input">
                                                    <input type="text" name="q10"
                                                       @if(count($record->other) > 0)
                                                       value="{{ $record->other->q10 }}"
                                                       @else
                                                       value=""
                                                       @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q12')) error @endif">
                                                <label for="q12" style="font-size: 16px;">9) Patient Satisfaction: Was this call helpful? (Y/N)</label>
                                                <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                    <input type="radio" name="q12" id="q12"
                                                           @if(count($record->other) > 0)
                                                           @if ($record->other->q12 == "Yes")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                           @endif
                                                           value="Yes">
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q12')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q12" id="q12" value="No"
                                                           @if(count($record->other) > 0)
                                                           @if ($record->other->q12 == "No")
                                                           checked="checked"
                                                    @else
                                                            @endif
                                                            @endif
                                                    >
                                                    <label>No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q13')) error @endif">
                                            <label style="font-size: 16px;">10) Ratings</label>
                                            <select class="ui dropdown" name="q13">
                                                <option value="" >Ratings</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "1")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="1">1</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "2")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="2">2</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "3")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="3">3</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "4")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="4">4</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "5")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="5">5</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "6")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="6">6</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "7")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="7">7</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "8")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="8">8</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "9")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="9">9</option>
                                                <option
                                                        @if(count($record->other) > 0)
                                                        @if ($record->other->q13 == "10")
                                                        selected
                                                        @else
                                                        @endif
                                                        @endif
                                                        value="10">10</option>
                                            </select>

                                        </div>

                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <label style="font-size: 16px;">11) Additional Comments</label>
                                            <div class="ui big left input">
                                                <textarea type="text" name="q11" >@if(count($record->other) > 0){{ $record->other->q11 }}@endif</textarea>
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