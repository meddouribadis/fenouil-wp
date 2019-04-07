<?php

add_filter( 'woocommerce_billing_fields', 'add_birth_date_billing_field', 10, 1 );
function add_birth_date_billing_field($billing_fields) {

    $billing_fields['billing_birth_date'] = array(
        'type'        => 'date',
        'label'       => __('Date de naissance', 'woocommerce'),
        'class'       => array('form-row-wide'),
        'priority'    => 25,
        'required'    => true,
        'clear'       => true,
    );
	
	
    $billing_fields['billing_categorie_socio_pro'] = array(
        'type'        => 'select',
		'options'	  => array( 'etudiant' => 'Etudiant', 'employe' => 'Employé', 'ouvrier' => 'Ouvrier', 'profintermediaire' => 'Professions intermédiaires', 'cadre' => 'Cadre', 'chefdentreprise' => 'Chefs d\'entreprise ou Artisans commerçants', 'agriculteur' => 'Agriculteurs exploitants'),
        'label'       => __('Catégorie socioprofessionnelle', 'woocommerce'),
        'class'       => array('form-row-wide'),
        'priority'    => 25,
        'required'    => true,
    );
	
	    $billing_fields['billing_departement'] = array(
			'type'        => 'select',
			'options'	  => array( '00' => 'Hors France', '01' => 'Ain', '02' => 'Aisne', '03' => 'Allier', '04' => 'Alpes de Haute Provence', '05' => 'Hautes Alpes', '06' => 'Alpes Maritimes', '07' => 'Ardèche', '08' => 'Ardennes', '09' => 'Ariège', '10' => 'Aube', '11' => 'Aude', '12' => 'Aveyron', '13' => 'Bouches du Rhône', '14' => 'Calvados', '15' => 'Cantal', '16' => 'Charente', '17' => 'Charente Maritime', '18' => 'Cher', '19' => 'Corrèze', '20' => 'Haute-Corse', '21' => 'Côte d\'Or', '22' => 'Côtes d\'Armor', '23' => 'Creuse', '24' => 'Dordogne', '25' => 'Doubs', '26' => 'Drôme', '27' => 'Eure', '28' => 'Eure et Loir', '29' => 'Finistère', '30' => 'Gard', '31' => 'Haute Garonne', '32' => 'Gers', '33' => 'Gironde', '34' => 'Hérault', '35' => 'Ille et Vilaine', '36' => 'Indre', '37' => 'Indre et Loire', '38' => 'Isère', '39' => 'Jura', '40' => 'Landes', '41' => 'Loir et Cher', '42' => 'Loire', '43' => 'Haute Loire', '44' => 'Loire Atlantique', '45' => 'Loiret', '46' => 'Lot', '47' => 'Lot et Garonne', '48' => 'Lozère', '49' => 'Maine et Loire', '50' => 'Manche', '51' => 'Marne', '52' => 'Haute Marne', '53' => 'Mayenne', '54' => 'Meurthe et Moselle', '55' => 'Meuse', '56' => 'Morbihan', '57' => 'Moselle', '58' => 'Nièvre', '59' => 'Nord', '60' => 'Oise', '61' => 'Orne', '62' => 'Pas de Calais', '63' => 'Puy de Dôme', '64' => 'Pyrénées Atlantiques', '65' => 'Hautes Pyrénées', '66' => 'Pyrénées Orientales', '67' => 'Bas Rhin', '68' => 'Haut Rhin', '69' => 'Rhône', '70' => 'Haute Saône', '71' => 'Saône et Loire', '72' => 'Sarthe', '73' => 'Savoie', '74' => 'Haute Savoie', '75' => 'Paris', '76' => 'Seine Maritime', '77' => 'Seine et Marne', '78' => 'Yvelines', '79' => 'Deux Sèvres', '80' => 'Somme', '81' => 'Tarn', '82' => 'Tarn et Garonne', '83' => 'Var', '84' => 'Vaucluse', '85' => 'Vendée', '86' => 'Vienne', '87' => 'Haute Vienne', '88' => 'Vosges', '89' => 'Yonne', '90' => 'Territoire de Belfort', '91' => 'Essonne', '92' => 'Hauts de Seine', '93' => 'Seine Saint Denis', '94' => 'Val de Marne', '95' => 'Val d\'Oise', '971' => 'Guadeloupe', '972' => 'Martinique', '973' => 'Guyane', '974' => 'Réunion', '975' => 'Saint Pierre et Miquelon', '976' => 'Mayotte'),
			'label'       => __('Département', 'woocommerce'),
			'class'       => array('form-row-wide'),
			'priority'    => 25,
			'required'    => true,
		);
	
    return $billing_fields;
}


