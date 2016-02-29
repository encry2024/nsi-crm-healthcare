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
                    <label>Pending Items</label>
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