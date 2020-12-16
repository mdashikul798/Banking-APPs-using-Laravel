@section('assets')
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">


@endsection
@include('includes.header')





<div class="container" style="padding-bottom: 30px">

    <div class="row" style="margin-top: 50px; margin-bottom: 50px">
        <div class="col-xs-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            @if (Session::has('success'))
                <div class="alert alert-success" style="margin-top:12px">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center;font-size:12px">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <div style="padding-top: 30px;margin-bottom: 0px !important;">
                <p style="font-size: 17px;font-weight: 800;text-align: center;color: #337ab7">OFFRE DE FINANCEMENT RAPIDE POUR VOS BESOINS.</p>
            </div>
            <div style="padding-bottom: 5px;margin-top: -20px !important;">
                <p style="font-size: 17px;font-weight: 800;text-align: center">
                    Demandez de  <span style="color: firebrick">€3000</span>  à
                    <span style="color: firebrick">€2,000,000</span></p>
            </div>

            <form role="form" method="POST" action="{{route('creditapplication')}}">
                <input type="hidden" name="type" value="0">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-user"></i></span>
                            <input id="name" type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Entrez votre nom et prénom">
                        </div>
                        @csrf
                        @if ($errors->has('name'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row" style="margin-top:14px;margin-bottom:5px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-envelope"></i></span>
                            <input id="email" type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="Entrez votre Email">
                        </div>
                        @if ($errors->has('email'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row" style="margin-top:14px;margin-bottom:5px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-phone"></i></span>
                            <input id="phone" type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Numéro de téléphone">
                        </div>

                        @if ($errors->has('phone'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row" style="margin-top:14px">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-money"></i></span>
                            <input id="loan" type="text" class="form-control" value="{{ old('loan') }}" name="loan" placeholder="Montant de prêt">
                        </div>
                        @if ($errors->has('loan'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('loan') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="form-group"  style="margin-top:14px">
                    <div class="input-medium bfh-selectbox bfh-countries" data-country="@if(old('country')!=''){{old('country')}}@else{{'US'}}@endif" data-flags="true" data-name="country">
                        <input type="hidden" value="">
                        <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                            <span class="bfh-selectbox-option input-medium" data-option=""></span>
                            <b class="caret"></b>
                        </a>
                        <div class="bfh-selectbox-options">
                            <input type="text" class="bfh-selectbox-filter">
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

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment" name="address" placeholder="Adresse et code postal">{{ old('address') }}</textarea>
                        </div>
                        @if ($errors->has('address'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="message" id="comme" placeholder="Message">{{ old('message') }}</textarea>
                        </div>
                        @if ($errors->has('message'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>


                <div class="row" style="padding-bottom: 30px">
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-offset-3"><input style="color:white;font-size: 16px;padding-top: 11px;padding-bottom: 11px;;letter-spacing: 2px;" type="submit" value="VALIDER" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                </div>
                <marquee align="left" class="image-slide col-md-12 col-xs-12" style=" font-size:13px; padding:10px">
                    <img src="img/m.png" height="30">
                    <img style="margin-left:50px" height="30" src="img/w.png">
                    <img style="margin-left:50px" height="30" src="img/R.png">
                </marquee>
            </form>
        </div>
    </div>

<table>
<tbody>
<tr>
<td>&nbsp;
<p>Exemple de crédit personnel<br />(10 000€ sur 36 Mois hors assurance)</p>
<p>Pour un crédit personnel 10 000 € sur 36 mois au Taux Annuel Effectif Global fixe de 3,40%, vous remboursez : 36 mensualités de 292,35 €, montant total dû : 10 524,60 €, soit 524,60 € d'intérêts. 0 € Pour frais de dossier</p>
<p>Exemple représentatif<br />Prêt personnel de 500€ à 75000.<br />TAEG fixe de 1,79% à 19,99%,<br />taux débiteur fixe de 1,76% à 18,36%.<br />Conditions en vigueur au 22/11/2016. Durée de 6 à 120 mois. <br />Tous les taux proposés sont fixes et varient en fonction des types de prêts et varient en fonction du montant et durée</p>
<p>NB : Les institutions financières avec lesquelles nous collaborons offre un taux d’intérêt annuel de maximum de 19% . Celà explique que notre APR (Annual percentage rate) annuel est inférieur à 19%. Le remboursement de ce prêt est prévu qu’après 120 jours, à compter de la date d’émission du prêt.</p>
<p>Exemple de remboursement</p>
<p>Un prêt de 750€ payable aux deux semaines et remboursable en 10 versements vous coûtera 119.48 € par paiement.</p>
<p>Cette L'information est donnée pour fin d’exemple uniquement et considère un frais de dossier payable à l’agent officiel et courtier d’un montant de 380€ que l’emprunteur ajoute au capital emprunté. L’agent officiel et courtier détermine seul les frais et honoraires de chaque dossier à sa propre discrétion et ceux-ci sont indépendants des intérêts réclamés par le prêteur.</p>
<p>Implication d’un non-paiement</p>
<p>Effet sans provision : Des frais de cinquante dollars (50,00 €) seront exigés pour tout chèque ou tout paiement pré-autorisé sans provision. Votre institution financière vous chargera également un frais pour cette transaction sans provision.</p>
<p>Report de paiement : Dans le cas où le débiteur voudrait demander une modification à son entente initiale, des frais administratifs de 35,00 € seront facturés. Le débiteur doit avertir la compagnie au minimum 72 heures avant la date prévue du prélèvement.</p>
<p>Procédure de recouvrement et cote de crédit</p>
<p>Notre compagnie est conforme aux normes légales de Bahamas. Si une situation particulière se présente lors de votre période de remboursement, notre département de collection établira une entente de remboursement avec vous en tenant compte de votre situation. Advenant que le débiteur fasse défaut d’effectuer à échéance l’un des quelconques versements prévus au présent contrat, le créancier peut exiger le paiement intégral de tout solde impayé, capital, intérêts et frais. Tous les frais judiciaires et extrajudiciaires qui seront raisonnablement engagés lors de défauts au présent contrat seront réclamés au débiteur pour tout chèque ou paiement pré-autorisé retourné au créancier.</p>
<p>Dans l’éventualité où aucune entente de paiement n’est possible entre le débiteur et le créancier, le créancier peut assigner le dossier en agence de recouvrement, ce qui peut alors affecter la cote de crédit du débiteur.</p>
<p>Autres services et conditions</p>
<p>Renouvellement: Le renouvellement du prêt n’est pas automatique. Il se fera après que le client ait effectué la demande et que celle-ci ait été approuvée par notre compagnie.</p>
<p>Terme de remboursement : Les termes de remboursement de nos prêts varient entre 4 mois et plus</p>
<p>Procédure de recouvrement et cote de crédit</p>
<p>Notre compagnie est conforme aux normes légales canadiennes. Si une situation particulière se présente lors de votre période de remboursement, notre département de collection établira une entente de remboursement avec vous en tenant compte de votre situation. Advenant que le débiteur fasse défaut d’effectuer à échéance l’un des quelconques versements prévus au présent contrat, le créancier peut exiger le paiement intégral de tout solde impayé, capital, intérêts et frais. Tous les frais judiciaires et extrajudiciaires qui seront raisonnablement engagés lors de défauts au présent contrat seront réclamés au débiteur pour tout chèque ou paiement pré-autorisé retourné au créancier.</p>
<p>Dans l’éventualité où aucune entente de paiement n’est possible entre le débiteur et le créancier, le créancier peut assigner le dossier en agence de recouvrement, ce qui peut alors affecter la cote de crédit du débiteur.</p>
<p>Vous disposez d'un délai légal de rétractation de 14 jours.</p>
<p>En remplissant le formulaire ci-dessus vous accepter un prêt par crowdfunding dans le cas où aucun préteur privé semble être intéressé par votre dossier de demande de crédit</p>
</td>
</tr>
</tbody>
</table>

    <!-- Modal -->
    <!--<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <!--<div class="modal-dialog modal-lg">-->
    <!--<div class="modal-content">-->
    <!--<div class="modal-header">-->
    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
    <!--<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>-->
    <!--</div>-->
    <!--<div class="modal-body">-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--</div>-->
    <!--<div class="modal-footer">-->
    <!--<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>-->
    <!--</div>-->
    <!--</div>&lt;!&ndash; /.modal-content &ndash;&gt;-->
    <!--</div>&lt;!&ndash; /.modal-dialog &ndash;&gt;-->
    <!--</div>&lt;!&ndash; /.modal &ndash;&gt;-->
</div>





@include('includes.footer')