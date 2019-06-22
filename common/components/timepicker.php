<?php
function librariesTimepicker(){
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <?php
}
/*
function timepicker($id, $label){
    */?><!--
    <label for="<?php /*print($id); */?>" style="width: 12rem"><?php /*print($label); */?></label>
    <input id="<?php /*print($id); */?>" width="276"/>
    <script>
        $('#<?php /*print($id); */?>').timepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    --><?php
/*}*/


function timepicker($id, $label, $value){
    ?>
    <label for="<?php print($id); ?>" style="width: 12rem"><?php print($label); ?></label>
    <input id="<?php print($id); ?>" width="276" value="<?php print($value); ?>"/>
    <script>
        $('#<?php print($id); ?>').timepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    <?php
}
?>