function wooc_extra_register_fields() {?>
       <p class="form-row form-row-wide">
       <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
       <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
       </p>
       <p class="form-row form-row-first">
       <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
       </p>
       <p class="form-row form-row-last">
       <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
       </p>

       <p class="form-row form-row-last">
       <label for="reg_billing_birth_date">Date de naissance<span class="required">*</span></label>
       <input type="date" class="input-text" name="billing_birth_date" id="billing_birth_date" value="<?php if ( ! empty( $_POST['billing_birth_date'] ) ) esc_attr_e( $_POST['billing_birth_date'] ); ?>" />
       </p>

       <p class="form-row form-row-last">
       <label for="reg_billing_address_1"><?php _e( 'Address', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" />
       </p>


       <p class="form-row form-row-last">
		<label for="reg_billing_address_2">Complément <span class="optional">(facultatif)</span></label>
       <input type="text" class="input-text" name="billing_address_2" id="reg_billing_address_2" value="<?php if ( ! empty( $_POST['billing_address_2'] ) ) esc_attr_e( $_POST['billing_address_2'] ); ?>" />
       </p>

       <p class="form-row form-row-last">
       <label for="reg_billing_city"><?php _e( 'City', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_city" id="reg_billing_city" value="<?php if ( ! empty( $_POST['billing_city'] ) ) esc_attr_e( $_POST['billing_city'] ); ?>" />
       </p>

       <p class="form-row form-row-last">
       <label for="reg_billing_postcode"><?php _e( 'Postcode', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php if ( ! empty( $_POST['billing_postcode'] ) ) esc_attr_e( $_POST['billing_postcode'] ); ?>" />
       </p>

       <p class="form-row form-row-last">
       <label for="reg_billing_country"><?php _e( 'Country', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_country" id="reg_billing_country" value="<?php if ( ! empty( $_POST['billing_country'] ) ) esc_attr_e( $_POST['billing_country'] ); ?>" />
       </p>

       <p class="form-row form-row-last">
       <label for="reg_billing_state"><?php _e( 'State', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_state" id="reg_billing_state" value="<?php if ( ! empty( $_POST['billing_state'] ) ) esc_attr_e( $_POST['billing_state'] ); ?>" />
       </p>

		<p class="form-row form-row-wide" id="billing_departement_field" data-priority="25">
		<label for="billing_departement" class="">Département<span class="optional">*</span></label>
		<span class="woocommerce-input-wrapper">
			<select name="billing_departement" id="billing_departement" class="select " data-placeholder="">
			<option value="00">(00) Hors France</option>
			<option value="01">(01) Ain </option>
			<option value="02">(02) Aisne </option>
			<option value="03">(03) Allier </option>
			<option value="04">(04) Alpes de Haute Provence </option>
			<option value="05">(05) Hautes Alpes </option>
			<option value="06">(06) Alpes Maritimes </option>
			<option value="07">(07) Ardèche </option>
			<option value="08">(08) Ardennes </option>
			<option value="09">(09) Ariège </option>
			<option value="10">(10) Aube </option>
			<option value="11">(11) Aude </option>
			<option value="12">(12) Aveyron </option>
			<option value="13">(13) Bouches du Rhône </option>
			<option value="14">(14) Calvados </option>
			<option value="15">(15) Cantal </option>
			<option value="16">(16) Charente </option>
			<option value="17">(17) Charente Maritime </option>
			<option value="18">(18) Cher </option>
			<option value="19">(19) Corrèze </option>
			<option value="20">(20) Haute-Corse </option>
			<option value="21">(21) Côte d'Or </option>
			<option value="22">(22) Côtes d'Armor </option>
			<option value="23">(23) Creuse </option>
			<option value="24">(24) Dordogne </option>
			<option value="25">(25) Doubs </option
			><option value="26">(26) Drôme </option>
			<option value="27">(27) Eure </option>
			<option value="28">(28) Eure et Loir </option>
			<option value="29">(29) Finistère </option>
			<option value="30">(30) Gard </option>
			<option value="31">(31) Haute Garonne </option>
			<option value="32">(32) Gers </option>
			<option value="33">(33) Gironde </option>
			<option value="34">(34) Hérault </option>
			<option value="35">(35) Ille et Vilaine </option>
			<option value="36">(36) Indre </option>
			<option value="37">(37) Indre et Loire </option>
			<option value="38">(38) Isère </option>
			<option value="39">(39) Jura </option>
			<option value="40">(40) Landes </option>
			<option value="41">(41) Loir et Cher </option>
			<option value="42">(42) Loire </option>
			<option value="43">(43) Haute Loire </option>
			<option value="44">(44) Loire Atlantique </option>
			<option value="45">(45) Loiret </option>
			<option value="46">(46) Lot </option>
			<option value="47">(47) Lot et Garonne </option>
			<option value="48">(48) Lozère </option>
			<option value="49">(49) Maine et Loire </option>
			<option value="50">(50) Manche </option>
			<option value="51">(51) Marne </option>
			<option value="52">(52) Haute Marne </option>
			<option value="53">(53) Mayenne </option>
			<option value="54">(54) Meurthe et Moselle </option>
			<option value="55">(55) Meuse </option>
			<option value="56">(56) Morbihan </option>
			<option value="57">(57) Moselle </option>
			<option value="58">(58) Nièvre </option>
			<option value="59">(59) Nord </option>
			<option value="60">(60) Oise </option>
			<option value="61">(61) Orne </option>
			<option value="62">(62) Pas de Calais </option>
			<option value="63">(63) Puy de Dôme </option>
			<option value="64">(64) Pyrénées Atlantiques </option>
			<option value="65">(65) Hautes Pyrénées </option>
			<option value="66">(66) Pyrénées Orientales </option>
			<option value="67">(67) Bas Rhin </option>
			<option value="68">(68) Haut Rhin </option>
			<option value="69">(69) Rhône </option>
			<option value="70">(70) Haute Saône </option>
			<option value="71">(71) Saône et Loire </option>
			<option value="72">(72) Sarthe </option>
			<option value="73">(73) Savoie </option>
			<option value="74">(74) Haute Savoie </option>
			<option value="75">(75) Paris </option>
			<option value="76">(76) Seine Maritime </option>
			<option value="77">(77) Seine et Marne </option>
			<option value="78">(78) Yvelines </option>
			<option value="79">(79) Deux Sèvres </option>
			<option value="80">(80) Somme </option>
			<option value="81">(81) Tarn </option>
			<option value="82">(82) Tarn et Garonne </option>
			<option value="83">(83) Var </option>
			<option value="84">(84) Vaucluse </option>
			<option value="85">(85) Vendée </option>
			<option value="86">(86) Vienne </option>
			<option value="87">(87) Haute Vienne </option>
			<option value="88">(88) Vosges </option>
			<option value="89">(89) Yonne </option>
			<option value="90">(90) Territoire de Belfort </option>
			<option value="91">(91) Essonne </option>
			<option value="92">(92) Hauts de Seine </option>
			<option value="93">(93) Seine Saint Denis </option>
			<option value="94">(94) Val de Marne </option>
			<option value="95">(95) Val d'Oise </option>
			<option value="971">(971) Guadeloupe </option>
			<option value="972">(972) Martinique </option>
			<option value="973">(973) Guyane </option>
			<option value="974">(974) Réunion </option>
			<option value="975">(975) Saint Pierre et Miquelon </option>
			<option value="976">(976) Mayotte </option>
			</select>
		</span>
		</p>

		<p class="form-row form-row-wide" id="billing_categorie_socio_pro_field" data-priority="25">
		<label for="billing_categorie_socio_pro" class="">Catégorie socioprofessionnelle&nbsp;<span class="optional">*</span></label>
		<span class="woocommerce-input-wrapper">
			<select name="billing_categorie_socio_pro" id="billing_categorie_socio_pro" class="select " data-placeholder="">
				<option value="etudiant" selected="selected">Etudiant</option>
				<option value="employe">Employé</option>
				<option value="ouvrier">Ouvrier</option>
				<option value="profintermediaire">Professions intermédiaires</option>
				<option value="cadre">Cadre</option>
				<option value="chefdentreprise">Chefs d'entreprise ou Artisans commerçants</option>
				<option value="agriculteur">Agriculteurs exploitants</option>
			</select>
		</span>
		</p>

       <div class="clear"></div>
       <?php
 }
 add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

 /**
* register fields Validating.
*/
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
           $validation_errors->add( 'billing_first_name_error', __( '<strong>Erreur</strong>: Votre prénom doit être remplis!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
           $validation_errors->add( 'billing_last_name_error', __( '<strong>Erreur</strong>: Votre nom de famille doit être remplis!', 'woocommerce' ) );
    }
       return $validation_errors;
}
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

function wooc_save_extra_register_fields( $customer_id ) {
      if ( isset( $_POST['billing_phone'] ) ) {
                 // Phone input filed which is used in WooCommerce
                 update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
      }
      if ( isset( $_POST['billing_first_name'] ) ) {
             //First name field which is by default
             update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
             // First name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
      }
      if ( isset( $_POST['billing_last_name'] ) ) {
             // Last name field which is by default
             update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
             // Last name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
      }
	
	//Adding fields
	
			if ( isset( $_POST['billing_categorie_socio_pro'] ) ) {
             update_user_meta( $customer_id, 'billing_categorie_socio_pro', $_POST['billing_categorie_socio_pro']);
      }
	
				if ( isset( $_POST['billing_departement'] ) ) {
             update_user_meta( $customer_id, 'billing_departement', $_POST['billing_departement']);
      }
		
			if ( isset( $_POST['billing_birth_date'] ) ) {
             update_user_meta( $customer_id, 'billing_birth_date', $_POST['billing_birth_date']);
      }
	
	      if ( isset( $_POST['billing_address_1'] ) ) {
             update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
			 update_user_meta( $customer_id, 'shipping_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
      }
	
		      if ( isset( $_POST['billing_address_2'] ) ) {
             update_user_meta( $customer_id, 'billing_address_2', sanitize_text_field( $_POST['billing_address_2'] ) );
			 update_user_meta( $customer_id, 'shipping_address_2', sanitize_text_field( $_POST['billing_address_2'] ) );
      }
	
		  if ( isset( $_POST['billing_city'] ) ) {
             update_user_meta( $customer_id, 'billing_city', sanitize_text_field( $_POST['billing_city'] ) );
      }
	
		     
			if ( isset( $_POST['billing_postcode'] ) ) {
             update_user_meta( $customer_id, 'billing_postcode', sanitize_text_field( $_POST['billing_postcode'] ) );
      }
	
			if ( isset( $_POST['billing_country'] ) ) {
             update_user_meta( $customer_id, 'billing_country', sanitize_text_field( $_POST['billing_country'] ) );
      }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Module publicité", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="billing_birth_date"><?php _e("Date de naissance"); ?></label></th>
        <td>
			<?php $date = get_user_meta($user->ID,'billing_birth_date')[0]; ?>
            <input type="date" name="billing_birth_date" id="billing_birth_date" value="<?php echo $date; ?>"/><br />
            <span class="description"><?php _e("Entrez une date de naissance");?></span>
        </td>
    </tr>
		
	<tr>
        <th><label for="billing_categorie_socio_pro" class="">Catégorie socioprofessionnelle&nbsp;</label></th>
        <td>
			<?php
			$a = get_user_meta($user->ID, 'billing_categorie_socio_pro');
			?>
			
			<span class="woocommerce-input-wrapper">
				<select name="billing_categorie_socio_pro" id="billing_categorie_socio_pro" class="select " data-placeholder="">
					<option value="" <?php if(strcmp($a[0], '') == 0){echo 'selected="selected"';} ?>>Non Renseigné</option>
					<option value="etudiant" <?php if(strcmp($a[0], 'etudiant') == 0){echo 'selected="selected"';} ?>>Etudiant</option>
					<option value="employe" <?php if(strcmp($a[0], 'employe') == 0){echo 'selected="selected"';} ?>>Employé</option>
					<option value="ouvrier" <?php if(strcmp($a[0], 'ouvrier') == 0){echo 'selected="selected"';} ?>>Ouvrier</option>
					<option value="profintermediaire" <?php if(strcmp($a[0], 'profintermediaire') == 0){echo 'selected="selected"';} ?>>Professions intermédiaires</option>
					<option value="cadre" <?php if(strcmp($a[0], 'cadre') == 0){echo 'selected="selected"';} ?>>Cadre</option>
					<option value="chefdentreprise" <?php if(strcmp($a[0], 'chefdentreprise') == 0){echo 'selected="selected"';} ?>>Chefs d'entreprise ou Artisans commerçants</option>
					<option value="agriculteur" <?php if(strcmp($a[0], 'agriculteur') == 0){echo 'selected="selected"';} ?>>Agriculteurs exploitants</option>
				</select>
            </span>

        </td>
    </tr>
		
		
	<tr>
        <th><label for="billing_departement" class="">Département</label></th>
        <td>
			<?php
			$b = get_user_meta($user->ID, 'billing_departement');
			?>
			<span class="woocommerce-input-wrapper">
				<select name="billing_departement" id="billing_departement" class="select " data-placeholder="">
					<option value="00" <?php if(strcmp($b[0], '00') == 0){echo 'selected="selected"';} ?>>Hors France</option>
					<option value="01" <?php if(strcmp($b[0], '01') == 0){echo 'selected="selected"';} ?>>Ain</option>
					<option value="02" <?php if(strcmp($b[0], '02') == 0){echo 'selected="selected"';} ?>>Aisne</option>
					<option value="03" <?php if(strcmp($b[0], '03') == 0){echo 'selected="selected"';} ?>>Allier</option>
					<option value="04" <?php if(strcmp($b[0], '04') == 0){echo 'selected="selected"';} ?>>Alpes de Haute Provence</option>
					<option value="05" <?php if(strcmp($b[0], '05') == 0){echo 'selected="selected"';} ?>>Hautes Alpes</option>
					<option value="06" <?php if(strcmp($b[0], '06') == 0){echo 'selected="selected"';} ?>>Alpes Maritimes</option>
					<option value="07" <?php if(strcmp($b[0], '07') == 0){echo 'selected="selected"';} ?>>Ardèche</option>
					<option value="08" <?php if(strcmp($b[0], '08') == 0){echo 'selected="selected"';} ?>>Ardennes</option>
					<option value="09" <?php if(strcmp($b[0], '09') == 0){echo 'selected="selected"';} ?>>Ariège</option>
					<option value="10" <?php if(strcmp($b[0], '10') == 0){echo 'selected="selected"';} ?>>Aube</option>
					<option value="11" <?php if(strcmp($b[0], '11') == 0){echo 'selected="selected"';} ?>>Aude</option>
					<option value="12" <?php if(strcmp($b[0], '12') == 0){echo 'selected="selected"';} ?>>Aveyron</option>
					<option value="13" <?php if(strcmp($b[0], '13') == 0){echo 'selected="selected"';} ?>>Bouches du Rhône</option>
					<option value="14" <?php if(strcmp($b[0], '14') == 0){echo 'selected="selected"';} ?>>Calvados</option>
					<option value="15" <?php if(strcmp($b[0], '15') == 0){echo 'selected="selected"';} ?>>Cantal</option>
					<option value="16" <?php if(strcmp($b[0], '16') == 0){echo 'selected="selected"';} ?>>Charente</option>
					<option value="17" <?php if(strcmp($b[0], '17') == 0){echo 'selected="selected"';} ?>>Charente Maritime</option>
					<option value="18" <?php if(strcmp($b[0], '18') == 0){echo 'selected="selected"';} ?>>Cher</option>
					<option value="19" <?php if(strcmp($b[0], '19') == 0){echo 'selected="selected"';} ?>>Corrèze</option>
					<option value="20" <?php if(strcmp($b[0], '20') == 0){echo 'selected="selected"';} ?>>Haute-Corse</option>
					<option value="21" <?php if(strcmp($b[0], '21') == 0){echo 'selected="selected"';} ?>>Côte d'Or</option>
					<option value="22" <?php if(strcmp($b[0], '22') == 0){echo 'selected="selected"';} ?>>Côtes d'Armor</option>
					<option value="23" <?php if(strcmp($b[0], '23') == 0){echo 'selected="selected"';} ?>>Creuse</option>
					<option value="24" <?php if(strcmp($b[0], '24') == 0){echo 'selected="selected"';} ?>>Dordogne</option>
					<option value="25" <?php if(strcmp($b[0], '25') == 0){echo 'selected="selected"';} ?>>Doubs</option>
					<option value="26" <?php if(strcmp($b[0], '26') == 0){echo 'selected="selected"';} ?>>Drôme</option>
					<option value="27" <?php if(strcmp($b[0], '27') == 0){echo 'selected="selected"';} ?>>Eure</option>
					<option value="28" <?php if(strcmp($b[0], '28') == 0){echo 'selected="selected"';} ?>>Eure et Loir</option>
					<option value="29" <?php if(strcmp($b[0], '29') == 0){echo 'selected="selected"';} ?>>Finistère</option>
					<option value="30" <?php if(strcmp($b[0], '30') == 0){echo 'selected="selected"';} ?>>Gard</option>
					<option value="31" <?php if(strcmp($b[0], '31') == 0){echo 'selected="selected"';} ?>>Haute Garonne</option>
					<option value="32" <?php if(strcmp($b[0], '32') == 0){echo 'selected="selected"';} ?>>Gers</option>
					<option value="33" <?php if(strcmp($b[0], '33') == 0){echo 'selected="selected"';} ?>>Gironde</option>
					<option value="34" <?php if(strcmp($b[0], '34') == 0){echo 'selected="selected"';} ?>>Hérault</option>
					<option value="35" <?php if(strcmp($b[0], '35') == 0){echo 'selected="selected"';} ?>>Ille et Vilaine</option>
					<option value="36" <?php if(strcmp($b[0], '36') == 0){echo 'selected="selected"';} ?>>Indre</option>
					<option value="37" <?php if(strcmp($b[0], '37') == 0){echo 'selected="selected"';} ?>>Indre et Loire</option>
					<option value="38" <?php if(strcmp($b[0], '38') == 0){echo 'selected="selected"';} ?>>Isère</option>
					<option value="39" <?php if(strcmp($b[0], '39') == 0){echo 'selected="selected"';} ?>>Jura</option>
					<option value="40" <?php if(strcmp($b[0], '40') == 0){echo 'selected="selected"';} ?>>Landes</option>
					<option value="41" <?php if(strcmp($b[0], '41') == 0){echo 'selected="selected"';} ?>>Loir et Cher</option>
					<option value="42" <?php if(strcmp($b[0], '42') == 0){echo 'selected="selected"';} ?>>Loire</option>
					<option value="43" <?php if(strcmp($b[0], '43') == 0){echo 'selected="selected"';} ?>>Haute Loire</option>
					<option value="44" <?php if(strcmp($b[0], '44') == 0){echo 'selected="selected"';} ?>>Loire Atlantique</option>
					<option value="45" <?php if(strcmp($b[0], '45') == 0){echo 'selected="selected"';} ?>>Loiret</option>
					<option value="46" <?php if(strcmp($b[0], '46') == 0){echo 'selected="selected"';} ?>>Lot</option>
					<option value="47" <?php if(strcmp($b[0], '47') == 0){echo 'selected="selected"';} ?>>Lot et Garonne</option>
					<option value="48" <?php if(strcmp($b[0], '48') == 0){echo 'selected="selected"';} ?>>Lozère</option>
					<option value="49" <?php if(strcmp($b[0], '49') == 0){echo 'selected="selected"';} ?>>Maine et Loire</option>
					<option value="50" <?php if(strcmp($b[0], '50') == 0){echo 'selected="selected"';} ?>>Manche</option>
					<option value="51" <?php if(strcmp($b[0], '51') == 0){echo 'selected="selected"';} ?>>Marne</option>
					<option value="52" <?php if(strcmp($b[0], '52') == 0){echo 'selected="selected"';} ?>>Haute Marne</option>
					<option value="53" <?php if(strcmp($b[0], '53') == 0){echo 'selected="selected"';} ?>>Mayenne</option>
					<option value="54" <?php if(strcmp($b[0], '54') == 0){echo 'selected="selected"';} ?>>Meurthe et Moselle</option>
					<option value="55" <?php if(strcmp($b[0], '55') == 0){echo 'selected="selected"';} ?>>Meuse</option>
					<option value="56" <?php if(strcmp($b[0], '56') == 0){echo 'selected="selected"';} ?>>Morbihan</option>
					<option value="57" <?php if(strcmp($b[0], '57') == 0){echo 'selected="selected"';} ?>>Moselle</option>
					<option value="58" <?php if(strcmp($b[0], '58') == 0){echo 'selected="selected"';} ?>>Nièvre</option>
					<option value="59" <?php if(strcmp($b[0], '59') == 0){echo 'selected="selected"';} ?>>Nord</option>
					<option value="60" <?php if(strcmp($b[0], '60') == 0){echo 'selected="selected"';} ?>>Oise</option>
					<option value="61" <?php if(strcmp($b[0], '61') == 0){echo 'selected="selected"';} ?>>Orne</option>
					<option value="62" <?php if(strcmp($b[0], '62') == 0){echo 'selected="selected"';} ?>>Pas de Calais</option>
					<option value="63" <?php if(strcmp($b[0], '63') == 0){echo 'selected="selected"';} ?>>Puy de Dôme</option>
					<option value="64" <?php if(strcmp($b[0], '64') == 0){echo 'selected="selected"';} ?>>Pyrénées Atlantiques</option>
					<option value="65" <?php if(strcmp($b[0], '65') == 0){echo 'selected="selected"';} ?>>Hautes Pyrénées</option>
					<option value="66" <?php if(strcmp($b[0], '66') == 0){echo 'selected="selected"';} ?>>Pyrénées Orientales</option>
					<option value="67" <?php if(strcmp($b[0], '67') == 0){echo 'selected="selected"';} ?>>Bas Rhin</option>
					<option value="68" <?php if(strcmp($b[0], '68') == 0){echo 'selected="selected"';} ?>>Haut Rhin</option>
					<option value="69" <?php if(strcmp($b[0], '69') == 0){echo 'selected="selected"';} ?>>Rhône</option>
					<option value="70" <?php if(strcmp($b[0], '70') == 0){echo 'selected="selected"';} ?>>Haute Saône</option>
					<option value="71" <?php if(strcmp($b[0], '71') == 0){echo 'selected="selected"';} ?>>Saône et Loire</option>
					<option value="72" <?php if(strcmp($b[0], '72') == 0){echo 'selected="selected"';} ?>>Sarthe</option>
					<option value="73" <?php if(strcmp($b[0], '73') == 0){echo 'selected="selected"';} ?>>Savoie</option>
					<option value="74" <?php if(strcmp($b[0], '74') == 0){echo 'selected="selected"';} ?>>Haute Savoie</option>
					<option value="75" <?php if(strcmp($b[0], '75') == 0){echo 'selected="selected"';} ?>>Paris</option>
					<option value="76" <?php if(strcmp($b[0], '76') == 0){echo 'selected="selected"';} ?>>Seine Maritime</option>
					<option value="77" <?php if(strcmp($b[0], '77') == 0){echo 'selected="selected"';} ?>>Seine et Marne</option>
					<option value="78" <?php if(strcmp($b[0], '78') == 0){echo 'selected="selected"';} ?>>Yvelines</option>
					<option value="79" <?php if(strcmp($b[0], '79') == 0){echo 'selected="selected"';} ?>>Deux Sèvres</option>
					<option value="80" <?php if(strcmp($b[0], '80') == 0){echo 'selected="selected"';} ?>>Somme</option>
					<option value="81" <?php if(strcmp($b[0], '81') == 0){echo 'selected="selected"';} ?>>Tarn</option>
					<option value="82" <?php if(strcmp($b[0], '82') == 0){echo 'selected="selected"';} ?>>Tarn et Garonne</option>
					<option value="83" <?php if(strcmp($b[0], '83') == 0){echo 'selected="selected"';} ?>>Var</option>
					<option value="84" <?php if(strcmp($b[0], '84') == 0){echo 'selected="selected"';} ?>>Vaucluse</option>
					<option value="85" <?php if(strcmp($b[0], '85') == 0){echo 'selected="selected"';} ?>>Vendée</option>
					<option value="86" <?php if(strcmp($b[0], '86') == 0){echo 'selected="selected"';} ?>>Vienne</option>
					<option value="87" <?php if(strcmp($b[0], '87') == 0){echo 'selected="selected"';} ?>>Haute Vienne</option>
					<option value="88" <?php if(strcmp($b[0], '88') == 0){echo 'selected="selected"';} ?>>Vosges</option>
					<option value="89" <?php if(strcmp($b[0], '89') == 0){echo 'selected="selected"';} ?>>Yonne</option>
					<option value="90" <?php if(strcmp($b[0], '90') == 0){echo 'selected="selected"';} ?>>Territoire de Belfort</option>
					<option value="91" <?php if(strcmp($b[0], '91') == 0){echo 'selected="selected"';} ?>>Essonne</option>
					<option value="92" <?php if(strcmp($b[0], '92') == 0){echo 'selected="selected"';} ?>>Hauts de Seine</option>
					<option value="93" <?php if(strcmp($b[0], '93') == 0){echo 'selected="selected"';} ?>>Seine Saint Denis</option>
					<option value="94" <?php if(strcmp($b[0], '94') == 0){echo 'selected="selected"';} ?>>Val de Marne</option>
					<option value="95" <?php if(strcmp($b[0], '95') == 0){echo 'selected="selected"';} ?>>Val d'Oise</option>
					<option value="971" <?php if(strcmp($b[0], '971') == 0){echo 'selected="selected"';} ?>>Guadeloupe</option>
					<option value="972" <?php if(strcmp($b[0], '972') == 0){echo 'selected="selected"';} ?>>Martinique</option>
					<option value="973" <?php if(strcmp($b[0], '973') == 0){echo 'selected="selected"';} ?>>Guyane</option>
					<option value="974" <?php if(strcmp($b[0], '974') == 0){echo 'selected="selected"';} ?>>Réunion</option>
					<option value="975" <?php if(strcmp($b[0], '975') == 0){echo 'selected="selected"';} ?>>Saint Pierre et Miquelon</option>
					<option value="976" <?php if(strcmp($b[0], '976') == 0){echo 'selected="selected"';} ?>>Mayotte</option>
				</select>
            </span>
        </td>
    </tr>
		
    </table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
	update_user_meta( $user_id, 'billing_departement', $_POST['billing_departement']);
    update_user_meta( $user_id, 'billing_birth_date', $_POST['billing_birth_date']);
    update_user_meta( $user_id, 'billing_categorie_socio_pro', $_POST['billing_categorie_socio_pro']);
}