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
                                            <label for="q3" style="font-size: 16px;">1) Date of 2nd Chart review:   If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
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

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q12')) error @endif">
                                                <label for="q12" style="font-size: 16px;">2) Patient Satisfaction: Was this call helpful? (Y/N)</label>
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
                                            <label style="font-size: 16px;">3) Ratings</label>
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
                                            <label style="font-size: 16px;">4) Additional Comments</label>
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