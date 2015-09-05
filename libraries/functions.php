<?php

// http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers
// Connect to the database.
function db_connect() {
  try {
    $db = new PDO('mysql:host=localhost;dbname=lukaz89_alonsoadriana;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
  } catch (PDOException $ex) {
    error_log($ex->getMessage());
  }
}

// Get FLickr photoset (album) from a specific id.
function getFlickrPhotoset($photoset_id) {
  // Set POST variables.
  $url = 'https://api.flickr.com/services/rest/';
  $fields = array(
    'method' => urlencode('flickr.photosets.getPhotos'),
    'api_key' => urlencode('4525d7544b4cdd5f28076b56bd49d853'),
    'photoset_id' => urlencode($photoset_id),
    'format' => urlencode('json'),
    'nojsoncallback' => urlencode('1')
  );

  // URL-ify the data for the POST.
  foreach($fields as $key=>$value) {
    $fields_string .= $key.'='.$value.'&';
  }
  rtrim($fields_string, '&');

  // Open connection.
  $ch = curl_init();

  // Set the url, number of POST vars, POST data.
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, count($fields));
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);

  // Execute post.
  $result = curl_exec($ch);

  // Close connection.
  curl_close($ch);

  return json_decode($result, TRUE);
}

// Mock data.
function getJson($category) {
  switch ($category) {
    case 'abstracto':
      $json = '{"photoset":{"id":"72157645092326576", "primary":"14221281757", "owner":"39920116@N05", "ownername":"Adriana Alonso", "photo":[{"id":"14221281757", "secret":"d2c9676684", "server":"3873", "farm":4, "title":"Par\u00e1metro. \u00d3leo sobre tela 50 x 60", "isprimary":"1"}, {"id":"14221302407", "secret":"5a25e9550b", "server":"3926", "farm":4, "title":"Creaci\u00f3n .\u00f3leo t\u00e9cnica mixta 70 x 70", "isprimary":"0"}, {"id":"14221156809", "secret":"b53b8e5324", "server":"3838", "farm":4, "title":"Libre expresi\u00f3n \u00d3leo sobre tela 50 x 70 cm", "isprimary":"0"}, {"id":"14384687106", "secret":"a2825da3b7", "server":"3839", "farm":4, "title":"Resurrecci\u00f3n \u00d3leo sobre tela 50 x 70 cm", "isprimary":"0"}, {"id":"14404458081", "secret":"432b70412e", "server":"3868", "farm":4, "title":"Resurrecci\u00f3n \u00d3leo sobre tela 50 x 70 cm", "isprimary":"0"}, {"id":"14221256358", "secret":"39a9f66407", "server":"2901", "farm":3, "title":"Paloma .\u00d3leo sobre tela  60 x 80", "isprimary":"0"}, {"id":"14221332249", "secret":"85682346a8", "server":"3868", "farm":4, "title":"Ventana intervenida en centro de arquitectura y construcci\u00f3n", "isprimary":"0"}], "page":1, "per_page":500, "perpage":500, "pages":1, "total":"7", "title":"Abstractos 2014"}, "stat":"ok"}';
      break;
    case 'figurativo':
      $json = '{"photoset":{"id":"72157645145958014", "primary":"14404517401", "owner":"39920116@N05", "ownername":"Adriana Alonso", "photo":[{"id":"14404517401", "secret":"100a641f15", "server":"5588", "farm":6, "title":"Padre P\u00edo \u00d3leo sobre tela 50 x 60 cm", "isprimary":"1"}, {"id":"14221292518", "secret":"cf2cecd337", "server":"2897", "farm":3, "title":"Virgen Orante interpretaci\u00f3n tiza pastel 35 x 55", "isprimary":"0"}, {"id":"14406606042", "secret":"d48620136c", "server":"3858", "farm":4, "title":"Jes\u00fas tiza pastel 35 x 55", "isprimary":"0"}, {"id":"14221325280", "secret":"a09482a064", "server":"2937", "farm":3, "title":"Galopando tiza pastel 35 x 55", "isprimary":"0"}, {"id":"14221380369", "secret":"9eeee4542d", "server":"5504", "farm":6, "title":"Vaca \u00d3leo sobre tela 100x100", "isprimary":"0"}], "page":1, "per_page":500, "perpage":500, "pages":1, "total":"5", "title":"Figurativo 2013\/2014"}, "stat":"ok"}';
      break;
    case 'paisajes':
      $json = '{"photoset":{"id":"72157622080485502", "primary":"3835886072", "owner":"39920116@N05", "ownername":"Adriana Alonso", "photo":[{"id":"4445900868", "secret":"6b5d17f8f2", "server":"4026", "farm":5, "title":"Vanecia I", "isprimary":"0"}, {"id":"4445899470", "secret":"05cbdb3ac0", "server":"4045", "farm":5, "title":"Venecia II", "isprimary":"0"}, {"id":"3904688829", "secret":"da312a8052", "server":"2578", "farm":3, "title":"Paisajes", "isprimary":"0"}, {"id":"3905464022", "secret":"0188634208", "server":"2441", "farm":3, "title":"Paisajes", "isprimary":"0"}, {"id":"3904606846", "secret":"ce241f611c", "server":"2646", "farm":3, "title":"Tormenta", "isprimary":"0"}, {"id":"3904605554", "secret":"bd3c7c38e9", "server":"3422", "farm":4, "title":"Palomas (int. Picasso)", "isprimary":"0"}, {"id":"3903820543", "secret":"7d75630379", "server":"3422", "farm":4, "title":"El puente", "isprimary":"0"}, {"id":"3903819271", "secret":"342cc48cb5", "server":"2470", "farm":3, "title":"Amanecer", "isprimary":"0"}, {"id":"3835109595", "secret":"d007a96d5e", "server":"2572", "farm":3, "title":"Tumbaya", "isprimary":"0"}, {"id":"3835108499", "secret":"747cfc240e", "server":"3437", "farm":4, "title":"Noche nublada", "isprimary":"0"}, {"id":"3835899714", "secret":"816ba0a16e", "server":"2621", "farm":3, "title":"Purmamarca", "isprimary":"0"}, {"id":"3835898522", "secret":"37a44ea4df", "server":"3523", "farm":4, "title":"Cartagenas", "isprimary":"0"}, {"id":"3835897448", "secret":"a56f16db3b", "server":"2452", "farm":3, "title":"Buzios", "isprimary":"0"}, {"id":"3835103895", "secret":"87a064ec5c", "server":"2658", "farm":3, "title":"Homenaje a Cezanne", "isprimary":"0"}, {"id":"3835895106", "secret":"bd0e770273", "server":"3545", "farm":4, "title":"Tarde en el jardin", "isprimary":"0"}, {"id":"3835102115", "secret":"544d9d1eeb", "server":"3511", "farm":4, "title":"Nevada", "isprimary":"0"}, {"id":"3835893094", "secret":"6932ee3dd7", "server":"2529", "farm":3, "title":"Ventana con p\u00e1jaros", "isprimary":"0"}, {"id":"3835892100", "secret":"179a5c9e09", "server":"3584", "farm":4, "title":"Paisaje oto\u00f1al", "isprimary":"0"}, {"id":"3835891028", "secret":"4708e2877a", "server":"2559", "farm":3, "title":"Ciudad", "isprimary":"0"}, {"id":"3835098151", "secret":"b5775290f7", "server":"3441", "farm":4, "title":"Atardecer oto\u00f1al (2do. premio en San Telmo-Bs.As.)", "isprimary":"0"}, {"id":"3835888640", "secret":"412d1d477c", "server":"3485", "farm":4, "title":"Carilo (juncos)", "isprimary":"0"}, {"id":"3835888006", "secret":"4fc91d548f", "server":"2568", "farm":3, "title":"Carilo (mar)", "isprimary":"0"}, {"id":"3835095717", "secret":"745ab46885", "server":"3478", "farm":4, "title":"Carilo (sombrilla)", "isprimary":"0"}, {"id":"3835887088", "secret":"9d88096a29", "server":"3448", "farm":4, "title":"Barcos en atardecer", "isprimary":"0"}, {"id":"3835094739", "secret":"a3edbcb49a", "server":"2435", "farm":3, "title":"Anochecer", "isprimary":"0"}, {"id":"3835886072", "secret":"80eae76d51", "server":"3509", "farm":4, "title":"Amanecer en la laguna", "isprimary":"1"}, {"id":"14221431740", "secret":"ddfd11a0ab", "server":"3926", "farm":4, "title":"\u00c1rboles \u00d3leo sobre tela 70 x 100", "isprimary":"0"}, {"id":"14221439228", "secret":"028221d8c0", "server":"3878", "farm":4, "title":"Casita blanca. \u00d3leo sobre tela 40 x 50 cm", "isprimary":"0"}], "page":1, "per_page":500, "perpage":500, "pages":1, "total":"28", "title":"Paisajes"}, "stat":"ok"}';
      break;
    case 'fail':
      $json = '{"stat":"fail", "code":112, "message":"Method \"flickr.photosets.getPhotos2\" not found"}';
      break;
    default:
      return ;
    break;
  }
  return json_decode($json, TRUE);
}

// http://webcheatsheet.com/php/create_thumbnail_images.php
//http://www.cristalab.com/tutoriales/clase-de-php-para-crear-thumbnails-de-imagenes-c73376l/
//http://phpimageworkshop.com/tutorial/2/creating-thumbnails.html

// Create the thumbnail of the photo and save it on $dir/thumbnail
function createThumbs($dir, $image, $thumbSize) {
  //Your Image
  $imgSrc = $dir.$image.".jpg";

  //getting the image dimensions
  list($width, $height) = getimagesize($imgSrc);

  //saving the image into memory (for manipulation with GD Library)
  $myImage = imagecreatefromjpeg($imgSrc);

  // calculating the part of the image to use for thumbnail
  if ($width > $height) {
    $y = 0;
    $x = ($width - $height) / 2;
    $smallestSide = $height;
  } else {
    $x = 0;
    $y = ($height - $width) / 2;
    $smallestSide = $width;
  }

  // copying the part into thumbnail
  //$thumbSize = 100;
  $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
  imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

  //final output
  //header('Content-type: image/jpeg');
  imagejpeg($thumb, $dir."thumbnails/".$image.".jpg", 100);
}

?>
