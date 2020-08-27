<form <?php print html_attr($form['attr']); ?>>

<?php  foreach($form['fields'] as $field_id => $field): ?>

    <input <?php print input_attr($field_id, $field); ?>>
    
<?php endforeach; ?>

</form>