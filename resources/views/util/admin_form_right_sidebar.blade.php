<div class="row">
    <div class="ui vertical fluid menu">
        <a class="item {{Request::route()->getName()=='admin_demographics'?'active':''}}" href="{{ route('admin_demographics', $record->id) }}">
            Demographics
        </a>
        <a class="item {{Request::route()->getName()=='admin_bcs'?'active':''}}" href="{{ route('admin_bcs', $record->id) }}">
            Breast Cancer Screening
        </a>
        <a class="item {{Request::route()->getName()=='admin_ccs'?'active':''}}" href="{{ route('admin_ccs', $record->id) }}">
            Colon Cancer Screening
        </a>
        <a class="item {{Request::route()->getName()=='admin_fv'?'active':''}}" href="{{ route('admin_fv', $record->id) }}">
            Flu Vaccination
        </a>
        <a class="item {{Request::route()->getName()=='admin_pv'?'active':''}}" href="{{ route('admin_pv', $record->id) }}">
            Pneumonia Vaccination
        </a>
        <a class="item {{Request::route()->getName()=='admin_bp'?'active':''}}" href="{{ route('admin_bp', $record->id) }}">
            Blood pressure
        </a>
        <a class="item {{Request::route()->getName()=='admin_da1c'?'active':''}}" href="{{ route('admin_da1c', $record->id) }}">
            Diabetes: A1C
        </a>
        <a class="item {{Request::route()->getName()=='admin_dee'?'active':''}}" href="{{ route('admin_dee', $record->id) }}">
            Diabetes: Eye Exam
        </a>
        <a class="item {{Request::route()->getName()=='admin_hrm'?'active':''}}" href="{{ route('admin_hrm', $record->id) }}">
            High Risk Meds
        </a>
        <a class="item {{Request::route()->getName()=='admin_o'?'active':''}}" href="{{ route('admin_o', $record->id) }}">
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