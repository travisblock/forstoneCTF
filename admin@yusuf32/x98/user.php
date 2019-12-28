<?php
if(isset($_GET['tipe'])){
    if($_GET['tipe'] == 'edit'){
        $sql= mysqli_query($con, "SELECT * FROM user WHERE id='$_GET[id]'");
        $d= mysqli_fetch_array($sql);
        echo "
        <section class='no-padding-top'>
        <div class='container-fluid'>
        <div class='row'>
        <div class='col-lg-10'>                           
          <div class='block'>
            <div class='title'><strong class='d-block'>Edit</strong><span class='d-block'>Editing...</span></div>
            <div class='block-body'>
              <form class='form' method='POST' action='x98/edit.php'>
              <input type='hidden' name='id' value='$d[id]'>
                <div class='form-group'>
                  <label for='inlineFormInput' class='sr-only'>Nama</label>
                  <input name='nick' value='$d[nick]' placeholder='Nick' type='text' class='mr-sm-2 form-control'>
                </div>
                <div class='form-group'>
                  <label for='inlineFormInput' class='sr-only'>Username</label>
                  <input name='usrname' value='$d[usrname]' placeholder='Username' type='text' class='mr-sm-2 form-control'>
                </div>
                 <div class='form-group'>
                  <label for='inlineFormInput' class='sr-only'>Password</label>
                  <input name='password' type='password' placeholder='Password' class='mr-sm-4 form-control'>
                </div>
                <br>
                <div class='form-group'>
                  <input type='submit' value='Submit' class='btn btn-primary'>
                  <input type='button' value='Batal'  class='btn btn-dark' onClick='history.back();' />
                </div>
              </form>
            </div>
          </div>
		</div>
		</div>
		</div>
		</section>
        ";
    }
}else{
?>
    <section class="no-padding-top">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="block margin-bottom-sm">
                <div class="title"><strong>Manage User</strong></div>
                <div class="table-responsive"> 
                <table class="table">
                    <thead>
                    <tr>                        	                     
                        <th>no</th>
                        <th>Nick</th>
                        <th>Username</th>
                        <th>Poin</th>
                        <th width="5%">edit</th>
                        <th width="5%">delete</th>
                    </tr>
                    </thead>
                    <?php
                    $sqli = mysqli_query($con, "SELECT * from user order by id DESC");
                    $no=1;
                    while($k=mysqli_fetch_array($sqli)){
                        $nic = aman($k['nick']);
                        $usern = aman($k['usrname']);
                    echo " 
                    <tbody>                      
                    <tr style='border-bottom:#00adfe!important;'>
                        <td>$no</td>
                        <td>$nic</td>
                        <td>$usern</td>
                        <td>$k[nilai]</td>
                        <td width='5%'><a href='?x=user&tipe=edit&id=$k[id]' class='btn btn-info'>edit</a></td>
                        <td width='5%'><a href='x98/hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin Akan Menghafus?\")' class='btn btn-danger'>delete</a>
                        </td>                          
                    </tr>
                    </tbody>";
                    $no++;
                    }?>
                </table>
                </div>
            </div>
            </div>
    </section>        
<?php
}