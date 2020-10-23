
@extends('layouts.frontend')
@section('title', 'Register | '.Config::get('siteSetting.site_name'))
@section('css-top')
 <link href="{{asset('css/pages/login-register-lock.css')}}" rel="stylesheet">

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
    .registerArea{background: #fff; border-radius: 5px;margin:10px 0;padding-top: 10px;}
</style>
 @endsection
@section('content')
<div class="container">
    
    <div class="row justify-content-md-center">
        <div class="col-md-1 col-12"></div>
        <div class="col-md-10 col-12 registerArea" >
            <div class="card">

                   <div class="card-body">

                        <form id="loginform" data-parsley-validate action="{{route('vendorRegister')}}" method="post" >
                            @csrf
                            <div class="card-header text-center"><h3>Seller Sign Up</h3></div>
                            

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
                            <div class="form-group">
                              <label class="control-label required" for="shop_name">Shop Name</label>
                              <input type="text" required name="shop_name" value="{{old('shop_name')}}" placeholder="Enter Name" data-parsley-required-message = "Shop name is required" id="shop_name" class="form-control">
                              @if ($errors->has('name'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group required">
                                    <span>Select Your Rejion</span>
                                    <select name="state" onchange="get_city(this.value)"  id="state" data-parsley-required-message = "Rejion name is required" class="form-control">
                                        <option value=""> --- Please Select --- </option>
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}"> {{$state->name}} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <span>City</span>
                                        <select name="city" data-parsley-required-message = "City name is required" onchange="get_area(this.value)"  id="city" class="form-control">
                                            <option value=""> Select first rejion </option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <span>Area</span>
                                        <select name="area" data-parsley-required-message = "Area name is required" id="area" class="form-control">
                                            <option value=""> Select first city </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <span class="required">Address</span>
                                <input type="text" required value="{{old('address')}}" name="ship_address" placeholder="Enter Address" class="form-control">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div style=" display: flex!important;" class="d-flex no-block align-items-center">
                                        <div style="display: inline-flex;" class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="agree" required> 
                                            <label style="margin: 0 5px;" class="custom-control-label" for="agree"> I've read and understood <a href="{{url('/')}}" style="color: blue">Terms & Conditions </a></label>
                                        </div> 
                                        
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group text-center">
                                <div class="col-xs-12 p-b-20">
                                    <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
            
            <div class="form-group m-t-20">
                <div class="col-sm-12 text-center">
                    Already have an account?  <a href="{{route('login')}}" class="text-info m-l-5"><b>Sign In</b></a>
                </div>
            </div>  
            <div class="col-md-3 col-12"></div>     
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript">
    function get_city(id){
     
        var  url = '{{route("get_city", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                    $("#city").html(data);
                    $("#city").focus();
                }else{
                    $("#city").html('<option>City not found</option>');
                }
            }
        });
    }    

    function get_area(id){
           
        var  url = '{{route("get_area", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                    $("#area").html(data);
                    $("#area").focus();
                }else{
                    $("#area").html('<option>Area not found</option>');
                }
            }
        });
    }  

</script>
@endsection


