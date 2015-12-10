<?php
$user = Utility::getUser();
$setting = Utility::setting();
$setting=json_decode($setting->content);
$taxo = Utility::get_video_cate();
?>
<?php
$user = Utility::getUser();
$setting = Utility::setting();
$setting=json_decode($setting->content);

?>

    <div id="signin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h3 id="myModalLabel">Sign In</h3>

        </div>

        <div class="modal-body">

        <div class="login-widget">

            <form>           

                <input type="text" onfocus="if(this.value == 'User Name') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'User Name'; }" value="User Name" name="">

                <input type="text" onfocus="if(this.value == 'Password') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Password'; }" value="Password" name="">

                <button class="form-btn hover-style">Login</button>

            </form>

        </div>

        </div>

        <div class="modal-footer">

            <p>Enter your Username and Password</p>

        </div>

    </div>

    <!--SIGNIN BOX END-->

    <!--SIGNUP BOX START-->

    <div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h3 id="myModalLabel">Sign Up</h3>

        </div>

        <div class="modal-body">

        <div class="login-widget">

            <form action="<?php echo url('/user/loginypn') ?>" method="post">           
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="text" onfocus="if(this.value == 'First Name') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'First Name'; }" value="First Name" name="">

            <input type="text" onfocus="if(this.value == 'Last Name') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Last Name'; }" value="Last Name" name="">

            <input type="text" onfocus="if(this.value == 'Your E-mail') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Your E-mail'; }" value="Your E-mail" name="">

            <input type="password" onfocus="if(this.value == 'New Password') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'New Password'; }" value="New Password" name="">

            <input type="submit" class="form-btn hover-style">Login</input>

            </form>

        </div>

        </div>

        <div class="modal-footer">

            <p>Fill the given fields for singing up</p>

        </div>

    </div>
<header class="border-color">

        <div class="container">

            <div class="logo">

            <a href="/home"><img src="/assets/frontend/images/logo.png" alt="VIDEO MAGAZINE"></a>

            </div>

                <div class="navbar main-navigation">

                    <div class="sigin">

                        <a href="#signin" role="button" data-toggle="modal">Sign In</a>

                        <a  href="#signup" role="button" data-toggle="modal">Sign Up</a>

                    </div>

                  <nav class="navbar-inner">

                      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                      </a>

                      <div class="nav-collapse">

                         <ul class="nav">

                            <li><a href="index.html">Home</a></li>
                            @foreach($taxo as $cate)
                             <li><a href="/c={{$cate->description}}">{{$cate->name}}</a></li>
                            @endforeach

                        </ul>

                      </div>

                  </nav>

                </div>

        </div>

    </header>