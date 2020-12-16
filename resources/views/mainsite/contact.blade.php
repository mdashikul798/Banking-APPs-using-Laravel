@include('includes.header')




<section class="global-page-header" style="padding-top: 50px !important;">
    <div class="container">
        <div class="row" style="">
            <div class="col-md-12" >
                <div class="block" >
                    <h2 style="margin-bottom: 0px;">Contact</h2>
                    <p style="margin-top: 0px !important;"><a href="index.html" style="color: white ;">
                            <i class="ion-ios-home"></i>
                            Accueil</a> / <a href="{{url('/')}}"  style="color: darkslategray ;">Contact</a></p>
                </div>
            </div>
        </div>
    </div>
</section>



<!--
==================================================
    Contact Section Start
================================================== -->

<section id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                     @if (Session::has('success'))
                    <div class="alert alert-success" style="margin-top:12px">
                        <ul>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <li style="list-style: none;text-align: center;font-size:12px">{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                    <h2 class="subtitle wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Remplissez le formulaire pour nous contacter</h2>
                    <hr>
                    <div class="contact-form">
                        <form id="contact-form" method="POST" action="{{route('contact_us')}}" role="form">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                                <input type="text" placeholder="Entrez votre nom et Prénom" value="{{ old('name') }}" class="form-control" name="name" id="name">
                                @if ($errors->has('name'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".8s">
                                <input type="email" placeholder="Entrez votre email" value="{{ old('email') }}" class="form-control" name="email" id="email" >
                                @if ($errors->has('email'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1s">
                                <input type="text" placeholder="Numéro de téléphone" value="{{ old('contact') }}" class="form-control" name="contact" >
                                @if ($errors->has('contact'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @csrf

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1s">
                                <div class="input-medium bfh-selectbox bfh-countries" data-country="@if(old('country')!=''){{old('country')}}@else{{'US'}}@endif" data-flags="true" data-name="country">



                                    <input type="hidden" name="country"   >
                                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                                        <span class="bfh-selectbox-option input-medium" data-option=""></span>
                                        <b class="caret"></b>
                                    </a>
                                    <div class="bfh-selectbox-options">
                                        <input type="text"  class="bfh-selectbox-filter">
                                        <div role="listbox">
                                            <ul role="option">
                                            </ul>
                                        </div>
                                    </div>
                                    @if ($errors->has('country'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.2s">
                                <textarea rows="6" placeholder="Adresse et code postal" class="form-control" name="address" id="address">{{ old('address') }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.2s">
                                <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message">{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div id="submit" class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.4s">
                                <input type="submit" id="contact-submit" class="btn btn-default btn-send" value="Envoyer un message">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-area">
                    <h2 class="subtitle  wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Nous trouver</h2>
                    <hr>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.277552998015!2d90.3678744!3d23.773128800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0ae4adf3cb9%3A0x7f2cf443b764e4a4!2sShishu+Mela!5e0!3m2!1sen!2s!4v1435516022247" width="100%" height="556" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                </div>
            </div>
        </div>
        <div class="row address-details">
            <div class="col-md-3">
                <div style="height: 190px" class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                    <i class="ion-ios-location-outline"></i>
                    <h5>55 st Nassau, Bahamas <br>Bahamas</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div style="height: 190px" class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".5s">
                    <i class="ion-ios-location-outline"></i>
                    <h5>55 st Nassau, Bahamas <br>Bahamas</h5>
                </div>
            </div>
            <div class="col-md-3" >
                <div style="height: 190px" class="email wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".7s">
                    <i class="ion-ios-email-outline"></i>
                    <p>inter-cadi@groep-financien.com<br>director@groep-financien.com</p>
                </div>
            </div>
            <div class="col-md-3">
                <div style="height: 190px" class="phone wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".9s">
                    <i class="ion-ios-telephone-outline"></i>
                    <p> +33 756 88 12 06<br> FAX : +33 756 88 72 06</p>
                </div>
            </div>
        </div>
    </div>
</section>




<!--
==================================================
Call To Action Section Start
================================================== -->
<section id="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">Qu'est-ce que tu en penses?</h2>
                    <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                    <a href="{{url('contact')}}"" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact avec moi</a>
                </div>
            </div>

        </div>
    </div>
</section>



@include('includes.footer')