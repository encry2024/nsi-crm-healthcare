<div class="row">
    <div class="ui vertical fluid menu">
        <div class="item">
            <div class="ui toggle checkbox">
                <input type="radio" name="status" value="BCW" {!! Auth::user()->status == 'BCW'?'checked="checked"':'' !!}>
                <label>BCW</label>
            </div>
        </div>

        <div class="item">
            <div class="ui toggle checkbox">
                <input type="radio" name="status" value="INCALL" {!! Auth::user()->status == 'INCALL'?'checked="checked"':'' !!}>
                <label>IN-CALL</label>
            </div>
        </div>

        <div class="bordered item">
            <div class="ui toggle checkbox">
                <input type="radio" name="status" value="ACW" {!! Auth::user()->status == 'ACW'?'checked="checked"':'' !!}>
                <label>ACW</label>
            </div>
        </div>
    </div>
    <div class="ui secondary raised orange segment">
        <form class="" action="{{ url('record/' . $record->id . '/checklist') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="ui form">
                <div class="field">
                    <label><h3>Tasks</h3></label>
                </div>
                @foreach($record->checklist as $checklist)
                    <div class="inline field">
                        <label style="cursor: pointer;">{{ $checklist->description }}</label>
                        <div class="inline fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="rid_{{ $checklist->id }}" @if($checklist->value == 'completed') checked="checked" @endif tabindex="0"class="hidden" value="completed">
                                    <label>Completed</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="rid_{{ $checklist->id }}" @if($checklist->value == 'pended') checked="checked" @endif tabindex="0" class="hidden" value="pended">
                                    <label>Pended</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="rid_{{ $checklist->id }}" @if($checklist->value == 'na') checked="checked" @endif tabindex="0" class="hidden" value="na">
                                    <label>NA</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <button class="ui  button fluid">Update Checklist</button>
            </div>
        </form>
    </div>
</div>