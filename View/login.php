
    <div id="Test" class="container">
            <div class="row-fluid span12 form_sec">    
                </div>
                    
                    <div class="row-fluid span12 form_sec">
                        <?php 
                        if(isset($_SESSION['error_log']) && $_SESSION['error_log'] !="") {
                         ?>
                        <div class="alert alert-error" style="margin-top:20px;">
                        <button data-dismiss="alert" class="close" type="button"> 	&#215;</button>
                        <strong>Oh snap!</strong> <?php echo $_SESSION['error_log'] ;?>
                        </div>
                        <?php
                        $_SESSION['error_log']="";
                        }
                            ?>
                        <?php 
                        if(isset($_SESSION['success']) && $_SESSION['success'] !="") {
                         ?>
                        <div class="alert alert-success">
                        <button data-dismiss="alert" class="close" type="button"> 	&#215;</button>
                        <strong>Well done!</strong> <?php echo $_SESSION['success'] ;?>
                        </div>
                        
                        <?php
                        $_SESSION['success']="";
                        }
                            ?>
                        
                        <div class="row-fluid span12 form_sec">
                            
                            <div class="row-fluid span6">
                                <h4 class="title">New Customers</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
                                <div class="button1">
                                   <a href="register.html"><input type="submit" name="Submit" value="Create an Account"></a>
                                 </div>
                            </div>
                            <div class="row-fluid span6">
                                <h4 class="title">Registered Customers</h4>
					<div id="loginbox" class="loginbox">
						<form action="" method="post" name="login" id="loginform">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">User Name</label>
						      <input id="modlgn_username" name="modlgn_username" type="text" name="email" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="modlgn_passwd" name="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <div class="remember">
                                                        <label>Demo : <br>Username - Admin | Password:Admin </label>
							    <input type="submit" name="login_submit" class="button login_submit" value="Login"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					</div>
                            </div>
                            
                            
                        </div>
                    </div>           