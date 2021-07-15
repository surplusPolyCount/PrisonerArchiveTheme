<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin: 0 !important;">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php wp_title(''); ?></title>

        <!-- favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="theme-color" content="#ffffff">

        <!-- dependencies -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/6855ac6852.js" crossorigin="anonymous"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700i&display=swap" rel="stylesheet">

        <!-- stylesheet -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="webfonts/bostontraffic_regular_macroman/stylesheet.css" type="text/css" charset="utf-8" />
        <!-- logo fade-in -->
        <script>
            $(document).scroll(function() {
                var y = $(this).scrollTop();
                if (y > 48) {
                    $('#logo').fadeIn();
                }
                else {
                    $('#logo').fadeOut();
                }
            });

        </script>
        <?php wp_head();?> 
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top border-bottom">
            <!-- mobile hamburger -->
            <button class="navbar-toggler btn btn-hamburger btn-light outline-none pl-1 pr-1 mr-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div>
                    <div class="hamburger"></div>
                    <div class="hamburger"></div>
                    <div class="hamburger"></div>
                </div>
            </button>
            <!-- mobile logo -->
            <a class="navbar-brand d-md-none" href="/"><img style="height: 37px; width: auto;" src="/images/mini2.svg"></a>

            <!-- collapsable items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- featured -->
                    <li class="nav-item d-md-none">
                        <a class="text-danger nav-link pl-4" href="/home/">Home</a>
                    </li>
                    <!-- dropdown -->
                    <li class="nav-item dropdown">
                        <!-- mobile dropdown toggler -->
                        <a class="nav-link dropdown-toggle text-dark pl-4 d-md-none" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Issue Archive
                        </a>
                        <!-- desktop dropdown toggler -->
                        <button class="btn btn-hamburger btn-light outline-none d-none d-md-inline pr-1 pl-1 mr-1" href="#" id="navbarDropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div>
                                <div class="hamburger"></div>
                                <div class="hamburger"></div>
                                <div class="hamburger"></div>
                            </div>
                        </button>
                        <!-- dropdown menu -->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="text-danger dropdown-item d-none d-md-block" href="/home/">Home</a>
                            <div class="dropdown-divider d-none d-md-block"></div>
                            <a class="dropdown-item pl-5" href="https://localhost/wordpress/?page_id=67">PenPals</a>
                            <a class="dropdown-item pl-5" href="https://localhost/wordpress/?page_id=65">Contact Us</a>
                        </div>
                    </li>
                    <!-- mobile items -->
                    <li class="nav-item d-md-none">
                        <a class="text-dark nav-link pl-4 cursor-pointer" role="button" href="/calendar/">Calendar</a>
                    </li> 
                    <li class="nav-item d-md-none">
                        <a class="text-dark nav-link pl-4 cursor-pointer" role="button" data-toggle="modal" data-target="#contact-us">Contact Us</a>
                    </li>
                    <!-- search -->
                    <li class="nav-item">
                        <form name="s" class="form-inline pl-2" role="search" method="get" action="/">
                            <input class="form-control" id="s" type="text" name="s" placeholder="Search" aria-label="Search">
                            <a name="s" class="btn-search" type="submit" href="#" onclick="document.forms['s'].submit(); return false;"><i class="fas fa-search"></i></a -->
                        </form>
                    </li>
                </ul>

                <!-- desktop logo -->
                <a class="navbar-brand p-0 m-0 d-none d-md-inline outline-none" href="/"><img id="logo" style="display: none; height: 37px; width: auto;" src="/images/mini2.svg"></a>

                <!-- desktop buttons -->
                <ul class="navbar-nav ml-auto d-none d-md-flex">
			<!-- to center the logo --> <li style="width: 75px;"> </li>
                    <li class="nav-item">
                        <a class="btn btn-light btn-head" href="/calendar/">Calendar</a>
                    </li> 
			
                    <li class="nav-item pl-3">
                        <button type="button" class="btn btn-light btn-head" data-toggle="modal" data-target="#contact-us">Contact Us</button>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- mailing list modal -->
        <div class="modal" id="mailing-list" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Join our mailing list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>By becoming a member of our mailing list, you will recieve updates on what's going on in the insurgent community. No spam or selling your address!</p>
              </div>
              <div class="modal-footer px-3">
                <form class="form-inline w-100 justify-content-center" method="post" action="/misc-php/emailRegister.php">
                    <input type="email" class="form-control mx-2 my-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <input type="submit" class="btn btn-primary mx-2 my-2" value="Submit">
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- contact info modal -->
        <div class="modal" id="contact-us" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Contact Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <strong>Email</strong>
                <p><a href="mailto:insurgentuo@gmail.com">insurgentuo@gmail.com</a></p>
                <strong>Mailing address</strong>
                <p>
                    The Student Insurgent <br>
                    1228 University of Oregon <br>
                    Eugene OR 97403 <br>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
<?php /* <!-- important alert / unfinished site warning-->
<!-- can be used for angela davis as well as for if there's a direct action going on or something else important af. -->
<div class="mx-auto w-50 alert alert-primary alert-dismissible fade show fixed-top" role="alert" style="margin-top: 65px;">
  <p><strong>This site is undergoing maintenance!</strong></p> Things may not work and content may be missing.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
*/ ?>

        <!-- homepage header -->
        <div class="pt-3">
            <div class="row mx-auto border-thick justify-content-center w-extra" id="headerimg">
                <a href="/"><img style="width: 420px;" src="/images/banner.svg"></a>
            </div>
            <div class="row w-extra mx-auto justify-content-sm-center font-weight-bold border-bottom nav-scroller">
                <nav class="nav pl-5 py-2 text-uppercase align-items-center">
                    <a class="header-item-primary px-2" role="button" href="/home/">Home</a>
                    <a class="header-item px-2" role="button" href="https://localhost/wordpress/?page_id=67">PenPals</a>
                    <a class="header-item px-2" role="button" href="https://localhost/wordpress/?page_id=65">Contact Us</a>
                </nav>
            </div>
        </div>
