<?php include 'includes/header.php'?>

<body>

<!-- Start Header -->
<header>
    <!-- Start Mainmenu -->
    <div class="menu-area navbar-fixed-top ">
        <div class="container">
            <div class="row">
                <div class="mainmenu-wrapper">
                    <!-- Start Header Logo -->
                    <div class="col-xs-12 col-md-5">
                        <div class="header-logo">
                            <h2><a href="index.php">Home / Contact us</a></h2>
                        </div>
                    </div>
                    <!-- End Header Logo -->
                    <!-- Start Navigation -->
                    <div class="col-xs-12 col-md-7">
                        <div class="mainmenu">
                            <div class="navbar navbar-right">
                                <div class="navbar-header visible-xs">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse top-menu">
                                    <nav>
                                        <ul class="nav navbar-nav">
                                            <li class=""><a href="index.php" >Home</a></li>
                                            <li><a href="about-us.php" >About Us</a></li>
                                            <li><a href="round-details.php">Round Details</a></li>
                                            <li><a href="/submit">Submission</a></li>
                                            <li><a href="contact.php" class="btn-default" >Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Navigation -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu -->
    <!-- Start Mobile Menu Area -->
    <div class="col-xs-12 visible-xs">
        <div class="mobile-menu">
            <nav>
                <ul class="nav navbar-nav">
                    <li class=""><a href="index.php" >Home</a></li>
                    <li><a href="about-us.php" >About Us</a></li>
                    <li><a href="round-details.php">Round Details</a></li>
                    <li><a href="/submit">Submission</a></li>
                    <li><a href="contact.php" class="btn-default" >Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End MObile Menu Area -->
</header>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    $website = $_POST['web'];
    $message = $_POST['message'];
    $to      = 'info.ewubc@gmail.com';
    $subject = 'Brand Aid 2018 Website Contact';
    $headers = array(
        'From' => $email,
        'Reply-To' => $to,
        'X-Mailer' => 'PHP/' . phpversion()
    );

    if(mail($to, $subject, $message, $headers)){
        echo "<script>alert('Thank you for reaching us!')</script>";
    }
}
?>
    <!-- Start Contact Info -->
    <div class="contact-info-area themeix-ptb">
        <div class="container">
            <div class="row">
                <div class="contact-info-wrapper">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="themeix-subsection">
                                    <h1 class="themeix-h1">East West University Business Club</h1>
                                    <h3 class="themeix-h3">It's not an opportunity, it's life time experience</h3>
                                    <p>East West University Business Club(EWUBC) is the first club of the university with the aim to promote leadership and entrepreneurship of dexterous students. The club works with the all phases of business to practice and determine management skills under the intellectual supervision of spotlessly competent moderators. Since 1999, EWUBC has been putting efforts for students to practice creativity, teamwork, leadership, idea sharing and so much more.EWUBC functions on grooming programs for students about presentation skill development, Microsoft Excel, career talk, business competitions etc. EWUBC appreciates students by organizing many events, seminars and competitions.</p>
                                    <br>
                                    <h3 class="themeix-h3">Send us your thoughts!</h3>
                                    <p>If you are thinking something out of the box, dont hesitate to share it with us!</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="contact-form">
                                <form action="#">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name *" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 ">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email *" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" name="tel" id="phone" placeholder="Phone" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="web" id="web" placeholder="website" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="write here message here."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="themeix-btn hover-bg">send message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Info -->
    <!-- Start Call To Action Area -->

<?php include 'includes/footer.php'?>