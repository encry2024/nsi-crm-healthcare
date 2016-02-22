<div class="row">
    <div class="ui vertical fluid right tabular menu" style="width: 81.5% !important;">
        <a class="item {{Request::route()->getName()=='record.show'?'active':''}}" href="{{ route('record.show', $record->id) }}">
            Demographics
        </a>
        <a class="item {{Request::route()->getName()=='bcs'?'active':''}}" href="{{ route('bcs', $record->id) }}">
            Breast Cancer Screening
        </a>
        <a class="item {{Request::route()->getName()=='ccs'?'active':''}}" href="{{ route('ccs', $record->id) }}">
            Colon Cancer Screening
        </a>
        <a class="item {{Request::route()->getName()=='fv'?'active':''}}" href="{{ route('fv', $record->id) }}">
            Flu Vaccination
        </a>
        <a class="item {{Request::route()->getName()=='pv'?'active':''}}" href="{{ route('pv', $record->id) }}">
            Pneumonia Vaccination
        </a>
        <a class="item {{Request::route()->getName()=='bp'?'active':''}}" href="{{ route('bp', $record->id) }}">
            Blood pressure
        </a>
        <a class="item {{Request::route()->getName()=='da1c'?'active':''}}" href="{{ route('da1c', $record->id) }}">
            Diabetes: A1C
        </a>
        <a class="item {{Request::route()->getName()=='dee'?'active':''}}" href="{{ route('dee', $record->id) }}">
            Diabetes: Eye Exam
        </a>
        <a class="item {{Request::route()->getName()=='hrm'?'active':''}}" href="{{ route('hrm', $record->id) }}">
            High Risk Meds
        </a>
        <a class="item {{Request::route()->getName()=='o'?'active':''}}" href="{{ route('o', $record->id) }}">
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