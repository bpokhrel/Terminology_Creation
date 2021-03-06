<?php
require_once 'db.php';

//get value of language selected
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_GET['q']);
$search_string = $test_db->real_escape_string($search_string);

$lang= array(
'en' => array('en'),
'ach'=>array('ach','bm','tt','bs','fa','hr'),
'af'=>array('af','nl','de','da','nb','sv'),
'ak'=>array('ak','lg','ln','ny','rn','rw'),
'am'=>array('am','he','hr','ha'),
'an'=>array('an','ca','es','gl','pt','fr'),
'ar'=>array('ar','he','am','ha'),
// 'as'=>array('as','bn','or','gu','hi','ur'),
'az'=>array('az','tk','tr','tt','uz','kk'),
'bg'=>array('bg','mk','bs','hr','sl','sr'),
'bm'=>array('bm','tn','ts','nd','ss','xh'),
'bn'=>array('bn','or','gu','hi','ur'),
'br'=>array('br','cy','ga','ca','an','es'),
'bs'=>array('bs','hr','sl','sr','bg','mk'),
'ca'=>array('ca','an','es','gl','pt','fr'),
'cy'=>array('cy','br','ga','ca','an','es'),
'da'=>array('da','nb','sv','fo','af'),
'de'=>array('de','af','nl','da','nb','sv'),
'dsb'=>array('dsb','hsb','pl','sk','uk','bs'),
'es'=>array('es','gl','pt','ca','an','fr'),
'eu'=>array('eu'),
'fa'=>array('fa','ku','ps','ks','sd','np'),
'ff'=>array('ff','wo','tn','ts','nd','ss'),
'fj'=>array('fj','haw','sm','id','mg','ms'),
'fo'=>array('fo','da','nb','sv'),
'fr'=>array('fr','wa','vec','ca','an','es'),
'ga'=>array('ga','br','cy','ca','an','es'),
'gl'=>array('gl','pt','es','ca','an','fr'),
'gnBO'=>array('gnBO','gnPY'),
'gnPY'=>array('gnPY','gnBO'),
'gu'=>array('gu','hi','ur','pa','ks','sd'),
'ha'=>array('ha','am','ar','he'),
'haw'=>array('haw','sm','fj','id','mg','ms'),
'he'=>array('he','ar','am','ha'),
'hi'=>array('hi','ur','gu','pa','ks','sd'),
'hr'=>array('hr','bs','sl','sr','bg','mk'),
'hsb'=>array('hsb','dsb','pl','sk','uk','bs'),
'ht'=>array('ht','fr','wa'),
'hu'=>array('hu'),
'hy'=>array('hy','sq','uk','bg','mk','bs'),
'id'=>array('id','ms','su','mg','tl','fj'),
// 'is'=>array('is','da','nb','sv','af','nl'),
'it'=>array('it','fr','wa','vec','ca','an'),
'kk'=>array('kk','az','tk','tr','tt','ug'),
'km'=>array('km','vi'),
'kn'=>array('kn','ml','ta','te'),
'ko'=>array('ko'),
'ks'=>array('ks','sd','np','mr','si'),
'ku'=>array('ku','fa','ps','ks','sd','np'),
'lg'=>array('lg','rn','rw','nd','ss','xh'),
'ln'=>array('ln','tn','ts','nd','ss','xh'),
'lt'=>array('lt','lv','br','cy','ga','da'),
'lv'=>array('lv','lt','br','cy','ga','da'),
'mg'=>array('mg','id','ms','su','tl','fj'),
'mk'=>array('mk','bg','bs','hr','sl','sr'),
'ml'=>array('ml','ta','kn','te'),
'mr'=>array('mr','ks','sd','np','si'),
'ms'=>array('ms','id','su','mg','tl','fj'),
'my'=>array('my','ach','az','kn','lg','ln'),
'nb'=>array('nb','da','sv','fo','af'),
'nd'=>array('nd','ss','xh','zu','lg','ln'),
'np'=>array('np','ks','sd','mr','si'),
'nl'=>array('nl','af','de','da','nb','sv'),
'ny'=>array('ny','tn','ts','nd','ss','xh'),
'or'=>array('or','bn','gu','hi','ur'),
'pa'=>array('pa','gu','hi','ur','ks','sd'),
'pl'=>array('pl','dsb','hsb','sk','uk','bs'),
'ps'=>array('ps','fa','ku','ks','sd','np'),
'pt'=>array('pt','gl','es','ca','an','fr'),
'rn'=>array('rn','lg','rw','nd','ss','xh'),
'ro'=>array('ro','it','fr','wa','vec','ca'),
'rw'=>array('rw','lg','rn','nd','ss','xh'),
'sd'=>array('sd','ks','np','mr','si'),
'si'=>array('si','ks','sd','np','mr'),
'sk'=>array('sk','dsb','hsb','pl','uk','bs'),
'sl'=>array('sl','bs','hr','sr','bg','mk'),
'sm'=>array('sm','haw','fj','id','mg','ms'),
'sq'=>array('sq','hy','uk','bg','mk','bs'),
'sr'=>array('sr','bs','hr','sl','bg','mk'),
'ss'=>array('ss','xh','zu','nd','tn','ts'),
'su'=>array('su','id','ms','mg','tl','fj'),
'sv'=>array('sv','da','nb','fo','af'),
'sw'=>array('sw','tn','ts','nd','ss','xh'),
'ta'=>array('ta','ml','kn','te'),
'te'=>array('te','kn','ml','ta'),
'tk'=>array('tk','tr','az','tt','uz','kk'),
'tl'=>array('tl','id','mg','ms','su','fj'),
'tn'=>array('tn','ts','nd','ss','xh','zu'),
'tr'=>array('tr','tk','az','tt','uz','kk'),
'ts'=>array('ts','tn','nd','ss','xh','zu'),
'tt'=>array('tt','uz','az','tk','tr','kk'),
'ug'=>array('ug','az','tk','tr','tt','kk'),
'uk'=>array('uk','bg','mk','bs','hr','sl'),
'ur'=>array('ur','hi','gu','pa','ks','sd'),
'uz'=>array('uz','tt','az','tk','tr','kk'),
'vec'=>array('vec','fr','wa','ca','an','es'),
'vi'=>array('vi','km'),
'wa'=>array('wa','fr','vec','ca','an','es'),
'wo'=>array('wo','ff','tn','ts','nd','ss'),
'xh'=>array('xh','ss','zu','nd','tn','ts'),
'yo'=>array('yo','tn','ts','nd','ss','xh'),
'zu'=>array('zu','ss','xh','nd','tn','ts')

);

