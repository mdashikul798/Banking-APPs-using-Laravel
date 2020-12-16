@section('assets')
    <link href="{{URL::asset('css/legalterms.css')}}" rel="stylesheet">

@endsection
@include('includes.header')





<section id="legalnotices" class="wow fadeInUp" style="margin-top: 10px">

    <div class="container">

        <button class="btn" style="font-size: 25px;padding-bottom: 12px;padding-top: 12px;margin-top: 30px"><i class="fa fa-gavel" style="padding-right: 8px"></i> Remboursement</button>

        <div class="section-header" style="padding-top: 20px">
            <p style="text-align: justify;font-family: Cambay">
               Veuillez noter que la procédure peut prendre 30 jours ou un peu plus. Pour commencer la procédure de remboursement, vous devez d'abord écrire à notre directeur par courriel : director@groep-financien.com . 
            </p>
        </div>


        <div class="">
            <div id="accordion" class="panel-group">
                <div class="panel" style="margin-bottom: 2px;">
                    <div class="panel-heading" >
                        <h4 class="panel-title" style="text-align: left !important;  ">
                            <a   href="#panelBodyOne" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" style="background-color: #14C0D4;">    <span style="margin-left: 8px">Étape 2  </span>  </a>
                        </h4>
                    </div>
                    <div id="panelBodyOne" class="panel-collapse collapse">
                        <div class="panel-body" >
                            <p style="text-align: justify;font-family: Cambay">
                                Le directeur, qui n'est en fait qu'un intermédiaire entre vous et votre prêteur privé, communiquerait alors avec votre prêteur privé pour tenter de résoudre le problème. Si aucune réponse favorable n'est donnée par votre prêteur privé, l'administrateur procède à la procédure de remboursement. .

                        </div>
                    </div>
                </div>
                <div class="panel" style="margin-bottom:2px;">
                    <div class="panel-heading">
                        <h4 class="panel-title" style="text-align: left !important;  ">
                            <a href="#panelBodyTwo" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" style="background-color: #14C0D4;"><span style="margin-left: 8px">Étape 3</span>

                            </a>
                        </h4>
                    </div>
                    <div id="panelBodyTwo" class="panel-collapse collapse">
                        <div class="panel-body" style="  ">
                            <p style="text-align: justify;font-family: Cambay">
                                Il vous sera alors demandé de confirmer votre adresse domiciliaire, un chèque vous sera alors envoyé équivalent au montant qui doit vous être payé ou remboursé.

                        </div>
                    </div>
                </div>
                <div class="panel" style="margin-bottom: 2px;">
                    <div class="panel-heading">
                        <h4 class="panel-title" style="text-align: left !important;">
                            <a href="#panelBodyThree" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" style="background-color: #14C0D4;"><span style="margin-left: 8px">Étape 4</span>
                            </a>
                        </h4>
                    </div>
                    <div id="panelBodyThree" class="panel-collapse collapse">
                        <div class="panel-body" style="">
                            <p style="text-align: justify;font-family: Cambay">
                                Procédez à contacter le directeur par courriel maintenant.


                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="row" style="padding-top: 30px;padding-left: 30px">
            <div class=" col-xs-8 col-xs-offset-2 col-md-offset-2"  >


                <p style="font-family: Inconsolata;text-align: center;font-size: 16px;padding-bottom: 15px;color: white;padding-top: 15px;background-color:#0c2e8a"><b>-« Un crédit vous engage et doit être remboursé.
                        Vérifiez vos capacités de remboursement avant de vous engager. »</b></p><br>




            </div>



        </div>

    </div>
</section><!-- #legalnotice -->







@include('includes.footer')