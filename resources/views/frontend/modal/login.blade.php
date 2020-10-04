<div class="modal fade in" id="so_sociallogin" tabindex="-1" role="dialog" aria-hidden="true" >
<div class="modal-dialog modal-sm block-popup-login">
    <a href="javascript:void(0)" title="Close" class="close close-login fa fa-times-circle" data-dismiss="modal"></a>
    <div class="tt_popup_login"><strong>Sign in</strong></div>
   
        <div class=" col-reg registered-account">
            <div class="block-content">
                <form class="form form-login" action="{{route('userLogin')}}" method="post" id="login-form">
                    @csrf
                    <fieldset class="fieldset login" data-hasrequired="* Required Fields">
                        <div class="field email required email-input">
                            <div class="control">
                                <input required name="emailOrMobile" autocomplete="off" id="email" type="text" class="input-text" title="Email" placeholder="Mobile Number or E-Mail">
                            </div>
                        </div>
                        <div class="field password required pass-input">
                            <div class="control">
                                <input required name="password" type="password" autocomplete="off" class="input-text" id="pass" title="Password" placeholder="Password">
                            </div>
                        </div>
                        <div class="actions-toolbar">
                            <div class="primary">
                                <button type="submit" class="action login primary" name="send" id="send2"><span>Login</span></button>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Login with your social account</label>
                            <div>

                                <a href="#" class="btn btn-social-icon btn-sm btn-google-plus"><i class="fa fa-google fa-fw" aria-hidden="true"></i></a>

                                <a href="#" class="btn btn-social-icon btn-sm btn-facebook"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a>

                                <a href="#" class="btn btn-social-icon btn-sm btn-twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a>

                                <a href="#" class="btn btn-social-icon btn-sm btn-linkdin"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a>

                            </div>
                        </div>

                        <div class="secondary ft-link-p"><a class="action remind" href="#"><span>Forgot Your Password?</span></a></div>
                        
                    </fieldset>
                </form>
           
            </div>
   
        <div style="clear:both;"></div>
    </div>
</div>
</div>
