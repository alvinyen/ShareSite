<!DOCTYPE html>
<html>
<head>
    <title>Share Site</title>
    <link rel="stylesheet"  href="/assets/css/bootstrap.css">
    <link rel="stylesheet"  href="/assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Share Site</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href=" <?php echo ROOT_URL ; ?> ">Home</a></li>
                <li><a href="<?=ROOT_URL?>Shares">shares</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                    <li><a href="<?= ROOT_URL ?>">Welcome <?= $_SESSION['user_data']['name'] ?></a></li>
                    <li><a href="<?= ROOT_URL ?>users/logout">Logout</a></li>
                <?php else : ?>
                    <li><a href="<?= ROOT_URL?>users/login">Login</a></li>
                    <li><a href="<?= ROOT_URL?>users/register">Register</a></li>
                <?php endif ; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="row">
        <?php Message::displayMsg() ?>
        <?php require($viewxyz) ; ?>
    </div>

</div>

</body>
</html>
