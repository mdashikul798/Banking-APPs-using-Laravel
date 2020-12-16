<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'name' => [
            'required' => 'Veuillez entrer votre nom en premier',
        ],
        'email' =>[
            'required'=> 'Veuillez entrer le premier email',
            'unique'=>'Ce courriel est déjà pris',
            'email'=> 'Veuillez entrer un email valide'
        ],
        'password'=>[
            'required' =>'Veuillez entrer le mot de passe',
            'confirmed'=>'Mot de passe de confirmation non assorti',
            'min'=> 'Le mot de passe doit être de 6 chracters de long'
        ],
        'password_confirmation'=>[
            'required'=>'La confirmation du mot de passe est requise'
        ],
        'age'=>[
            'required'=>'Plese entrez votre âge d\'abord',
            'numeric'=>'L\'âge doit être numérique'
        ],'phone'=>[
            'required'=>'Veuillez entrer le premier téléphone',
            'phone'=>'s\'il vous plait entrez un numéro de téléphone valide eg:+33644644000'
        ],
        'address'=>[
            'required'=>'Veuillez entrer l\'adresse d\'abord',
        ],
        'postal_code'=>[
            'required'=>'Veuillez entrer le code postal d\'abord',
        ],
        'country'=>[
            'required'=>'Veuillez entrer le pays d\'abord',
        ],
        'account_type'=>[
            'required' =>'Veuillez sélectionner le type de compte',
        ],
        'profile_image'=>[
            'mimes'=>'L\'image de profil doit être de type png,jpg,jpeg'
        ],
        'account_number'=>[
            'required'=>'Numéro de compte requis'
        ],
        'tracking_code'=>[
            'required'=>'czxczxc'
        ],
        'professional_status'=>[
            'required'=>'Veuillez entrer le statut professionnel d\'abord'
        ],
        'occupational_activity'=>[
            'required'=>'Veuillez entrer l\'activité professionnelle en premier'
        ],
        'taux_type'=>[
            'required' =>'S\'il vous plaît entrez taux type d\'abord'
        ],
        'loan_rate'=>[
            'required'=>'Veuillez entrer le taux de prêt d\'abord'
        ],
        'loan_type'=>[
            'required'=>'S\'il vous plaît entrez loan_type premier'
        ],
        'image'=>[
            'required'=>'l\'image doit être de type png,jpg,jpeg'
        ],
        'credit_apply'=>[
            'required'=>'la demande de crédit est requise'
        ],
        'usertype'=>[
            'required'=>'Le type d\'utilisateur est requis'
        ],
        'description'=>[
            'required'=>'La description est requise'
        ],
        'comment'=>[
            'required'=>'La Commentaire est requise'
        ],
        'direction'=>[
            'required'=>'La direction est requise'
        ],
        'bank_name'=>[
            'required'=>'Le nom de la Banque est requis'
        ],
        'amount'=>[
            'required'=>'Le montant est requis',
            'numeric'=>'le montant doit être numérique'
        ],
        'credit_amount'=>[
            'required'=>'Le montant du crédit est requis',
            'numeric'=>'Le montant du crédit doit être numérique'
        ],
        'debit_amount'=>[
            'required'=>'Le montant du débit est requis',
            'numeric'=>'Le montant du débit doit être numérique'
        ],
        'code1'=>[
            'numeric'=>'Le code doit être numérique'
        ],
        'code2'=>[
            'numeric'=>'Le code doit être numérique'
        ],
        'code3'=>[
            'numeric'=>'Le code doit être numérique'
        ],
        'contact'=>[
            'required'=>'Le contact est requis',
            'numeric'=>'Le contact doit être numérique'
        ],
        'message'=>[
            'required'=>'message requis'
        ],
        'loan'=>[
            'required'=>'Loa est nécessaire',
            'numeric'=>'Le prêt doit être numérique'
        ],
        'old_password'=>[
            'required'=>'Ancien mot de passe est nécessaire'
        ],
        'new_password'=>[
            'required'=>'Nouveau mot de passe requis',
            'different'=>'Le mot de passe doit être différent de l\'ancien mot de passe',
            'min'=>'Le mot de passe doit être de 6 chracters de long',
            'confirmed'=>'Mot de passe de confirmation non assorti'

        ],
        'new_password_confirmation'=>[
            'required'=>'La confirmation du mot de passe est requise'
        ],
        'code_iban'=>[
            'numeric'=>'Le code IBAN doit être numérique'
        ],
        'code_bic'=>[
            'required'=>'Code BIC is required'
        ],
        'bank'=>[
            'required'=>'Banque est nécessaire'
        ],
        'bank_address'=>[
            'required'=>'Adresse bancaire requise'
        ],
        'holder_name'=>[
            'required'=>'le nom du détenteur est requis'
        ],
        'code'=>[
            'required'=>'Code est requis'
        ],
        'notice1'=>[
            'max'=>'Remarquez que l\'on ne peut pas avoir plus de 27 caractères'
        ],
        'notice2'=>[
            'max'=>'Remarquez que l\'on ne peut pas avoir plus de 10 caractères'
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
