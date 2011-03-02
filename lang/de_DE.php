<?php
global $lang;

i18n::include_locale_file('events', 'en_US');

global $lang;

if(array_key_exists('de_DE', $lang) && is_array($lang['de_DE'])) {
    $lang['de_DE'] = array_merge($lang['en_US'], $lang['de_DE']);
} else {
    $lang['de_DE'] = $lang['en_US'];
}

$lang['de_DE']['General']['BACKTOOVERVIEW'] = 'Zurück zur Übersicht';

$lang['de_DE']['Event']['INFORMATION'] = 'Veranstaltungdaten';
$lang['de_DE']['Event']['DATE'] = 'Datum';
$lang['de_DE']['Event']['STARTTIME'] = 'um';
$lang['de_DE']['Event']['CITY'] = 'Ort';
$lang['de_DE']['Event']['READMORE'] = 'Mehr dazu...';

?>