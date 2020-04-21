<div class="wrap">
    <h2><?= __('Kontrola doručení na PSČ', 'lh_postcode_check') ?></h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'lh_postcode_options_group' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?= __('Kontroluji', 'lh_postcode_check') ?></th>
                <td>
                    <input type="text" name="lh_postcode_options[checking]" value="<?= get_option('lh_postcode_options')['checking']; ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?= __('Chybný formát', 'lh_postcode_check') ?></th>
                <td>
                    <textarea cols="100" name="lh_postcode_options[format]"><?= get_option('lh_postcode_options')['format']; ?></textarea>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?= __('Chyba při ověření', 'lh_postcode_check') ?></th>
                <td>
                    <textarea cols="100" name="lh_postcode_options[checking_error]"><?= get_option('lh_postcode_options')['checking_error']; ?></textarea>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?= __('Nedoručujeme', 'lh_postcode_check') ?></th>
                <td>
                    <textarea cols="100" name="lh_postcode_options[no_delivery]"><?= get_option('lh_postcode_options')['no_delivery']; ?></textarea>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?= __('Doručujeme', 'lh_postcode_check') ?></th>
                <td>
                    <textarea cols="100" name="lh_postcode_options[ok_delivery]"><?= get_option('lh_postcode_options')['ok_delivery']; ?></textarea>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?= __('Doručujeme za poplatek', 'lh_postcode_check') ?></th>
                <td>
                    <textarea cols="100" name="lh_postcode_options[ok_delivery_price]"><?= get_option('lh_postcode_options')['ok_delivery_price']; ?></textarea>
                </td>
            </tr>
        </table>
        <div >

        </div>
        <?php submit_button(); ?>
    </form>


</div>