


<?php if(isset($_SESSION['message']) && isset($_SESSION['type'])) { if (!empty($_SESSION['message'])) {?>

      <div class="alert w-100 mx-3 alert-<?php echo $_SESSION['type']; ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php echo $_SESSION['title']; ?>!</strong> <?php echo $_SESSION['message'];?>.
      </div>

<?php } } $_SESSION['message'] = ""; ?>