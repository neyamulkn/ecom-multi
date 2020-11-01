
@extends('layouts.frontend')
@section('title', 'Register | '.Config::get('siteSetting.site_name'))
@section('css-top')

<style type="text/css">
    @media (min-width: 1200px){
        .container {
            max-width: 1200px !important;
        }
    }
    .dropdown-toggle::after, .dropup .dropdown-toggle::after {
        content: initial !important;
    }
    .card-footer, .card-header {
        margin-bottom: 5px;
        border-bottom: 1px solid #ececec;
    }
    .error{color:red;}
</style>
 @endsection
@section('content')
<div class="container">
    
    <div class="row justify-content-center" style="margin-top:10px">
        <div class="col-md-3 col-12"></div>
        <div class="col-md-5 col-12" style="background: #fff;">
            <div class="card">

                   <div class="card-body">

                        <form id="loginform" data-parsley-validate action="{{route('userRegister')}}" method="post" >
                            @csrf
                            <div class="card-header text-center"><h3>Sign Up</h3></div>
                            <div class="form-group">
                              <label class="control-label required" for="name">Full Name</label>
                              <input type="text" required name="name" value="{{old('name')}}" placeholder="Enter Name" data-parsley-required-message = "Name is required" id="input-email" class="form-control">
                              @if ($errors->has('name'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                              <label class="control-label required" for="mobile">Mobile Number</label>
                              <input type="text" required name="mobile" value="{{old('mobile')}}" placeholder="Enter Mobile Number" id="mobile" data-parsley-required-message = "Mobile number is required" class="form-control">
                              @if ($errors->has('mobile'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('mobile') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                              <label class="control-label" for="email">Email Address</label>
                              <input type="email" name="email" value="{{old('email')}}" placeholder="Enter Email Address" id="email" class="form-control">
                              @if ($errors->has('email'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label required" for="password">Password</label>
                                <input type="password" name="password" placeholder="Password" required id="password" data-parsley-required-message = "Password is required" minlength="6" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="error" role="alert">
                                       {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div style=" display: flex!important;" class="d-flex no-block align-items-center">
                                        <div style="display: inline-flex;" class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Remember"> 
                                            <label style="margin: 0 5px;" class="custom-control-label" for="Remember"> Remember me</label>
                                        </div> 
                                        
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group text-center">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Sign Up</button>
                            </div> 
                            <div id="column-login" style="margin:15px 0" class="col-sm-8 pull-right">
                                <div class="row">
                                    <div class="social_login pull-right" id="so_sociallogin">
                                      <a href="{{route('social.login', 'facebook')}}" class="btn btn-social-icon btn-sm btn-facebook"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a>
                                     <!--  <a href="#" class="btn btn-social-icon btn-sm btn-twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a> -->
                                      <a href="{{route('social.login', 'google')}}" class="btn btn-social-icon btn-sm btn-google-plus"><i class="fa fa-google fa-fw" aria-hidden="true"></i></a>
                                      <!-- <a href="#" class="btn btn-social-icon btn-sm btn-linkdin"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a> -->
                                    </div>
                                </div>
                            </div>                            
           
                        </form>
                    </div>
            </div>
            
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    Already have an account?  <a href="{{route('login')}}" class="text-info m-l-5"><b>Sign In</b></a>
                </div>
            </div>  
            <div class="col-md-3 col-12"></div>     
        </div>
    </div>
</div>
@endsection


