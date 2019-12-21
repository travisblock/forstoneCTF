<?php
        $sql= mysqli_query($con, "SELECT * FROM description");
        $d= mysqli_fetch_array($sql);
        echo "
        <section class='no-padding-top'>
        <div class='container-fluid'>
        <div class='row'>
        <div class='col-lg-10'>                           
          <div class='block'>
            <div class='title'><strong class='d-block'>Edit web info</strong><span class='d-block'>Editing...</span></div>
            <div class='block-body'>
              <form class='form' method='POST' action='x98/edit_info.php'>
                <div class='form-group'>
                  <label>Title</label>
                  <input name='title' value='$d[judul]' type='text' placeholder='Title' class='mr-sm-2 form-control'>
                </div>
                <div class='form-group'>
                  <label>Description</label>
                  <input name='desc' value='$d[description]' type='text' placeholder='Description' class='mr-sm-2 form-control'>
                </div>
                <div class='form-group'>
                  <label>Logo</label><br>
                  <input name='img_f' type='file' class='mr-sm-4'>
                </div>
                <div class='form-group'>
                  <label>Image front</label><br>
                  <input name='img_f' type='file' class='mr-sm-4'>
                </div>
                <br>
                <div class='form-group'>
                  <input type='submit' value='Save' class='btn btn-primary'>
                </div>
              </form>
            </div>
          </div>
		</div>
		</div>
		</div>
		</section>
        ";