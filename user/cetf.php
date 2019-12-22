            <div class='col-md-12'>
              <div class='card card-plain'>
                <div class='card-header card-header-primary'>
                <?php
                  $sql = mysqli_query($con, "SELECT * FROM ctf order by kategori");
                  $jml = mysqli_num_rows($sql);
                ?>
                  <h4 class='card-title mt-0'> List Challenges | Total : <?php echo $jml ?></h4>
                  <p class='card-category'> </p>
                </div>
                <div class='card-body'>
                  <div class='table-responsive'>                    
                    <table class='table table-hover'>
                      <thead class=''>                        
                        <th>
                          Name
                        </th>
                        <th>
                          Points
                        </th>
                        <th>
                          Kategori
                        </th>
                        <th width="10%">
                          Detail
                        </th>
                      </thead>
  <?php

    $sql        = mysqli_query($con, "SELECT * FROM ctf order by kategori");
    while($flag = mysqli_fetch_array($sql)){
    
      $tgl        = $flag['tgl'];
      $tgl_ok     = str_replace('-', '', $tgl);

      $tgl_now    = date("Y-m-d");
      $tgl_now_ok = str_replace('-', '', $tgl_now);
      $tgl_fix    = $tgl_now_ok - $tgl_ok;
      
      $id_user    = intval($_SESSION['id']);
      $id_soal    = intval($flag['id']);
      $wes        = mysqli_query($con, "SELECT * FROM done where id_user='$id_user' and id_soal='$id_soal' ");
      $bnr        = mysqli_num_rows($wes);
      echo "
                      <tbody>
                        <tr>
                          <td>
                            $flag[nama] "; if($tgl_fix <= 4){echo "<span class='badge badge-danger'>New</span>";} echo "
                          </td>
                          <td>
                            $flag[poin]
                          </td>
                          <td>
                            $flag[kategori]
                          </td>
                          <td width='10%'>                           
                            <button  type='button'";if($bnr > 0){echo "class='view_data btn btn-success'";}else{echo "class='view_data btn btn-info'";}echo" style='padding:7px!important;text-transform:lowercase!important' data-toggle='modal' data-id='$flag[id]' data-target='#show'>Detail
                            </button>                    
                              <div class='modal fade ' id='show' role='dialog'>
                                <div class='modal-dialog text-center' role='document'>
                                  <div class='modal-content text-center'>
                                    <div class='modal-data text-center bg-dark'></div>
                                  </div>
                                </div>
                              </div>
                          </td>                          
                        </tr>                       
                      </tbody>"; 
    }  ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class='footer'>
        <div class='container-fluid'>          
          <div class='copyright text-center' id='date'>
           Powered by <a href="http://indexattacker.web.id" target="_blank"> Index Attacker</a> | <a href="https://www.alternate-csec.io" target="_blank">alternate-csec.io</a>
          </div>
        </div>
      </footer>
  
      