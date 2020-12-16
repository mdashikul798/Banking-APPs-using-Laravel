
@include('includes.header')





<section id="intro">

    <div class="intro-content">
        <h2>CADI <span> FINANCE GROUPE</span><br></h2>
        <p>VOTRE PLATEFORME DE FINANCEMENT DE CRÉDIT INTERNATIONAL,</p>
        <div>
            <a href="login.html"  class="btn btn-primary" style="background-color:#31008B !important ;border:0px">s'identifier</a>
            <a href="signup.html" class="btn btn-primary" style="background-color:#50D8AF !important ;border:0px">s'inscrire</a>
        </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
        <div class="item" style="background-image: {{URL::asset('img/intro-carousel/1.jpg')}};"></div>
        <div class="item" style="background-image: {{URL::asset('img/intro-carousel/2.jpg')}};"></div>
        <div class="item" style="background-image: {{URL::asset('img/intro-carousel/3.jpg')}};"></div>
        <div class="item" style="background-image: {{URL::asset('img/intro-carousel/4.jpg')}};"></div>
        <div class="item" style="background-image: {{URL::asset('img/intro-carousel/5.jpg')}};"></div>
    </div>

</section><!-- #intro -->

<main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 about-img">
                    <img src="img/about-img.jpg" alt="">
                </div>

                <div class="col-lg-6 content">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                    <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>

                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                    </ul>

                </div>
            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2>Services</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="box wow fadeInLeft" >
                        <div class="icon"><i class="fa fa-building-o"></i></div>
                        <h4 class="title"><a href="">CADI GROUPE</a></h4>
                        <p class="description">La banque populaire de crédit et d'investissement. Nous sommes les spécialistes dans le domaine de financement et nous offrons le meilleur taux d'intérêt sans le besoin d'une banque. Nos taux sont très bas et fixe</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box wow fadeInRight" >
                        <div class="icon"><i class="fa fa-handshake-o"></i></div>
                        <h4 class="title"><a href="">INVESTISSEMENT</a></h4>
                        <p class="description" style="padding-bottom: 23px">Besoin de financement projet? Notre prestation principale est le financement de projets internationaux à des compagnies, des entreprises etc.. dans tous secteurs d'activités</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s" style="height: 240px">
                        <div class="icon"><i class="fa fa-object-group"></i></div>
                        <h4 class="title"><a href="">ASSURANCES</a></h4>
                        <p class="description">Parce qu’il est essentiel à vos besoins , Finance Plus vous accompagne au quotidien. Protégez-vous en cas de décès accidentel, ou d'invalidité suite à un accident. Protégez-vous en cas de perte d'emploi</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box wow fadeInRight" data-wow-delay="0.2s" >
                        <div class="icon"><i class="fa fa-shield"></i></div>
                        <h4 class="title"><a href="">ANTI-FRAUDES</a></h4>
                        <p class="description" style="padding-bottom: 23px">Nous avons une garantie de remboursement 100% en cas de fraude en ligne. Protection contre les fraudes par courriel et l'hameçonnage. Nous assurons la sécurité de vos renseignements personnels</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="box wow fadeInRight" data-wow-delay="0.2s" >
                        <div class="icon"><i class="fa fa-credit-card-alt"></i></div>
                        <h4 class="title"><a href="">LES COMPTES DU GROUPE CADI</a></h4>
                        <p class="description">Frais de tenue de compte mensuel très bas. Pour accéder aux Services bancaires en ligne, vous aurez besoin de votre numéro de compte et votre mot de passe. Vous devrez répondre à des étapes de sécurité s'ils s'avèrent nécessaires. Gérer votre argent où que vous soyez et garder un œil sur votre compte bancaire 24h/24 avec les services de banque en ligne par internet et sur mobile. Créer votre compte maintenant.</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- #services -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Clients</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>

            <div class="owl-carousel clients-carousel">
                <img src="{{URL::asset('img/clients/client-1.png') }}" alt="">
                <img src="{{URL::asset('img/clients/client-2.png') }}" alt="">
                <img src="{{URL::asset('img/clients/client-3.png') }}" alt="">
                <img src="{{URL::asset('img/clients/client-4.png') }}" alt="">
                <img src="{{URL::asset('img/clients/client-5.png') }}" alt="">
                <img src="{{URL::asset('img/clients/client-6.png') }}" alt="">
                <img src="{{URL::asset('img/clients/client-7.png') }}" alt="">
                <img src="{{URL::asset('img/clients/client-8.png') }}" alt="">
            </div>

        </div>
    </section><!-- #clients -->

    <!--==========================
      Our Portfolio Section
    ============================-->
    /
    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Testimonials</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>
            <div class="owl-carousel testimonials-carousel">

                <div class="testimonial-item">
                    <p>
                        <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                        <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                    <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                    <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                    <img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                        <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                    <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                    <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>

            </div>

        </div>
    </section><!-- #testimonials -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Call To Action</h3>
                    <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Call To Action</a>
                </div>
            </div>

        </div>
    </section><!-- #call-to-action -->



    <section id="progress" class="wow fadeInUp" style="margin-top: 20px">
        <div class="container">
            <div class="section-header">
                <h2>Our Progress</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>
            <div class="row" style="margin-top: 60px">
                <div class="col-lg-3 col-md-6 fadeInLeft">
                    <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                        <div class="progress-value">90%</div>
                    </div>
                    <h5 style="text-align: center;padding-top: 10px">Development</h5>
                </div>

                <div class="col-lg-3 col-md-6 fadeInLeft">
                    <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                        <div class="progress-value">80%</div>
                    </div>
                    <h5 style="text-align: center;padding-top: 10px">Development</h5>

                </div>

                <div class="col-lg-3 col-md-6 fadeInLeft">
                    <div class="progress pink">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                        <div class="progress-value">75%</div>
                    </div>
                    <h5 style="text-align: center;padding-top: 10px">Development</h5>
                </div>

                <div class="col-lg-3 col-md-6 fadeInLeft">
                    <div class="progress green">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                        <div class="progress-value">85%</div>
                    </div>
                    <h5 style="text-align: center;padding-top: 10px">Development</h5>          </div>
            </div>

        </div>
    </section><!-- #progress -->

    <!--==========================
      Our Team Section
    ============================-->
    <section id="team" class="wow fadeInUp" style="margin-bottom: 90px !important;">
        <div class="container">
            <div class="section-header">
                <h2>Our Team</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 ">
                    <div class="member">
                        <div class="pic"><img src="img/team-1.jpg" alt=""></div>
                        <div class="details">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <div class="social">
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="img/team-2.jpg" alt=""></div>
                        <div class="details">
                            <h4>Sarah Jhinson</h4>
                            <span>Product Manager</span>
                            <div class="social">
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="img/team-3.jpg" alt=""></div>
                        <div class="details">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                            <div class="social">
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="img/team-4.jpg" alt=""></div>
                        <div class="details">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                            <div class="social">
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- #team -->


    <!--legal notices-->

    <!--==========================
      Contact Section
    ============================-->

</main>






@include('includes.footer')