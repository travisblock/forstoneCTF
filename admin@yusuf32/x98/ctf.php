<?php
if(isset($_GET['tipe'])){
    if($_GET['tipe'] == 'edit'){
        $sql= mysqli_query($con, "SELECT * FROM ctf WHERE id='$_GET[id]'");
        $d= mysqli_fetch_array($sql);
        echo "
        <section class='no-padding-top'>
        <div class='container-fluid'>
        <div class='row'>
        <div class='col-lg-10'>                           
          <div class='block'>
            <div class='title'><strong class='d-block'>Edit</strong><span class='d-block'>Editing...</span></div>
            <div class='block-body'>
              <form class='form-inline' style='width:200!important' method='POST' action='x98/editsoal.php'>
              <input type='hidden' name='id' value='$d[id]'>
                <div class='form-group col-lg-5'>
                  <label for='inlineFormInput3' class='sr-only'>Nama</label>
                  <input id='inlineFormInput3' name='nama' value='$d[nama]' type='text' class='mr-sm-3 form-control'>
                </div>

                <div class='form-group col-lg-5'>
                  <label for='inlineFormInput2' class='sr-only'>poin</label>
                  <input id='inlineFormInput2' name='poin' value='$d[poin]' type='text' class='mr-sm-3 form-control'>
                </div>
                
                <div class='form-group col-lg-10'>
                  <label for='inlineFormInput' class='sr-only'>flag</label>
                  <input id='inlineFormInput' name='flag' value='$d[flag]' type='text'class='mr-sm-3 form-control'>
                </div>

                <div class='form-group col-lg-10'>
                  <label for='kategori' class='sr-only'>Kategori</label>
                  <div class='ui-widget'>
                    <input id='kategori' name='kategori' value='$d[kategori]' type='text' class='mr-sm-3 form-control'>
                  </div>
                </div>
                <div class='form-group col-lg-10'>
                <label for='editor1' class='sr-only'>Detail</label>
                <textarea id='editor1' name='detail'>$d[detail]</textarea><br>
                </div>
                <br>
                <div class='form-group col-lg-10'>
                  <input type='submit' value='Submit' class='btn btn-primary'>
                  <input type='button' value='Batal'  class='btn btn-dark' onClick='history.back();' />
                </div>
              </form>
            </div>
          </div>
		</div>
		</div>
		</div></div>
		</section>
        ";
    }elseif($_GET['tipe'] == 'tambah'){
        echo "
        <section class='no-padding-top'>
        <div class='container-fluid'>
        <div class='row'>
        <div class='col-lg-10'>                           
          <div class='block'>
            <div class='title'><strong class='d-block'>Tambah</strong><span class='d-block'>Tambah teroos</span></div>
            <div class='block-body'>
              <form class='form-inline' style='width:200!important' method='POST' action='x98/tambahsoal.php'>
                <div class='form-group col-lg-5'>
                  <label for='inlineFormInput3' class='sr-only'>Nama</label>
                  <input id='inlineFormInput3' name='nama' placeholder='nama' type='text' class='mr-sm-3 form-control'>
                </div>

                <div class='form-group col-lg-5'>
                  <label for='inlineFormInput2' class='sr-only'>poin</label>
                  <input id='inlineFormInput2' name='poin' placeholder='poin' type='text' class='mr-sm-3 form-control'>
                </div>
                
                <div class='form-group col-lg-10'>
                  <label for='inlineFormInput' class='sr-only'>flag</label>
                  <input id='inlineFormInput' name='flag' placeholder='flag'  type='text'class='mr-sm-3 form-control'>
                </div>

                <div class='form-group col-lg-10'>
                  <label for='kategori' class='sr-only'>Kategori</label>
                  <div class='ui-widget'>
                    <input id='kategori' name='kategori' placeholder='kategori' type='text' class='mr-sm-3 form-control'>
                  </div>
                </div>
                <div class='form-group col-lg-10'>
                <label for='editor1' class='sr-only'>Detail</label>
                <textarea id='editor1' name='detail' placeholder='detail' ></textarea><br>
                </div>
                <br>
                <div class='form-group col-lg-10'>
                  <input type='submit' value='Submit' class='btn btn-primary'>
                  <input type='button' value='Batal'  class='btn btn-dark' onClick='history.back();' />
                </div>
              </form>
            </div>
          </div>
		</div>
		</div>
		</div></div>
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
                <div class="title"><strong>Manage Soal ctf.forstone.web.id</strong></div>
                <div class="table-responsive">
                    <a class='btn btn-info' href='?x=ctf&tipe=tambah'>+ soal</a> 
                <table class="table">
                    <thead>
                    <tr>                        	                     
                        <th>no</th>
                        <th>Nama</th>
                        <th>poin</th>
                        <th>Detail</th>
                        <th>Kategori</th>
                        <th width="3%">edit</th>
                        <th width="3%">delete</th>
                    </tr>
                    </thead>
                    <?php
                    $sqli = mysqli_query($con, "SELECT * from ctf order by nama ASC");
                    $no=1;
                    while($k=mysqli_fetch_array($sqli)){
                    echo " 
                    <tbody>                      
                    <tr style='border-bottom:#00adfe!important;'>
                        <td>$no</td>
                        <td>$k[nama]</td>
                        <td>$k[poin]</td>
                        <td>$k[detail]</td>
                        <td>$k[kategori]</td>
                        <td width='3%'><a href='?x=ctf&tipe=edit&id=$k[id]' class='btn btn-info'>edit</a>
                        <td width='3%'><a href='x98/hapussoal.php?id=$k[id]' onClick='return confirm(\"Anda Yakin Akan Menghafus?\")' class='btn btn-danger'>delete</a>
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