@extends('template')


@section('header')
    <div class="ui menu borderless inverted right aligned" style="border-radius: 0rem !important;">
        <div class="header item">NSI :: Lead Scheduler</div>
        <div class="right menu">
            <div class="right item">Welcome, <i class="user icon"></i> Guest </div>
        </div>
    </div>
@stop


@section('content')
    <br><br><br><br>
    <div class="ui form grid">
        <div class="seven wide column segment grid centered">
            <div class="column">
                <div class="ui form">

                    <form action="{{ url('/auth/login/') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="ui teal container segment">
                            @if (count($errors) > 0)
                                <div class="ui error message">
                                    <i class="close icon"></i>
                                    <div class="header">
                                        There was some errors with your submission
                                    </div>
                                    <ul class="list">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label class="ui teal ribbon label right" style="font-size: 16px;">Log-in your account</label>

                            <br><br><br>

                            <div class="field">
                                <label for="email">Username</label>
                                <div class="ui left icon input">
                                    <input type="string" name="email" id="email" placeholder="Username">
                                    <i class="mail icon"></i>
                                </div>
                            </div>

                            <div class="field">
                                <label for="password">Password</label>
                                <div class="ui left icon input">
                                    <input type="password" name="password" id="password" placeholder="Password">
                                    <i class="lock icon"></i>
                                </div>
                            </div>

                            <br>

                            <div class="ui buttons right floated">
                                <button class="ui button positive">Log-in</button>
                                <div class="or"></div>
                                <a href="" class="ui button negative">Forgot Password</a>
                            </div>

                            <br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


@section('script')
@stop