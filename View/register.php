
                    <div id="Test" class="container">
            <div class="row-fluid span12 form_sec">    
                </div>
                    <div class="row-fluid span12 form_sec">
                        <?php 
                        if(isset($_SESSION['error_reg']) && $_SESSION['error_reg'] !="") {
                         ?>
                        <div class="alert alert-error" style="margin-top:20px;">
                        <button data-dismiss="alert" class="close" type="button"> 	&#215;</button>
                        <strong>Oh snap!</strong> <?php echo $_SESSION['error_reg'] ;?>
                        </div>
                        <?php
                        $_SESSION['error_reg']="";
                        }
                            ?>
                        <div class="row-fluid span12 form_sec">
                            <div class="row-fluid span12">
                                <div class="register_account">
                                    <div class="wrap">
                                    <h4 class="title">Create an Account</h4>
                                       <form action="" method="post" name="register" id="register_form">
                                             <div class="col_1_of_2 span_1_of_2">
                                                             <div><input type="text" class="sam_textfeild" value="" name="reg_first_name" placeholder="First Name" class=""></div>
                                                            <div><input type="text" class="sam_textfeild" value="" name="reg_last_name" placeholder="Last Name" class="" ></div>
                                                            <div><input type="text" class="sam_textfeild" value="" name="reg_email" placeholder="E-Mail" class=""></div>
                                                            <div><input type="text" class="sam_textfeild" value="" name="reg_username" placeholder="User Name" class=""></div>
                                                            <div><input type="text" class="sam_textfeild" value="" name="reg_password" placeholder="Password" class=""></div>
                                                            
                                             </div>
                                              
                                          <button class="grey" name="reg_submit" class="sam_submitBtn">Create Account</button>
                                        <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                                        <div class="clear"></div>
                                        </form>
                                  </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>