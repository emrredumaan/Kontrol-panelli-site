<?php include"header.php";


include '../netting/baglan.php';

if (isset($_GET['aranan']))
 {
   $aranan=$_GET['aranan'];
   $iceriksor=$db->prepare("select * from icerik where icerik_ad LIKE '%aranan%' order by icerik_id ASC limit 25");
   $iceriksor->execute();



 }
 else
 {
  $iceriksor=$db->prepare("select * from icerik order by icerik_id DESC limit 25");
  $iceriksor->execute();
 }

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

                <div class="col-md-12">
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                       
                            

                            <form action="" method="$_POST">
                              <div class="input-group">
                                  <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelime Giriniz...">
                                <span class="input-group-btn">
                                  <button class="btn btn-default" type="submit" name="arama">Ara!</button>
                                </span>
                              </div>
                          </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="clearfix"></div>

            <div class="row">


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>İçerik İşlemleri 
                    <small>
                        <?php 
                        if(!empty($_GET['durum']))
                        {

                          if ($_GET['durum']=='ok') 
                          { ?>
                              <b style="color:green">İşlem Başarılı</b>
                              
                          <?php 
                        } 
                        elseif ($_GET['durum']=='no')  
                        {  ?>
                            <b style="color:red">İşlem Başarısız</b>
                          <?php 
                          } 
                        }
                        ?>
                      </small>
                    </h2>
                    <div class="clearfix"></div>
                 
                        <div class="col-md-12 mt-3">
                             
                    <h2 class="float-left"><?php  if(!empty($_GET['aranan']) )
                    {
                      echo $_GET['aranan'];
                    } ?> </h2>
                            <a href="icerik-ekle.php"><button class=" btn btn-success float-right" style="width: 100px; height:50px;"> 
                            <i class="fa fa-plus" aria-hidden="true"> Yeni Ekle</i></button></a>
                        </div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                           
                            <th width="180" class="column-title text-center">İçerik Tarih </th>
                            <th class="column-title">İçerik Ad </th>
                            <th class="column-title text-center">İçerik Durum </th>
                            <th width="100" class="column-title"> </th>
                            <th width="100" class="column-title"> </th>
                            </th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC))
                          {
                          ?>
                        
                          <tr >
                            <td class=" text-center"> <?php echo $icerikcek['icerik_zaman'];?> </td>
                            <td > <?php echo $icerikcek['icerik_ad'];?> </td>
                            <td class=" text-center"> <?php 
                            
                          if ($icerikcek['icerik_durum'] == "1") 
                          {

                            echo "AKTİF";

                          }

                          else
                          {
                            echo "pasif";
                          }
                           
                           
                           ?> </td>

                            <td class=" "> 
                              <a href="icerik-duzenle.php?icerik_id=<?php echo $icerikcek['icerik_id'];?>">
                              <button class=" btn btn-primary " style="width: 100px; height:50px;"> Düzenle</button>
                              </a>
                            </td>


                            <td class=" ">
                              <a href="../netting/islem.php?iceriksil=ok&icerik_id=<?php echo $icerikcek['icerik_id'];?>"> 
                              <button class=" btn btn-danger " style="width: 100px; height:50px; "> Sil</button>
                              </a>
                            </td>

                          </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

 <?php include"footer.php"; ?>