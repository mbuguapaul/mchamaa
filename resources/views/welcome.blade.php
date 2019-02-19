<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="css/flexslider.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/line-icons.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/elegant-icons.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/theme-1.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all"/>
        <!--[if gte IE 9]>
            <link rel="stylesheet" type="text/css" href="css/ie9.css" />
        <![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700' rel='stylesheet' type='text/css'>
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic" rel="stylesheet" type="text/css">
        <link href="css/font-helvetica.css" rel="stylesheet" type="text/css">

        <title>e chamaa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

       
    </head>
    <body>
  
        <div class="nav-container">
            <nav class="centered-logo top-bar">
                <div class="container">
                
              <!-- row -->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="index.html">
                            <img class="logo logo-dark" alt="Logo" src="img/logotype_dark.png">
                        </div>
                    </div>
                
                <!-- end row image -->
                <!-- nav menu -->
                    <div class="row nav-menu">
                    
                        <div class="col-sm-12 columns text-center">
                            <ul class="menu">
                                <a></a><li><a href="index.html" target="_self">Home</a></li>
                                <li><a href="#features" target="_self">Features</a></li>
                                <li><a href="contact.html" target="_self">Contact</a></li>
                                
                             @if (Route::has('login'))
                        
                            @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                            @else
                               <li> <a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                       
                             @endif
                                
                                
                            </ul>
        
                        </div>
                    </div>
                    
                    <div class="mobile-toggle">
                        <i class="icon icon_menu"></i>
                        
                    </div>
                    
                </div>
                <div class="bottom-border"></div>
                
            </nav>
       
        
            
        
        </div>
           <div class="main-container">
            <header class="product-action">
                
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-1 text-center">
                            <h2 class="text-white">Make your Chamaa automated and more transparent.</h2>
                            <p class="text-white">
                                E-chamaa allows making moneary group communication easy and transactions are easily accounted for.
                                See how?
                            </p>

                            @if (Route::has('login'))
                        
                            @auth
                                
                                <a href="{{ url('/home') }}" class="btn btn-primary btn-filled">Home</a>
                            @else
                              
                                    
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-filled">Login</a>


                                <a href="{{ route('register') }}" class="btn btn-primary btn-filled">Get started</a>

                            @endauth
                       
                             @endif
                            
                        </div>
                        <div class="col-sm-12 col-md-10 col-md-offset-1 text-center">
                            <img alt="Screenshot" src="img/ipad2.png">
                        </div>
                    </div>
                </div>
                
                
            </header>
            
            <section class="duplicatable-content">
            
                <div class="container" id="features">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>A few features that should&nbsp;make you excited</h1>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="feature feature-icon-large">
                                <i class="icon icon-mobile"></i>
                                <h5>Easy communication</h5>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                        </div>
                    
                        <div class="col-md-3 col-sm-6">
                            <div class="feature feature-icon-large">
                                <i class="icon icon-happy"></i>
                                <h5>Financial transparency</h5>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                        </div>
                    
                        <div class="col-md-3 col-sm-6">
                            <div class="feature feature-icon-large">
                                <i class="icon icon-tools-2"></i>
                                <h5>Mobile app</h5>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                        </div>
                    
                        <div class="col-md-3 col-sm-6">
                            <div class="feature feature-icon-large">
                                <i class="icon icon-lock"></i>
                                <h5>Ease of Use</h5>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            
            </section>
            
            <section class="bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="testimonials-slider text-center">
                                <ul class="slides">
                                    <li>
                                        <p class="text-white lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        <span class="author text-white">John Doe - Graphic Designer</span>
                                    </li>
                                    
                                    <li>
                                        <p class="text-white lead">Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae sunt explicabo ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugi.</p>
                                        <span class="author text-white">Sarah Brown - UX Designer</span>
                                    </li>
                                    
                                    <li>
                                        <p class="text-white lead">Ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                        <span class="author text-white">Richard Hanson - Web developer</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="pricing-2">
                
                <div class="container">
                    <div class="row text-center">
                        <h1>Contact us</h1>
                    </div>
                    
                    <div class=" pricing-tables">
                        <div class="col-md-3"></div>
                        <div class="col-md-5">
                       <form>
                        <div class="form-group"></div>
                           <input type="text" class="form-control" name="" placeholder="Enter your name"><br>

                           <input type="email" class="form-control" name="" placeholder="Email" required><br>

                           <input type="text" class="form-control" name="" placeholder="Enter subject" required><br>

                           <textarea class="form-control" placeholder="enter your message"></textarea><br>
                            <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                       </form>
                        </div>
                    </div>
                </div>
            
            </section>
        </div>
        
        <div class="footer-container">
                    
            
                    
            <footer class="social bg-secondary-1">
            
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="text-white">Feel free to contact us</h1>
                            <a href="#" class="text-white"><strong>contact@cEmgraphicsKenya.com</strong></a><br>
                            <ul class="social-icons">
                                <li>
                                    <a href="#">
                                        <i class="icon social_twitter"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_facebook"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_instagram"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_dribbble"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_tumblr"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_pinterest"></i>
                                    </a>
                                </li>
                            </ul><br>
                            <span class="sub">© Copright 2019 Emgraphics. All Rights Reserved. </span>
                        </div>
                    </div>
                </div>
            
            </footer>
        </div>
        </div>

        <script src="https://www.youtube.com/iframe_api"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.plugin.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/skrollr.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/scrollReveal.min.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/twitterFetcher_v10_min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
