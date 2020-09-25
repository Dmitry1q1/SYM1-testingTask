
<header></header>
<a href="/"> Main page</a>


<div id="content">
    <div class="container table-block">
        <div class="row table-center-block">
            <div class="col-xs-8 col-md-8">
                <h1 class="text-center login-title">Log in to your account</h1>
                <div class="account-wall">
                    <form class="form-signin" id="form-signin" method="post">
                        <?php if(empty($data['error'])) :?>
                            <p><?php echo $data['title']; ?></p>
                        <?php else: ?>
                            <p style="font-weight: bold; color: red;"><?php echo $data['error']; ?></p>
                        <?php endif; ?>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Login" required>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    
</footer>


