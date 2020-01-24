<?php require_once '../partials/session.php' ?>
<?php require_once '../partials/call.php' ?>
<?php if(isset($_SESSION['auth']) && $_SESSION['auth']->rank >= 90){ ?>
<?php require_once '../partials/head.php' ?>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<body>
  <div id="big_container">
    <?php require_once '../partials/admin_menu.php' ?>
    <div id="container">
    <form id="article_form" method="post" action="../controllers/traitement_article.php" enctype="multipart/form-data">
      <label for="article_name">Titre de l'article</label>
      <input type="text" id="article_name" name="article_title" required>

      <label id="image_titre">Image de l'article</label>
      <input type="file" id="image_titre" name="image_titre" required>

      <label for="categorie">Catégorie</label>
      <select id="categorie" name="categorie">
        <option value="review">Review</option>
        <option value="lol">League Of Legends</option>
      </select>

      <!-- <textarea id="article_text" name="article_text"></textarea> -->
      <div id="editor" name="article_text">
      </div>

      <p id="formatage_article" title="Formatage à connaitre :
      <br> : Saut de ligne.
      <img class='image_darticle' src='liendelimage' title='titre_image'> : Placer une image bien formatée.
      <span class='legende'></span>: A mettre directement sous une image"> Survoler pour info. formatage </p>
      <input type="submit" value="Poster" name="poster">

    </form>
    </div>
  </div>



<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });

  $(document).ready(function(){
  $("#article_form").on("submit", function () {
    var hvalue = $('.ql-editor').html();
    $(this).append("<textarea name='article_text' style='display:none'>"+hvalue+"</textarea>");
   });
  });
</script>



</body>
</html>
<?php } ?>
