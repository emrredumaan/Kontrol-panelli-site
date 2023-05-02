<?php include"header.php";


include '../netting/baglan.php';

if (isset($_POST['arama']))
 {
   $aranan=$_POST['aranan'];
   $slidersor=$db->prepare("select * from slider where slider_ad LIKE '%aranan%' order by slider_durum DESC, slider_sira ASC limit 25");
   $slidersor->execute();



 }
 else
 {
  $slidersor=$db->prepare("select * from slider order by slider_durum DESC, slider_sira ASC limit 25");
  $slidersor->execute();
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
                    <h2>Slider İşlemleri 
                    <small>
                    <?php echo $_POST['aranan']; ?>

                        <?php if ($_GET['durum']=='ok') { ?>
                            <b style="color:green">İşlem Başarılı</b>
                            
                        <?php } elseif ($_GET['durum']=='no')  {  ?>
                          <b style="color:red">İşlem Başarısız</b>
                         <?php } ?>
                      </small>
                    </h2>
                    <div class="clearfix"></div>
                        <div class="col-md-12" align="right" >
                            <a href="slider-ekle.php"><button class=" btn btn-success " style="width: 100px; height:50px;"> 
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
                           
                            <th class="column-title text-center">Slider Resim </th>
                            <th class="column-title text-center">Slider Ad </th>
                            <th class="column-title text-center">Slider Sıra </th>
                            <th class="column-title text-center">Slider Durum </th>
                            <th width="100" class="column-title"> </th>
                            <th width="100" class="column-title"> </th>
                            </th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php


                          while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC))
                          {
                          ?>
                        

                          <tr >
                            <td class=" text-center"><img width="200" height="100" src="../../<?php echo $slidercek['slider_resimyol'];?>" alt=""></td>
                            <td class=" text-center"> <?php echo $slidercek['slider_ad'];?> </td>
                            <td class="text-center "> <?php echo $slidercek['slider_sira'];?> </td>
                            <td class=" text-center"> <?php 
                            
                          if ($slidercek['slider_durum'] == "1") {

                            echo "AKTİF";

                          }

                          else
                          {
                            echo "pasif";
                          }
                           
                           
                           ?> </td>

                            <td class=" "> 
                              <a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id'];?>">
                              <button class=" btn btn-primary " style="width: 100px; height:50px;"> Düzenle</button>
                              </a>
                            </td>


                            <td class=" ">
                              <a href="../netting/islem.php?slidersil=ok&slider_id=<?php echo $slidercek['slider_id'];?>"> 
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