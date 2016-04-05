@extends('template')


@section('header')
    @include('util.admin_header')
@stop

@section('content')
    <div class="ui padded  grid">
        <div class="ui doubling stackable three column row">
            @include('util.messages')
            <div class="four wide column">
                @include('util.form_left_sidebar')
            </div>
            <div class="nine wide column">
                @include('util.admin_page_title')
                <div class="row">
                    <div class="ui divider"></div>
                </div>
                <div class="row">
                    <div class="ui basic segment">
                        <form action="{{ route('submit_demographics', $record->id) }}" class="ui equal width form" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="field @if($errors->has('q1')) error @endif">
                                <label style="font-size: 15px;">1. Date of most recent office visit</label>
                                <div class="two fields">
                                    <div class="field">
                                        <div class="ui large left icon input">
                                            <input name="q1" id="v_d"
                                                   @if(count($record->demographic) > 0)
                                                   value="{{ $record->demographic->q1 }}"
                                                   @else
                                                   value=""
                                                   @endif
                                                   readonly>
                                            <i class="calendar icon"></i>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q1_a"
                                                   @if(count($record->demographic) > 0)
                                                   value="{{ $record->demographic->q1_a }}"
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
                                    <label for="q2" style="font-size: 15px;">2. Is PCP listed in PCT (patient care team?)</label>
                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                        <input type="radio" name="q2" id="q2"

                                               @if(count($record->demographic) > 0)
                                               @if ($record->demographic->q2 == "yes")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif

                                               value="yes">
                                        <label>Yes</label>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q2')) error @endif">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q2" id="q2"

                                               @if(count($record->demographic) > 0)
                                               @if ($record->demographic->q2 == "no")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif

                                               value="no">
                                        <label>No</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui large left input">
                                        <input name="q2_a" id="q2_a"
                                               @if(count($record->demographic) > 0)
                                               value="{{ $record->demographic->q2_a }}"
                                               @else
                                               value=""
                                                @endif
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="field @if($errors->has('q3')) error @endif">
                                <label for="q3" style="font-size: 15px;">3. If NO, who is listed as PCP in PCT (Patient Care Team)</label>
                                <div class="ui large left input">
                                    <input name="q3" id="q3"
                                           @if(count($record->demographic) > 0)
                                           value="{{ $record->demographic->q3 }}"
                                           @else
                                           value=""
                                            @endif
                                    >
                                </div>
                            </div>

                            <div class="inline fields">

                                <div class="field @if($errors->has('q4')) error @endif">
                                    <label for="q4" style="font-size: 15px;">4. Ok to call?</label>
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q4" id="q4"
                                               @if(count($record->demographic) > 0)
                                               @if ($record->demographic->q4 == "yes")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif
                                               value="yes">
                                        <label>Yes</label>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q4')) error @endif">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="q4" id="q4"
                                               @if(count($record->demographic) > 0)
                                               @if ($record->demographic->q4 == "no")
                                               checked="checked"
                                               @else
                                               @endif
                                               @endif
                                               value="no">
                                        <label>No</label>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="ui sixteen wide large left input">
                                        <input name="q4_a" id="q4_a"
                                               @if(count($record->demographic) > 0)
                                               value="{{ $record->demographic->q4_a }}"
                                               @else
                                               value=""
                                                @endif
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <label for="q6" style="font-size: 15px;">5. Is there a preferred time of the day that patient would like to be called? If yes, Please provide the time.</label>
                                <div class="inline fields">
                                    <div class="field @if($errors->has('q6')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q6" id="q6"
                                                   @if(count($record->demographic) > 0)
                                                   @if ($record->demographic->q6 == "no")
                                                   checked="checked"
                                                   @else
                                                   @endif
                                                   @endif
                                                   value="no">
                                            <label>No</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q6')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q6" id="q6"
                                                   @if(count($record->demographic) > 0)
                                                   @if ($record->demographic->q6 == "yes")
                                                   checked="checked"
                                                   @else
                                                   @endif
                                                   @endif
                                                   value="yes">
                                            <label>Yes / Time</label>
                                        </div>
                                    </div>



                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q6_a" id="q6_a"
                                                   @if(count($record->demographic) > 0)
                                                   value="{{ $record->demographic->q6_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field @if($errors->has('q5')) error @endif">
                                <label style="font-size: 15px;">6. Date of initial chart review</label>
                                <div class="ui large left icon input">
                                    <input name="q5" id="date_chart_review"
                                           @if(count($record->demographic) > 0)
                                           value="{{ $record->demographic->q5 }}"
                                           @else
                                           value=""
                                           @endif
                                           readonly>
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
            <div class="three wide column">
                @include('util.admin_form_right_sidebar')
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @include('util.form_scripts')
@stop
