<?php
 $id    = intval($_SESSION['id']);
 $sql   = mysqli_query($con, "SELECT * FROM user WHERE id='$id' ");
 $d     = mysqli_fetch_array($sql);
 $nick  = aman($d['nick']);
 ?>
    <div class="col-md-8 text-center" style="margin-left: auto; margin-right: auto; display: block;">  
        <div class="card">
            <h4 class="text-center">
            <?php
            if($d['foto'] == 'kosong'){
                echo "<img src='img/dev.png' class='avatar2' alt='ForstoneCTF - $nick profile' title='ForstoneCTF - $nick profile'>";
            }else{
                echo "<img src='img/$d[foto]' class='avatar2' alt='ForstoneCTF - $nick profile' title='ForstoneCTF - $nick profile'>";
            }
            ?>
            </h4>
        <div class="card-body">
            <h4 class="card-title text-center"> <?php echo $nick; ?> - <?php echo $d['nilai']; ?> Poin</a></h4>
            <a class=" btn-circle text-center">
            <p class="card-description my-4">
           <?php echo mysqli_escape_string($con, htmlentities($d['quotes'])); ?>
            </p>
            <a href="//<?php echo mysqli_escape_string($con, htmlentities($d['facebook']));?>" class="btn btn-info" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="//<?php echo mysqli_escape_string($con, htmlentities($d['github']));?>" class="btn btn-info" title="GitHub" target="_blank"><i class="fab fa-github"></i></a>
            <a href="mailto:<?php echo mysqli_escape_string($con, htmlentities($d['email']));?>" class="btn btn-info" title="Mail" target="_blank"><i class="fas fa-envelope"></i></a>
            <a href="//<?php echo mysqli_escape_string($con, htmlentities($d['web']));?>" class="btn btn-info" title="web" target="_blank"><i class="fas fa-globe"></i></a>
        </div>
        </div>
    </div>
    