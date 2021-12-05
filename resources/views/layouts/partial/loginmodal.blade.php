<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <header class="modal_content_header">
            <div class="hm_nav">
                <h3 class="hm_nav_title">Log In</h3>
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <!--<span class="hm_nav_clear">Clear</span>-->
            </div>
        </header>
        <div class="modal-content" id="registermodal">
            <div class="modal-body">
                <div class="login-form">
                    <form>
                    
                        <div class="form-group">
                            <label>User Name</label>
                            <div class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Email"
                                id="txtemaillogin"
                                onkeypress="if(event.keyCode==13){login();}" autofocus>
                                <i class="ti-email"></i>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-with-icon">
                                <input type="password" class="form-control" placeholder="*******"
                                id="txtpasswordlogin"
                                onkeypress="if(event.keyCode==13){login();}" autofocus>
                                <i class="ti-unlock"></i>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="button" onclick="login();" class="btn btn-md full-width pop-login bg-2">Login</button>
                        </div>
                    
                    </form>
                </div>
            <!--
                <div class="modal-divider"><span>Or login via</span></div>
                <div class="social-login mb-3">
                    <ul>
                        <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                        <li><a href="#" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
                    </ul>
                </div>
                
                <div class="social-login mb-3">
                    <ul>
                        <li>
                            <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                            <label for="reg" class="checkbox-custom-label">Save Password</label>
                        </li>
                        <li><a href="#" class="theme-cl">Forget Password?</a></li>
                    </ul>
                </div>
            -->
                <div class="text-center">
                    <p class="mt-2">Belum punya akun omkost?
                        <a href="#" data-toggle="modal" data-target="#signup" class="link">Registrasi Sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->