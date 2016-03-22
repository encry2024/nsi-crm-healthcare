@if (count($errors) > 0)
    <div class="sixteen wide column">
        <div class="ui negative message">
            <i class="close icon"></i>
            <div class="header">
                User was not able to save because of the following reason(s):
            </div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (Session::has('message'))
    <div class="sixteen wide column">
        <div class="ui {{ Session::get('msg_type') }} top attached message">
            <i class="close icon"></i>
            <div class="ui header">
                <i class="check circle icon"></i>
                <div class="content">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    </div>
@endif