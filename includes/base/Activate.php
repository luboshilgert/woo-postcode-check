<?php
namespace Inc\Base;

class Activate{
    
    public static function activate(){
        if (!get_option('lh_postcode_options')){
            $lh_options = array(
                'checking' => 'Kontroluji...',
                'format' => 'Chybný formát PSČ, zadávejte prosím 5 čísel bez mezery (např. 12345).',
                'checking_error' => 'Ověření se nezdařilo. Prosím zkuste to později znovu nebo nám napište na <a href="mailto:objednavky@kytkyodpotoka.cz">objednavky@kytkyodpotoka.cz</a> a pokusíme se vám vyhovět.',
                'no_delivery' => 'Bohužel na toto místo momentálně nedoručujeme. Pokud si myslíte že bychom měli, napište nám vaši objednávku e-mailem na <a href="mailto:objednavky@kytkyodpotoka.cz">objednavky@kytkyodpotoka.cz</a> a pokusíme se vám vyhovět.',
                'ok_delivery' => 'Výborně! Na toto místo vaši čerstvou kytici doručíme velmi rádi.',
                'ok_delivery_price' => 'Výborně! Na toto místo vaši čerstvou kytici doručíme velmi rádi za <span id="lh_postcode_costs"></span> Kč.'
                
            );
            update_option('lh_postcode_options', $lh_options);           
        }
    }
    
}
