    <header id="header" class="transparent-header-modern fixed-header-bg-white w-100">
        <div class="top-header bg-secondary" style="color: #fff;">
            <div class="container">
                <div class="row">
                <div class="col-md-8"  >
                            <ul class="top-contact list-text-white  d-table">
                                <li><a href="#"><i class="fas fa-phone-alt text-success mr-1"></i>8956251225</a></li>
                                <li><a href="#"><i class="fas fa-envelope text-success mr-1"></i>realestatest@123.com</a></li>
                            </ul>
                        </div>
                    <div class="col-md-4">
                        <div class="top-contact float-right">
                            <ul class="list-text-white d-table">
                            <li><i class="fas fa-user text-success mr-1"></i>
                            <?php  if(isset($_SESSION['uemail']))
                            { ?>
                            <a href="logout.php">Logout</a>&nbsp;&nbsp;<?php } else { ?>
                            <a href="login.php">Login</a>&nbsp;&nbsp;
                            
                            </li>
                            <li><i class="fas fa-user-plus text-success mr-1"></i><a href="register.php"> Register</li><?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-nav secondary-nav hover-success-nav " style="background: #336699">
            <div class="container" style="color:#FFFFFF">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0"> <a class="navbar-brand position-relative" href="index.php"><img class="nav-logo" src="image/restatelg.png" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item dropdown"> <a class="nav-link" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
                                    
                                    <li class="nav-item"> <a class="nav-link" href="about.php">About</a> </li>
                                    
                                    <li class="nav-item"> <a class="nav-link" href="contact.php">Contact</a> </li>										
                                    
                                    <li class="nav-item"> <a class="nav-link" href="property.php">Properties</a> </li>
                                    

                                    
                                    <?php  if(isset($_SESSION['uemail']))
                                    { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"> <a class="nav-link" href="profile.php">Feedback Form</a> </li>
                    
                                            <li class="nav-item"> <a class="nav-link" href="feature.php">Your Property</a> </li>
                                            <li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a> </li>	
                                        </ul>
                                    </li>
                                    <?php } else { ?>
                                    <li class="nav-item"> <a class="nav-link" href="login.php">Login/Register</a> </li>
                                    <?php } ?>
                                    
                                </ul>
                                
                                        <button class="btn-53">
                                        <div class="original">Submit</div>
                                        <div class="letters">
                                            <a href="submitproperty.php">
                                            <span>P</span>
                                            <span>r</span>
                                            <span>o</span>
                                            <span>p</span>
                                            <span>e</span>
                                            <span>r</span>
                                            <span>t</span>
                                            <span>y</span>
                                        </a>
                                        </div>
                                        </button>

                               
                         
                            </div>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
<style>
    .btn-53,
.btn-53 *,
.btn-53 :after,
.btn-53 :before,
.btn-53:after,
.btn-53:before {
  border: 0 solid;
  box-sizing: border-box;
}

.btn-53 {
  -webkit-tap-highlight-color: transparent;
  -webkit-appearance: button;
  background-color: #000;
  background-image: none;
  color: #fff;
  cursor: pointer;
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
    Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
    Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
  font-size: 100%;
  line-height: 1.5;
  margin: 0;
  -webkit-mask-image: -webkit-radial-gradient(#000, #fff);
  padding: 0;
}

.btn-53:disabled {
  cursor: default;
}

.btn-53:-moz-focusring {
  outline: auto;
}

.btn-53 svg {
  display: block;
  vertical-align: middle;
}

.btn-53 [hidden] {
  display: none;
}

.btn-53 {
  border: 1px solid;
  border-radius: 999px;
  box-sizing: border-box;
  display: block;
  font-weight: 900;
  overflow: hidden;
  padding: 8px;
  position: relative;
  text-transform: uppercase;
}

.btn-53 .original {
  background: #fff;
  color: #000;
  display: grid;
  inset: 0;
  place-content: center;
  position: absolute;
  transition: transform 0.2s cubic-bezier(0.87, 0, 0.13, 1);
}

.btn-53:hover .original {
  transform: translateY(100%);
}

.btn-53 .letters {
  display: inline-flex;
}

.btn-53 span {
  opacity: 0;
  transform: translateY(-15px);
  transition: transform 0.2s cubic-bezier(0.87, 0, 0.13, 1), opacity 0.2s;
}

.btn-53 span:nth-child(2n) {
  transform: translateY(15px);
}

.btn-53:hover span {
  opacity: 1;
  transform: translateY(0);
}

.btn-53:hover span:nth-child(2) {
  transition-delay: 0.1s;
}

.btn-53:hover span:nth-child(3) {
  transition-delay: 0.2s;
}

.btn-53:hover span:nth-child(4) {
  transition-delay: 0.3s;
}

.btn-53:hover span:nth-child(5) {
  transition-delay: 0.4s;
}

.btn-53:hover span:nth-child(6) {
  transition-delay: 0.5s;
}

</style>