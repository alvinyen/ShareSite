<div>
    <h1>Welcome To Share Site <?php if(isset($_SESSION['is_logged_in'])){ echo ', ' . $_SESSION['user_data']['name'] ; } ?></h1>
<!--    <h1>Welcome To Share Site--><?php //if(isset($_SESSION['is_logged_in'])){ echo $_SESSION['user_data']['name'] ; } ?><!--</h1>-->
    <?php  foreach ($_SESSOPM['user_data'] as $item){echo $item; }  ?>
    <p class="lead"> Find Sth. cool....? Share it with Share Site！ </p>

    <a class="btn btn-primary text-center" href="<?= ROOT_PATH?>shares">Share Now</a>
</div>