$code = array (
          "en"=>"English",
          "ach" => "Acholi",
          "af" => "Afrikaans",
          "ak" => "Akan",
          "am" => "አማርኛ",
          "an" => "aragonés",
          "ar" => "العربية",
          // "as" => "অসমীয়া",
          "az" => "Azərbaycan dili",
          "bg" => "Български",
          "bm" => "Bamanankan",
          "bn" => "বাংলা",
          "br" => "brezhoneg",
          "bs" => "Bosanski",
          "ca" => "Català",
          "cy" => "Cymraeg",
          "da" => "Dansk",
          "de" => "Deutsch",
          "dsb" => "Dolnoserbski",
          "en" => "English",
          "es" => "Español",
          "eu" => "Euskara",
          "fa" => "فارسی",
          "ff" => "Pulaar",
          "fj" => "vakaViti",
          "fo" => "føroyskt",
          "fr" => "Français",
          "ga" => "Gaeilge",
          "gl" => "Galego",
          "gnBO" => "Chawuncu",
          "gnPY" => "Avañe'ẽ",
          "gu" => "ગુજરાતી",
          "ha" => "Hausa",
          "haw" => "'Ōlelo Hawaiʻi",
          "he" => "עברית",
          "hi" => "हिंदी",
          "hr" => "Hrvatski",
          "hsb" => "Hornjoserbsce",
          "ht" => "Kreyòl Ayisyen",
          "hu" => "Magyar",
          "hy" => "Հայերեն",
          "id" => "Bahasa Indonesia",
          // "is" => "Íslenska",
          "it" => "Italiano",
          "kk" => "қазақ тілі",
          "km" => "ខ្មែរ",
          "kn" => "ಕನ್ನಡ",
          "ko" => "한국어",
          "ks" => "कश्मीरी",
          "ku" => "Kurdî",
          "lg" => "Oluganda",
          "ln" => "Lingála",
          "lt" => "Lietuvių",
          "lv" => "Latviešu",
          "mg" => "Malagasy",
          "mk" => "Македонски",
          "ml" => "മലയാളം",
          "mr" => "मराठी",
          "ms" => "Bahasa Melayu",
          "my" => "မြန်မာဘာသာ",
          "nb" => "Norsk bokmål",
          "nd" => "isiNdebele",
          "np" => "नेपाली",
          "nl" => "Nederlands",
          "ny" => "Chicheŵa",
          "or" => "ଓଡ଼ିଆ",
          "pa" => "ਪੰਜਾਬੀ",
          "pl" => "Polski",
          "ps" => "پښﺕﻭ",
          "pt" => "Português",
          "rn" => "Kirundi",
          "ro" => "Română",
          "rw" => "Ikinyarwanda",
          "sd" => "सिन्धी",
          "si" => "සිංහල",
          "sk" => "Slovenčina",
          "sl" => "Slovenščina",
          "sm" => "Gagana Sāmoa",
          "sq" => "Shqip",
          "sr" => "Српски (ћирилица)",
          "ss" => "siSwati",
          "su" => "Basa Sunda",
          "sv" => "Svenska",
          "sw" => "Kiswahili",
          "ta" => "தமிழ்",
          "te" => "తెలుగు",
          "tk" => "Türkmençe",
          "tl" => "Tagalog",
          "tn" => "Setswana",
          "tr" => "Türkçe",
          "ts" => "Xitsonga",
          "tt" => "Татарча",
          "ug" => "ئۇيغۇرچە",
          "uk" => "Українська",
          "ur" => "ﺍﺭﺩﻭ",
          "uz" => "Ўзбек",
          "vec" => "Vèneto",
          "vi" => "Tiếng Việt",
          "wa" => "Walon",
          "wo" => "Wolof",
          "xh" => "isiXhosa",
          "yo" => "Yorùbá",
          "zu" => "isiZulu"
);

echo "<style>
.scrollit {
    overflow:scroll;
    height:500px;
}
</style>
";
$temp = 'en';
foreach($lang[$search_string] as $chr) {
    $temp = $temp.", ".$chr;
}
$query="SELECT $temp from translation";

    $result = $test_db->query($query);
    echo "<div class ='scrollit'>";
    echo "
    <table id ='termTable'>
    <thead>
    <tr>
    <th>English</th>";
foreach($lang[$search_string] as $chr) {
    echo "<th>{$code[$chr]}</th>";
}
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

	while($results = $result->fetch_array()) {
		$result_array[] = $results;
           echo "<tr>";
           echo "<td>" . $results['en'] . "</td>";
        foreach($lang[$search_string] as $chr) {
            echo "<td>" . $results[$chr] . "</td>";
                    }
    }
            echo "</tr>";
            echo "</tbody>";

            echo "</table>";
            echo "</div>";

?>
