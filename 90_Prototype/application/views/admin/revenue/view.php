<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?= form_open('Admin_RevenueController/create_post') ;
echo ('<h2>Revenue Statistics</h2>');?>
</br>
<?php
echo form_label('From');
echo form_input(['name' => 'fromTime','type' => 'date', "<?php echo set_value('fromTime'); ?>"]);
?>

</br>
<?php
echo form_label('To');
echo form_input(['name' => 'toTime','type' => 'date', "<?php echo set_value('toTime'); ?>"]);
?>

</br>
<?php
echo form_label('Filter');
$data_radio1 = array(
  'name' => 'filter',
  'value' => 'Monthly',
  'checked' => TRUE,
  );
  echo form_radio($data_radio1);
  echo form_label('Monthly');
  $data_radio2 = array(
  'name' => 'filter',
  'value' => 'Annual',
  );
  echo form_radio($data_radio2);
  echo form_label('Annual');
  ?>

</br>
<?php
//create submit button
echo form_submit('submit', 'Submit', "class='submit'");


//close form tag
 echo form_close(); ?>