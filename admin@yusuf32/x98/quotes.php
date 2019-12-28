<?php
if(isset($_GET['tipe'])){
    if($_GET['tipe'] == 'edit'){
        $sql= mysqli_query($con, "SELECT * FROM quotes WHERE id='$_GET[id]'");
        $d= mysqli_fetch_array($sql);
        echo "
        <section class='no-padding-top'>
        <div class='container-fluid'>
        <div class='row'>
        <div class='col-lg-10'>                           
          <div class='block'>
            <div class='title'><strong class='d-block'>Edit</strong><span class='d-block'>Editing...</span></div>
            <div class='block-body'>
              <form class='form-inline' style='width:200!important' method='POST' action='x98/editquotes.php'>
              <input type='hidden' name='id' value='$d[id]'>
                <div class='form-group col-lg-5'>
                  <input id='inlineFormInput3' name='author' value='$d[author]' type='text' class='mr-sm-3 form-control'>
                </div>
                <div class='form-group col-lg-10'>
                <label for='editor1' class='sr-only'>Detail</label>
                <textarea id='editor1' name='text'>$d[text]</textarea><br>
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
            <div class='title'><strong class='d-block'>Tambah</strong><span class='d-block'>Tambah quotes</span></div>
            <div class='block-body'>
              <form class='form-inline' style='width:200!important' method='POST' action='x98/addquotes.php'>
                <div class='form-group col-lg-5'>
                  <input id='inlineFormInput3' name='author' placeholder='author' type='text' class='mr-sm-3 form-control'>
                </div>
                <div class='form-group col-lg-10'>
                <label for='editor1' class='sr-only'>Detail</label>
                <textarea id='editor1' name='text'></textarea><br>
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
                <div class="title"><strong>Manage Quotes</strong></div>
                <div class="table-responsive">
                    <a class='btn btn-info' href='?x=quotes&tipe=tambah'>+ quotes</a> 
                <table class="table">
                    <thead>
                    <tr>                        	                     
                        <th>no</th>
                        <th>Author</th>
                        <th>Quotes</th>
                        <th width="3%">edit</th>
                        <th width="3%">delete</th>
                    </tr>
                    </thead>
                    <?php
                    $sqli = mysqli_query($con, "SELECT * from quotes order by author ASC");
                    $no=1;
                    while($k=mysqli_fetch_array($sqli)){
                    echo " 
                    <tbody>                      
                    <tr style='border-bottom:#00adfe!important;'>
                        <td>$no</td>
                        <td>$k[author]</td>
                        <td>$k[text]</td>
                        <td width='3%'><a href='?x=quotes&tipe=edit&id=$k[id]' class='btn btn-info'>edit</a>
                        <td width='3%'><a href='x98/delquotes.php?id=$k[id]' onClick='return confirm(\"Anda Yakin Akan Menghafus?\")' class='btn btn-danger'>delete</a>
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