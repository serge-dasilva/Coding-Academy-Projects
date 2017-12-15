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
                <span class="card-title">New article</span>
                <form action="http://localhost/PHP_Rush_MVC/articles/articleCheck" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                        <input name="titre" id="titre" type="text" class="validate">
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
                        <textarea id="textarea1" name="textarea" class="materialize-textarea"></textarea>
                        <label for="textarea1">Article</label>
                        </div>
                    </div>
            </div>
            <div class="card-action  align center">
                <button class="btn amber grey-text text-darken-4 waves-effect waves-light" type="submit" name="action">Add article</button>
            </div>
              </form>
        </div>
    </div>
</div>
