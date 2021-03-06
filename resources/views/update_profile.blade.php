@extends('layout.master')

@section('content')
    <div class="card" style="margin-top:5px;padding-top:10px;margin-left: 2%;margin-right: 2%">
        <div class="card-body">

            <h5 class="card-title text-center" style="text-align: center;font-weight: bold">
                Update merchant account profile <br/><br/>
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
                <form class="form-inline text-center " method="POST" action="{{url('update_profile')}}"
                      style="text-align: center; margin-left: 5%; margin-right:5%">
                    {{ csrf_field() }}
                    <div>

                        <div class="alert alert-info" style="font-size:16px;font-weight: bold">
                            Update Account Details
                        </div>
                        <hr>
                        <div class="row alert">
                            <div class="col-md-4" style="font-weight:bolder;font-size:16px">Email Address</div>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input disabled value="{{$user->email}}" type="email" class="form-control" name="email" id="email"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row alert">
                            <div class="col-md-4" style="font-weight:bolder;font-size:16px">Full Name</div>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input value="{{$user->name}}" type="text" class="form-control" name="name" id="name"
                                           placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row alert">
                            <div class="col-md-4" style="font-weight:bolder;font-size:16px">Phone Number</div>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input value="{{$user->phone_number}}" type="number" class="form-control" name="phone_number" id="phone_number"
                                           placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-sm">Update Merchant Account</button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        <a href="{{route('dashboard')}}"
                           style="font-size: 14px; font-weight: bold;" class="card-link">
                            <button type="button" class="btn btn-sm" style="background:#2196f3;color:white">Return
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
@stop