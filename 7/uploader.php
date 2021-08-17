<?php

/**
 * Декод JSON
 * @param  string $str
 * @return array
 */
function jsonDecode( $str ) : ?array 
{
    $arrResult = json_decode($str, true);

    if ( $arrResult === null || json_last_error() !== 0 ) {
        echo 'JSON error: ' . json_last_error_msg();
        die;
    }

    return $arrResult;
}

/**
 * Рекурсивно конвертируем ассоциативный массив в html сущность список.
 *
 * @param  array $arrData
 * @return array
 */
function jsonArrayToHTML(array $arrData) {
    $html = '<ul>';
    foreach($arrData as $key => $value) {
        if (is_array($value)) {
            $html .= jsonArrayToHTML($value);
        } else {
            $html .= '<li>'.$key.': '.$value.'</li>';
        }
    }
    $html .= '</ul>';
    return $html;
}

if (empty($_FILES['file']['tmp_name'])) {
    echo 'File not loaded';
} else {
    $strJSON = file_get_contents($_FILES['file']['tmp_name']);
    $arrJSON = jsonDecode( $strJSON );

    $htmlResult = jsonArrayToHTML($arrJSON);
    
    echo $htmlResult;
}