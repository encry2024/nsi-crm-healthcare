@extends('template')


@section('header')
    @include('util.header')
@stop


@section('content')
    <div class="ui centered grid">

        <div class="nine wide column">
            <div class="twelve wide column grid " >
                <br><br>
                @if (count($errors) > 0)
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
                @endif

                @if (Session::has('message'))
                    <div class="ui success message">
                        <i class="close icon"></i>
                        <div class="ui header">
                            <i class="check circle icon"></i>
                            <div class="content">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                @endif

                <h3 class="ui header">
                    <i class="add user icon"></i>
                    <div class="content">
                        Create User
                    </div>
                    <div class="ui divider"></div>
                </h3>

                <div class="ui grid">
                    <div class="sixteen wide column">
                        <form class="" action="{{ route('user.store') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="ui form">
                                <div class="field @if($errors->has('name')) error @endif">
                                    <label>Name <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="name" placeholder="Name" value="{{ Input::old('name') }}">
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('email')) error @endif">
                                    <label>Username <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="string" placeholder="E-mail" value="{{ Input::old('email') }}">
                                        <i class="mail icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('password')) error @endif">
                                    <label>Password <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="password" name="password" placeholder="Password">
                                        <i class="lock icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('password_confirmation')) error @endif">
                                    <label>Confirm Password <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                        <i class="lock icon"></i>
                                    </div>
                                </div>

                                <div class="ui buttons right floated">
                                    <a class="ui button negative" href="{{ route('/home') }}">Cancel</a>
                                    <div class="or"></div>
                                    <button class="ui positive button">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('script')
    <script type="text/javascript">
        $('.dropdown').dropdown();
        $('.message .close').on('click', function()
        {
            $(this).closest('.message').transition('fade');
        });
    </script>
@stop
