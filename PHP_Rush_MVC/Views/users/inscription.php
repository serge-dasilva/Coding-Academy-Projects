<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card white">
            <div class="card-content">
                <span class="card-title">Inscription</span>
                <form action="http://localhost/PHP_Rush_MVC/users/inscriptionCheck" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                        <input name="name" id="name" type="text" class="validate">
                        <label class="grey-text text-darken-4" for="name">Name</label>
                        </div>
                        <div class="input-field col s12">
                        <input name="email" id="email" type="text" class="validate">
                        <label class="grey-text text-darken-4" for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                        <input name="password" id="password" type="password" class="validate">
                        <label class="grey-text text-darken-4" for="password">Password</label>
                        </div>
                        <div class="input-field col s12">
                        <input name="password_conf" id="password_conf" type="password" class="validate">
                        <label class="grey-text text-darken-4" for="password_conf">Password confirmation</label>
                        </div>
                    </div>
            </div>
            <div class="card-action  align center">
                <button class="btn amber grey-text text-darken-4 waves-effect waves-light" type="submit" name="action">S'inscrire</button>
            </div>
              </form>
        </div>
    </div>
</div>



