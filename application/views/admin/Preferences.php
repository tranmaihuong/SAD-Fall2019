<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$yesNoOptions = array(
	'yes' => 'Yes',
	'no' => 'No'
);
?>

<?= form_open('admin/preferences',
	array('class' => 'card my-2')) ?>
<div class="card-body">
	<h5 class="card-title">Website Preferences</h5>
	<div class="card-text">
		<?= form_error(
			'db_err',
			'<div class="form-group text-danger">',
			'</div>'); ?>
		<div class="form-group">
			<?php
			echo form_label('Title', 'tbxTitle');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxTitle',
				'id' => 'tbxTitle',
				'value' => isset($pref->siteTitle)
					? $pref->siteTitle
					: set_value('tbxTitle'),
			));
			echo form_error(
				'tbxTitle',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Phone Number', 'tbxPhoneNumber');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxPhoneNumber',
				'id' => 'tbxPhoneNumber',
				'value' => isset($pref->phoneNumber)
					? $pref->phoneNumber
					: set_value('tbxPhoneNumber'),
			));
			echo form_error(
				'tbxPhoneNumber',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Email', 'tbxEmail');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxEmail',
				'id' => 'tbxEmail',
				'value' => isset($pref->email) ? $pref->email : set_value('tbxEmail'),
			));
			echo form_error(
				'tbxEmail',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Address', 'tbxAddress');
			echo form_textarea(array(
				'class' => 'form-control',
				'name' => 'tbxAddress',
				'id' => 'tbxAddress',
				'rows' => 1,
				'value' => isset($pref->address) ? $pref->address : set_value('tbxAddress'),
			));
			echo form_error(
				'tbxAddress',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Facebook', 'tbxFaceBookUrl');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxFaceBookUrl',
				'id' => 'tbxFaceBookUrl',
				'value' => isset($pref->facebookUrl)
					? $pref->facebookUrl
					: set_value('tbxFaceBookUrl'),
			));
			echo form_error(
				'tbxFaceBookUrl',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Instagram', 'tbxInstagramUrl');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxInstagramUrl',
				'id' => 'tbxInstagramUrl',
				'value' => isset($pref->instagramUrl)
					? $pref->instagramUrl
					: set_value('tbxInstagramUrl'),
			));
			echo form_error(
				'tbxInstagramUrl',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Twitter', 'tbxTwitterUrl');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxTwitterUrl',
				'id' => 'tbxTwitterUrl',
				'value' => isset($pref->twitterUrl)
					? $pref->twitterUrl
					: set_value('tbxTwitterUrl'),
			));
			echo form_error(
				'tbxTwitterUrl',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Email Confirmation', 'slEmailConfirmation');
			echo form_dropdown(
				'slEmailConfirmation',
				$yesNoOptions,
				isset($pref->isEmailConfirmationRequired)
					? $pref->isEmailConfirmationRequired
					: set_value('slEmailConfirmation'),
				array(
					'class' => 'custom-select',
					'name' => 'slEmailConfirmation',
					'id' => 'slEmailConfirmation',
				));
			echo form_error(
				'tbxTwitterUrl',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Captcha', 'slCaptcha');
			echo form_dropdown(
				'slCaptcha',
				$yesNoOptions,
				isset($pref->isCaptchaEnabled)
					? $pref->isCaptchaEnabled
					: set_value('slCaptcha'),
				array(
					'class' => 'custom-select',
					'name' => 'slCaptcha',
					'id' => 'slCaptcha',
				));
			echo form_error(
				'tbxTwitterUrl',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
	</div>
</div>
<div class="card-footer text-right">
	<?= form_button(array(
		'type' => 'submit',
		'class' => 'btn btn-sm btn-outline-dark',
		'content' => 'Submit'
	)); ?>
</div>
<?= form_close() ?>
