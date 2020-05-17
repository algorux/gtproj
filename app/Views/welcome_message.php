

  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0 text-dark">Cuadrícula</h1>
          </div><!-- /.col -->
          <div class="col-sm-2 float-rigt">
          	<button class="btn btn-primary" id="button-many-cards"><i class="nav-icon fas fa-th"></i></button>
          	<button class="btn btn-primary" id="button-few-cards"><i class="nav-icon fas fa-th-large"></i></button>
            <a href="/gtproj/upload" class="btn btn-primary" ><i class="nav-icon fas fa-upload"></i></a>
          </div>
        </div><!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item" ><a class="page-link" href="/gtproj/<?=$uri->getPath()?>">«</a></li>
                  <?php
                    if (strpos($uri->getQuery(), "page=") !== FALSE)
                      // echo "Hay page";
                      $replaced = substr($uri->getQuery(), 0,strpos($uri->getQuery(), "page=") );
                    else
                      $replaced = $uri->getQuery();
                    
                    
                    // echo $replaced . 'no hay';
                    // if (strpos($uri->getQuery(), "tags")) {
                    //   if (empty($replaced))
                    //     $replaced = $uri->getQuery();
                    // }
                    
                    
                    
                    // echo "<li  class='page-item'><a>".$replaced.$uri->getQuery()."</a></li>";
                    if (intval($total_count/10)>5 && $page/10 >= 3 && $page/10 < intval($total_count/10)) {
                      for($i = $page/10 - 2; $i< $page/10 + 2 ;$i++)
                      {
                        ?><li class="page-item" ><a class="page-link" href="/gtproj/<?=$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        }
                    }
                    elseif ($page/10 >= intval($total_count/10) && intval($total_count/10)>3 ) {
                       for($i = $page/10 - 3; $i< $page/10 +1  ;$i++)
                      {
                        ?><li class="page-item" ><a class="page-link" href="/gtproj/<?=$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        }
                    }
                    else{
                      $i = 0;
                      while ($i< intval($total_count/10) +1 && $i < 4 )
                      {
                        ?><li class="page-item" ><a class="page-link" href="/gtproj/<?=$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        $i++;
                        }
                      }
                        ?>  
                    
                 
                  <li class="page-item"><a class="page-link" href="/gtproj/<?=$uri->getPath()?>?<?=$replaced?>&page=<?= intval($total_count/10); ?>" >»</a></li>
                </ul>
          </div>
        </div>
        <br>
      	<div class="row" id="cuadricula">
      		
            
            <?php
            
            foreach ($media as  $value) {
              ?>
              <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <a href="/gtproj/collection/edit/<?=$value['id']?>" class><p class="card-text"><img src="<?= $value['url']?>" height="200" width="100%"></p></a>
                    </div>
                  </div>
              </div>
              <?php
              }//fin foreach
              ?>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-12">
              <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item" ><a class="page-link" href="/gtproj/<?=$uri->getPath()?>?<?=$replaced?>">«</a></li>
                  <?php
                    if (intval($total_count/10)>5 && $page/10 >= 3 && $page/10 < intval($total_count/10)) {
                      for($i = $page/10 - 2; $i< $page/10 + 2 ;$i++)
                      {
                        ?><li class="page-item" ><a class="page-link" href="/gtproj/<?=$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        }
                    }
                    elseif ($page/10 >= intval($total_count/10) && intval($total_count/10)>3 ) {
                       for($i = $page/10 - 3; $i< $page/10 +1  ;$i++)
                      {
                        ?><li class="page-item" ><a class="page-link" href="/gtproj/<?=$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        }
                    }
                    else{
                      $i = 0;
                      while ($i< intval($total_count/10) +1 && $i < 4 )
                      {
                        ?><li class="page-item" ><a class="page-link" href="/gtproj/<?=$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        $i++;
                        }
                      }
                        ?>  
                    
                 
                  <li class="page-item"><a class="page-link" href="/gtproj/<?=$uri->getPath()?>??<?=$replaced?>&page=<?= intval($total_count/10); ?>" >»</a></li>
                </ul>
            </div>
          </div>
      	</div>
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  

  <!-- spooky scary skeletons -->
  