<!-- Sign Up Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <header class="modal_content_header">
            <div class="hm_nav">
                <h3 class="hm_nav_title">Daftar</h3>
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <!--<span class="hm_nav_clear">Clear</span>-->
            </div>
        </header>
        <div class="modal-content" id="sign-up">
            <div class="modal-body">
                <div class="login-form">
                    <form>
                        
                        <div class="row">
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Nama Profil"
                                        id="txtnama">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Telp</label>
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="No Telp/HP"
                                        id="txttelp">
                                        <i class="ti-mobile"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-with-icon">
                                        <input type="email" class="form-control" placeholder="Email"
                                        id="txtemail">
                                        <i class="ti-email"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-with-icon">
                                        <input type="password" class="form-control" placeholder="*******"
                                        id="txtpassword">
                                        <i class="ti-unlock"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <button id="btnregister" type="button" class="btn btn-md full-width pop-login bg-2" onclick="register()">Buat Akun</button>
                        </div>
                    
                    </form>
                </div>
            <!--
                <div class="modal-divider"><span>Or Signup via</span></div>
                <div class="social-login mb-3">
                    <ul>
                        <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                        <li><a href="#" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
                    </ul>
                </div>
                <div class="text-center">
                    <p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#" class="link">Go For LogIn</a></p>
                </div>
            -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->