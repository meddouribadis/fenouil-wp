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
        'required'    => false,
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

		<p class="form-row form-row-wide" id="billing_categorie_socio_pro_field" data-priority="25">
		<label for="billing_categorie_socio_pro" class="">Catégorie socioprofessionnelle&nbsp;<span class="optional">(facultatif)</span></label>
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
		
    </table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'billing_birth_date', $_POST['billing_birth_date']);
    update_user_meta( $user_id, 'billing_categorie_socio_pro', $_POST['billing_categorie_socio_pro']);
}