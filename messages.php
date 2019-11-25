 <?php
     if (isset($success)) {
       ?>
       <div class="alert alert-success" style="text-transform:  ;">
       <strong><center><?php echo $success; ?></center></strong> 
      </div>
       <?php
     }
     ?>
     
     <?php
     if (isset($error)) {
       ?>
       <div class="alert alert-danger">
       <strong><center><?php echo $error; ?></center></strong> 
      </div>
       <?php
     }
     ?>