<?php
function detect_cyr_utf8($content)
{
  return preg_match('/&#10[78]\d/', mb_encode_numericentity($content, array(0x0, 0x2FFFF, 0, 0xFFFF), 'UTF-8'));
}
function translit11($str)
{
    $tr = array(
    "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
    "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
    "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
    "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
    "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
    "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
    "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
    "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
    "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
    "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
    "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
    "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
    "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
    "Ё"=>"E","Є"=>"E","Ї"=>"YI","ё"=>"e","є"=>"e","ї"=>"yi",
    " "=> "_", "/"=> "_"
    );
    if (preg_match('/[^A-Za-z0-9_\-]/', $str)) {
    $str = strtr($str,$tr);
    $str = preg_replace('/[^A-Za-z0-9_\-.]/', '', $str);
    }
    return $str;
}
$arrOld = explode("/", $_SERVER['REQUEST_URI']);
$arr = [];
foreach($arrOld as $key=>$i){
    if(detect_cyr_utf8($arrOld[$key])){
        $arr[$key] = translit11($arrOld[$key]);
    }else{
        $arr[$key] = $arrOld[$key];
    }
}
$index = count($arr) - 2;
$last = $arr[$index];
$last1 = str_replace("%20", "-", $last);
if($last != $last1){
    $arr[$index] = $last1;
    $url = implode("/", $arr);
    header('Location: https://voxlink.ru'.$url, 301);
    exit();
} else if($arr[1] == "knowledge-base"){
    $arr[1] = "kb";
    $url = implode("/", $arr);
    header('Location: https://voxlink.ru'.$url, 301);
    exit();
} else if($arr[1] == "kb" && $arr[2] == "tag"){
    unset($arr[1]);
    $arr = array_values($arr);
    $url = implode("/", $arr);
    header('Location: https://voxlink.ru'.$url, 301);
    exit();
} else if($arr[1] == "kb" && $arr[3] == "tag" && strpos($arr[2], "page") !== FALSE){





    $pageArr = explode("-",$arr[2]);
    $pageN = $pageArr[1];
    unset($arr[1]);
    unset($arr[2]);
    $arr = array_values($arr);
    $arr[] = "page";
    $arr[] = $pageN;




    $url = implode("/", $arr);
    header('Location: https://voxlink.ru'.$url, 301);
    exit();
} else if(strpos($_SERVER['REQUEST_URI'],"(") !== FALSE){
    $newurl = str_replace(array("(",")"), array("-",""), $_SERVER['REQUEST_URI']);
    header('Location: https://voxlink.ru'.$newurl, 301);
    exit();
}


require_once("functions/functions.php");