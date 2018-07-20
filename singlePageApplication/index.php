<?php include("0-config/config-genos.php"); ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/animate.css" >
    <link rel="stylesheet" href="css/all.css" >
    <link rel="stylesheet" href="css/style.css" >

    <title>Demo Single Page Application</title>
    
  </head>
  <body>
     <?php 
        produit::TplProduit(); 
        produit::TplProduitFiche(); 
        categorie::TplCategorie(); 
        client::TplClient(); 
        client::TplClientFiche(); 
      ?>

     <main id="app">
      <?php Menu(); ?>

      <section class="container">
        <div class="row">
          
            <router-view></router-view> 
          </div><!-- Fin col md 12 -->

        </div> <!-- Fin de row -->
      </section>
     </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/vue.js" ></script>
    <script src="js/vue-router.js" ></script>
    <script src="js/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/lodash.min.js" ></script>
    <script src="js/client.comp.vue.js" ></script>
    <script src="js/client-fiche.comp.vue.js" ></script>
    <script src="js/categorie.comp.vue.js" ></script>
    <script src="js/produit.comp.vue.js" ></script>
    <script src="js/produit-fiche.comp.vue.js" ></script>
    <script src="js/app.vue.js" ></script>
    <script>
      $(function(){
        $(".navbar .nav-item").on("click",function(){
          $(".navbar .nav-item").removeClass("active");
          $(this).addClass("active");
        })
      });
    </script>
  </body>
</html>