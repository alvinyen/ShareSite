<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Share Something</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ; ?>"> <!-- 代表post到這個頁面 -->
            <div class="form-group">
                <!--  1.Share Title、2.Body、3.Link、4.submit button、5.cancel (a link) -->

                <div class="form-group">
                    <label>Share Title</label>
                    <input type="text" name="title" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Body</label>
                    <textarea name="body" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control">
                </div>

                <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
                <a class="btn btn-danger" href="<?= ROOT_PATH ?>shares">Cancel</a>
            </div>
        </form>
    </div>
</div>