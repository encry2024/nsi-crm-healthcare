<div class="row">
    <div class="ui vertical fluid menu">
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

</div>