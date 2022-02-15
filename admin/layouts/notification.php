<?php if(isset($error)) :?>
    <div class="alert alert-danger">
        <ul>
        
            <?php foreach($error as $key) : ?>
                <li><?php echo $key ?></li>
            <?php endforeach ; ?>
       
        </ul>
    </div>
<?php endif ; ?>


<?php if(isset($_SESSION['success'])) :?>
    <div class="alert alert-success">
        <p><?php echo $_SESSION['success'] ; unset($_SESSION['success'])?></p>
    </div>
<?php endif ; ?>

<?php if(isset($_SESSION['error'])) :?>
    <div class="alert alert-danger">
        <p><?php echo $_SESSION['error'] ; unset($_SESSION['error'])?></p>
    </div>
<?php endif ; ?>