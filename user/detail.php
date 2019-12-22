<?php 
session_start();
if(!isset($_SESSION['login'])){
  header('location:index.php');
}
include_once("../admin@yusuf32/config.php");
if($_POST['getDetail']) {
    $idd        = intval($_POST['getDetail']);
    $idyuser    = intval($_SESSION['id']);
    $sqli       = mysqli_query($con, "SELECT * from ctf where id='$idd'");
    while($d    = mysqli_fetch_array($sqli)){
        $sudah  = mysqli_query($con, "SELECT * from done where id_user='$idyuser' and id_soal='$d[id]'");
        $cek    = mysqli_num_rows($sudah);
        $cekjmlsolver = mysqli_query($con, "select done.*, user.nick, user.usrname from done inner join user on done.id_user = user.id where done.id_soal ='$idd' ");
        $jmlsolver = mysqli_num_rows($cekjmlsolver);
        echo "<br>
        
        
        <ul class='nav nav-tabs apex' role='tablist'>
            <li role='presentation' ><a href='#uploadTab' class='labels' aria-controls='uploadTab' role='tab' data-toggle='tab'>Chall</a></li>
            <li role='presentation' ><a style='margin-left:20px;' href='#browseTab' class='labels' aria-controls='browseTab' role='tab' data-toggle='tab'>$jmlsolver Solver</a></li>
        </ul>

        <div class='tab-content'>
            <div role='tabpanel' class='tab-pane active' id='uploadTab'>
                <div class=' bg-dark text-center' style='font-weight:900'>$d[nama]</div>
                <div class='modal-body bg-dark'>
                    <div class='form-group my-4 text-left'>
                        <ul>
                            <li><strong>Detail : </strong>$d[detail]</li>
                            <li>Kategori : $d[kategori]</li>            
                        </ul>
                    </div>
                    <div class='form-group my-4'>
                        <form method='POST' action='submit.php'>
                            <input name='id' type='hidden' value='$d[id]' >";
                            if($cek > 0){echo ""; }else{echo " 
                            <label>Submit Flag</label><br>
                            <input type='text' name='flag' class='form-control'>";} echo "
                            <div class='form-group my-4'>";
                                if($cek > 0){echo ""; }else{echo "                    
                                <button type='submit' class='btn btn-info' name='submitFlag'>Submit</button>";} echo "
                                <button type='button' data-dismiss='modal' class='btn btn-danger'>Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>";
            }

            $sqlsolver = mysqli_query($con, "select done.*, user.nick, user.usrname from done inner join user on done.id_user = user.id where done.id_soal ='$idd' order by done.tgl desc limit 8 ");

            ?>

            <div role='tabpanel' class='tab-pane' id='browseTab'>
                <div class='modal-body bg-dark'>
                    <div class='form-group my-4 text-left'>
                        <table class='table table-hover' style='background:#343a40'>
                          <thead style='border-bottom:1px solid #00adfe;'>                        
                            <th>
                              Nick
                            </th>
                            <th width="20%">
                              Date
                            </th>
                          </thead>
                          <?php
                            while($datasolver = mysqli_fetch_array($sqlsolver)){
                                $solver = aman($datasolver['nick']);
                                $tgl = $datasolver['tgl'];
                                echo "
                                <tbody>
                                    <tr>
                                        <td>$solver</td>
                                        <td>$tgl</td>
                                    </tr>
                                </tbody> ";
                            }?>
                        </table>
                    </div>              
                        <button type='button' data-dismiss='modal' class='btn btn-danger'>Close</button>                        
                </div>
            </div>
        </div>

<?php
    
}