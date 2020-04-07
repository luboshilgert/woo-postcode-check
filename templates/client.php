<form id="lh_postcode_check" method="post">
    <div class="row">
        <div class="col-sm-4">
            <input id="lh_postcode_input" type="text" maxlength="5" name="lh_postcode">
        </div>
        <div class="col-sm-4">
            <input type="submit" value="Zkontrolovat">
        </div>
    </div>
</form>
<div id="lh_postcode_check_result_processing" class="lh_check_result" style="display: none"><?= get_option('lh_postcode_options')['checking']; ?></div>
<div id="lh_postcode_check_result_format" class="lh_check_result_err lh_check_result" style="display: none"><?= get_option('lh_postcode_options')['format']; ?></div>
<div id="lh_postcode_check_result_other" class="lh_check_result" style="display: none"><?= get_option('lh_postcode_options')['checking_error']; ?></div>
<div id="lh_postcode_check_result_ok" class="lh_check_result_ok lh_check_result" style="display: none"><?= get_option('lh_postcode_options')['ok_delivery']; ?></div>
<div id="lh_postcode_check_result_err" class="lh_check_result" style="display: none"><?= get_option('lh_postcode_options')['no_delivery']; ?></div>

