<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">User Login</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ; ?>"> <!-- 代表post到這個頁面 -->
            <div class="form-group">
                <!--  1.Email、2.Password、3.submit button -->

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
            </div>
        </form>
    </div>
</div>