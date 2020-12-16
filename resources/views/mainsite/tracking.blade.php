@include('includes.header')






<main id="main">

    <!--==========================
      About Section
    ============================-->


    <!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2>Suivi</h2>
                <p>ous pouvez suivre l'état de votre dossier ou d'un envoi de colis avec la rubrique ci-dessous. Il suffit de mettre votre numéro de suivie dans la casse et de cliquez sur valider
</p>
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
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s" >
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-8 offset-md-3 offset-sm-3 offset-1">
                    <form method="POST" action="{{route('viewtrackfilerequest')}}">
                        @csrf
                        <h1 style="text-align: center;color: #0C2E8A;font-weight: 700">Entrez votre code de suivi </h1>
                        <div class="input-group">
                            <input id="" type="number" min="0" value="{{ old('tracking_code') }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="tracking_code" placeholder="">
                        <span class="input-group-btn">
    <button class="btn btn-primary" type="submit" style="font-size: 12px;
    padding: 7px; padding-right: 15px;padding-left: 15px">Track</button>
  </span>
                        </div>

                        @if (Session::has('failed'))
                            <div class="alert alert-danger">
                                <ul style="margin-top: 5px">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <li style="list-style: none;text-align: center">{!! Session::get('failed') !!}</li>
                                </ul>
                            </div>
                        @endif

                        @if ($errors->has('tracking_code'))
                            <span class="" style="color:red;font-size: 14px">
                                        <strong>{{ $errors->first('tracking_code') }}</strong>
                                    </span>
                        @endif

                    </form>
                </div>
            </div>
        </div>

    </section>
    <!--==========================
      Clients Section
    ============================-->

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
                <h2>Témoignages</h2>
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

  


    <!--legal notices-->

    <!--==========================
      Contact Section
    ============================-->

</main>






@include('includes.footer')