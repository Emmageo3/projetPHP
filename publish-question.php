<?php
    require('actions/users/securityAction.php');
    require('actions/questions/publishQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <form class="container" method="POST">

        <?php 
            if(isset($errorMsg)){
                echo '<p>'.$errorMsg.'</p>';
            }
        ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu</label>
            <textarea class="form-control" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Publier</button>
    </form>
    
</body>
</html>