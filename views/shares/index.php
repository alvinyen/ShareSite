<div xmlns="http://www.w3.org/1999/html">
    <?php if(isset($_SESSION['is_logged_in'])): ?>
        <a class="btn btn-success btn-share" href="<?= ROOT_PATH?>shares/add">Share Sth.</a>
    <?php endif ;?>
<!--    <h1>--><?//= count($viewmodeResultData) ?><!--</h1>-->

    <?php foreach($viewmodeResultData as $item) : ?>
        <div class="well">
            <h3><?= $item['title']  ?></h3>
            <small><?= $item['create_date'] ?></small>
            <hr>
            <p> <?= $item['body'] ?> </p>
            </br>
            <h3> <?= $item['link'] ?> </h3>
            <a class="btn btn-default" href="<?= $item['link'] ?>" target="_blank">Go To Website</a>
        </div>
    <?php endforeach;   ?>
</div>

