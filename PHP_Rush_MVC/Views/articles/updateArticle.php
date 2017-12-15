<?php 
if ($_SESSION['groupe'] == 3)
{
   header("Location: http://localhost/PHP_Rush_MVC/articles/index");
}
?>
<div class="row">
    <div class="col s12 m10 offset-m1">
        <div class="card white">
            <div class="card-content">
                <span class="card-title">Modification</span>
                <form action="http://localhost/PHP_Rush_MVC/articles/upArticle" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                        <input name="titre" id="titre" type="text" class="validate" value="<?php echo $article['Title'] ?>">
                        <label class="grey-text text-darken-4" for="titre">Titre</label>
                        </div>
                        <?php
                        $listCat = "";
                        foreach ($allCategory as $val){
                        $listCat.=
                        '<option value="'.$val['Id'].'">'.$val['Title'].'</option>';
                        }
                        echo 
                        ' 
                        <select class="browser-default col s12" name="category_id">
                        <option value="" disabled selected>Select category</option>
                        '.$listCat.'
                        </select>';
                        ?>
                        <div class="input-field col s12">
                        <textarea id="textarea1" name="textarea" class="materialize-textarea"><?php echo $article['Content'] ?></textarea>
                        <label for="textarea1">Article</label>
                        </div>
                        <input type="hidden" name="articleId" value="<?php echo $article['articleId'] ?>">
                    </div>
            </div>
            <div class="card-action  align center">
                <button class="btn light-green darken-4 white-text text-darken-4 waves-effect waves-light" type="submit" name="action">Modifier</button>
                <a class="btn red darken-2 white-text waves-effect waves-light" href="http://localhost/PHP_Rush_MVC/articles/deleteArticle/<?php echo $article['articleId'] ?>">Supprimer</a>
            </div>
              </form>
        </div>
    </div>
</div>