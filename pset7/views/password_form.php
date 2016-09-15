<form action="password.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="old" placeholder="Current password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="new" placeholder="New password" type="password"/>
        </div>
        <div class="form-group">       
            <input class="form-control" name="confirmation" placeholder="New password confirmation" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                <?= htmlspecialchars($title) ?>
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
