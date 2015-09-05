<?php
require_once("libraries/functions.php");
$db = db_connect();

/* Flickr datos
  s cuadrado pequeño 75x75
  q large square 150x150
  t imagen en miniatura, 100 en el lado más largo
  m pequeño, 240 en el lado más largo
  n small, 320 on longest side
  - mediano, 500 en el lado más largo
  z mediano 640, 640 en el lado más largo
  c tamaño mediano 800, 800 en el lado más largo†
  b grande, 1024 en el lado más largo*

  <img src="https://farm4.staticflickr.com/3926/14221302407_5a25e9550b.jpg">
*/
if (isset($_GET['categoria'])) {
  $base_url = "http://".$_SERVER['SERVER_NAME'];
  $category = $_GET['categoria'];

  $image_dir = "images/categories/".$category."/";
  $thumb_dir = $image_dir."thumbnails/";

  echo '<div id="categories">';

  $stmt = $db->prepare("SELECT * FROM aa_images WHERE img_category = ? ORDER BY img_id DESC");
  $stmt->execute(array($category));
  if ($stmt->rowCount() > 0) {
    echo '<div id="body" class="col-xs-12 col-md-12 black text-center fancybody">';
    while ($result = $stmt->fetchObject()) {
      echo '<a class="fancybox" rel="fancybox-thumb" title="'.$result->img_title.'" href="'.$base_url."/".$image_dir.$result->img_id.".jpg".'"><img id='.$result->img_id.' class="thumb" src="'.$base_url."/".$thumb_dir.$result->img_id.".jpg".'"/></a>';
    }
    echo '</div>';

  } else {
    echo
    '<div class="alert alert-danger text-center col-xs-12 col-md-12 show" role="alert">' .
      'Hubo un error al cargar esta categoria, por favor intente nuevamente' .
    '</div>';
  }

  echo '</div>';
}

?>
