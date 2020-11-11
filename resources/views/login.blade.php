@extends('layout.master')

@section('content')
    <div class="card" style="margin-top:5px;padding-top:10px;margin-left: 2%;margin-right: 2%">
        <div class="card-body">

            <h5 class="card-title" style="text-align: center;font-weight: bold">
                Login into your merchant account to start selling <br/><br/>
            </h5>
            <hr style="border-width: 6px"/>
            <div class="card-text">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('message'))
                        <div class="alert alert-success">{!! session('message') !!}</div>
                @endif
                <form class="form-inline " method="POST" action="{{url('login')}}"
                      style="text-align: center; margin: 20px">
                    {{ csrf_field() }}
                    <div>

                        <div class="alert alert-info" style="font-size:16px;font-weight: bold">
                            Enter email and password to access account
                        </div>
                        <hr>
                        <div class="row alert">
                            <div class="col-md-4" style="font-weight:bolder;font-size:16px">Email Address</div>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row alert">
                            <div class="col-md-4" style="font-weight:bolder;font-size:16px">Password</div>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="password" class="form-control" name="password" id="password"
                                           placeholder="Account Password">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-sm">Login into account</button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-7">
                        <a href="{{url('register')}}"
                           style="font-size: 14px; font-weight: bold;" class="card-link">
                            <button type="button" class="btn btn-sm" style="background:#2196f3;color:white">Create
                                Account
                            </button>
                        </a>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
@stop