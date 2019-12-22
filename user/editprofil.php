<?php
if(!isset($_SESSION['login'])){
  header('location:index.php');
}
$idp  = intval($_SESSION['id']);
$sql  = mysqli_query($con, "SELECT * from user where id=$idp");
$d    = mysqli_fetch_array($sql);
?>

    <script>
        function validasiFile(){
        var inputFile = document.getElementById('foto');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.png|\.jpeg)$/i;
        if(!ekstensiOk.exec(pathFile)){
          swal({
                title: 'Error!',
                text: 'Gambar hanya boleh jpg,png, dan jpeg',
                icon: 'error',
                button: 'OK',
            })
            inputFile.value = '';
            return false;
            }
        }
    </script>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Your Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <form method="POST" action="epro.php" class="my-4" enctype='multipart/form-data'>
              <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nick</label>
                    <input type="text" value="<?php echo $d['nick']; ?>" name="nick" class="form-control" required="required"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">username</label>
                    <input type="text" value="<?php echo $d['usrname']; ?>" name="usrname" class="form-control" required="required">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">password (biarkan jika tidak di ganti)</label>
                    <input type="text" value="" name="password" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email address</label>
                    <input type="email" value="<?php echo $d['email']; ?>" name="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Facebook</label>
                    <input type="text" value="<?php echo $d['facebook']; ?>" name="facebook" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">website</label>
                    <input type="text" value="<?php echo $d['web']; ?>" name="web" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Github</label>
                    <input type="text" value="<?php echo $d['github']; ?>"  name="github" class="form-control" >
                  </div>
                </div>
               </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Quotes</label>
                    <textarea class="form-control" rows="3" name="quotes"><?php echo $d['quotes']; ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"><br>
                  <label> Edit foto</label><br>
                    <input type="file" name="foto" id="foto" onchange="return validasiFile()">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-info ">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
      </div>