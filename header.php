<?php
   //header("Cache-Control: max-age=86400 public");
   //header("Content-type: text/html; charset=utf-8");
   header('Access-Control-Allow-Origin: *');
   // error_reporting(E_ALL);
   // ini_set('display_errors', 1);
   // global $admit; global $exc; $exc = array();
   ?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <?php $pid = get_metas_html(); //echo get_scripts('ga');
         wp_head(); ?>
      <?php if(is_home())
         {
         echo '<meta property="og:url"  content="https://travesiasdigital.com"></meta>';
         echo '<meta property="og:type" content="article" />';
         echo '<meta property="og:title"  content="Revista Travesías | Inspiración para viajeros" />';
         echo '<meta property="og:description"  content=" Revista de viajes para un lector inteligente, culto y viajero, ávido por conocer cosas nuevas." />';
         echo '<meta property="og:image"  content="https://s3-us-west-1.amazonaws.com/travesiasdigital.com/wp-content/uploads/2017/09/04134633/MI1A41851-1080x540.jpg" />';
         }
         ?>
      <meta http-equiv="Expires" content="0">
      <meta http-equiv="Last-Modified" content="0">
      <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
      <meta http-equiv="Pragma" content="no-cache">
      <link rel="stylesheet" type="text/css" href="/wp-content/themes/travesias_2017/style.css" media="screen" />
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/main.css?f">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/custom.css?f" media="screen" />
      <!--CCS PROVICIONAL -->
   </head>
   <body <?php //body_class('headerfix') ?> data-url="<?php echo BASE_URL ?>">
      <script type="text/javascript">
         function myFunction() {
             var x = document.getElementById("menu");
             if (x.className.indexOf("w3-show") == -1) {
                 x.className += " w3-show";
                 document.getElementById("iconom").classList.add('fa-times');
                 document.getElementById("iconom").classList.remove('fa-align-justify');
             } else { 
                 x.className = x.className.replace(" w3-show", "");
                 document.getElementById("iconom").classList.add('fa-align-justify');
                 document.getElementById("iconom").classList.remove('fa-times');
             }
         }
         
      </script>
      
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
      <?php dynamic_sidebar('zone_header'); ?>
      <header>
        <nav class="w3-bar nav" style="min-height:50px;">
         <div id="logo_menu">
            <div class="w3-row w3-container">
               <a id="open-hide" class=" w3-col s2" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i id="iconom" class="fas fa-align-justify  s2 fa-2x"></i></a>
               <div id="logo_travesias w3-col s4">
                  <a href="<?php echo BASE_URL ?>"><img class="logo" style="width:70%;" src="<?php echo get_stylesheet_directory_uri();?>/img/gatopardo-header.png" /></a>
               </div>
            </div>
         </div>
         <div id="menu" class="menu">
            <div class="menu-div  w3-center">
               <?php echo wp_nav_menu( array('menu' => 'Header','menu_class' => 'nav',
                  'container' => '',
                  
                  ) ); ?>
            </div>
         </div>
       </nav>
      </header>

         <!--<div class="social">
            <a href="https://twitter.com/gatopardocom" target="_blank" class="twitter">Twitter</a>
            <a href="https://www.facebook.com/Gatopardocom/" target="_blank" class="facebook">Facebook</a>
            <a href="https://www.youtube.com/user/RevistaGatopardo" target="_blank" class="youtube">Youtube</a>
            <a href="https://www.instagram.com/revistagatopardo/" target="_blank" class="instagram">Instagram</a>
            <a class="btnBuscar" href="javascript:void(0);"></a>
            <div class="campo-busqueda">
            	<form action="/" class="search-form" method="get" role="search">
            		<label>
            			<input type="text" title="Buscar:" name="s" value="" placeholder="Buscar …" class="search-field">
            		</label>
            		<input type="submit" value="Buscar" class="search-submit">
            	</form>
            </div>
            </div><!-- .social -->
         <!--</div>
            <div id="search">
            <div id="upper-link"><div id="upper-link-wrap">
            	<a href="https://travesiasdigital.com/suscribete/">Suscríbete</a></div></div>
            <div id="right-search-wrap">				
            <div id="righ-wrap-inner">
            <div id="social">
            	<a class="ico facebook" href="https://es-la.facebook.com/TravesiasMexico/" target="_blank"></a>
            	<a class="ico twitter" href="https://twitter.com/travesiascom?lang=es" target="_blank"></a>
            	<a class="ico instagram" href="https://www.instagram.com/travesias/?hl=es" target="_blank"></a>
            	<a class="ico google" href="https://open.spotify.com/user/revista.traves%C3%ADas" target="_blank"></a>
            </div>
            <form action="/" method="get" class="search_f">
            	<input type="submit" alt="Buscar" class="search">
            	<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="¿Qué estás buscando?">
            </form>
            	</div>
            	</div>
            </div> -->	
    