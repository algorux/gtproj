

  <!-- Content Wrapper. Contains page content -->
  <div data-target="<?=isset($disclaimer) ? $disclaimer : '0'?>" id="disclaimer" hidden></div>
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
            <a href="<?=base_url()?>/upload" class="btn btn-primary" ><i class="nav-icon fas fa-upload"></i></a>
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
                  <li class="page-item" ><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>">«</a></li>
                  <?php
                    if (strpos($uri->getQuery(), "page=") !== FALSE)
                      // echo "Hay page";
                      $replaced = substr($uri->getQuery(), 0,strpos($uri->getQuery(), "page=") );
                    else
                      $replaced = $uri->getQuery();
                    
                    
                    
                    
                    // echo "<li  class='page-item'><a>".$replaced.$uri->getQuery()."</a></li>";
                    if (intval($total_count/10)>5 && $page/10 >= 3 && $page/10 < intval($total_count/10)) {
                      for($i = $page/10 - 2; $i< $page/10 + 2 ;$i++)
                      {
                        ?><li class="page-item" ><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        }
                    }
                    elseif ($page/10 >= intval($total_count/10) && intval($total_count/10)>3 ) {
                       for($i = $page/10 - 3; $i< $page/10 +1  ;$i++)
                      {
                        ?><li class="page-item" ><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        }
                    }
                    else{
                      $i = 0;
                      while ($i< intval($total_count/10) +1 && $i < 4 )
                      {
                        ?><li class="page-item" ><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        $i++;
                        }
                      }
                        ?>  
                    
                 
                  <li class="page-item"><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>?<?=$replaced?>&page=<?= intval($total_count/10); ?>" >»</a></li>
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
                      <!-- <a href="//collection/edit/<?=empty($value['media_id']) ? $value['id']: $value['media_id']?>" class><p class="card-text"><img src="<?= $value['url']?>" height="200" width="100%"></p></a> -->
                      <img src="<?= $value['url']?>" height="200" width="100%" class="btn btn-default modal-click"  data-target-id="<?=empty($value['media_id']) ? $value['id']: $value['media_id']?>">
                        
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
                  <li class="page-item" ><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>?<?=$replaced?>">«</a></li>
                  <?php
                    if (intval($total_count/10)>5 && $page/10 >= 3 && $page/10 < intval($total_count/10)) {
                      for($i = $page/10 - 2; $i< $page/10 + 2 ;$i++)
                      {
                        ?><li class="page-item" ><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        }
                    }
                    elseif ($page/10 >= intval($total_count/10) && intval($total_count/10)>3 ) {
                       for($i = $page/10 - 3; $i< $page/10 +1  ;$i++)
                      {
                        ?><li class="page-item" ><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        }
                    }
                    else{
                      $i = 0;
                      while ($i< intval($total_count/10) +1 && $i < 4 )
                      {
                        ?><li class="page-item" ><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>?<?=$replaced?>&page=<?=$i?>" <?= $page/10 == $i ? 'style="background:red; color:black"': ''?> ><?=$i + 1?></a></li>
                        <?php
                        $i++;
                        }
                      }
                        ?>  
                    
                 
                  <li class="page-item"><a class="page-link" href="<?=base_url().'/'.$uri->getPath()?>??<?=$replaced?>&page=<?= intval($total_count/10); ?>" >»</a></li>
                  <!-- <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-disclaimer">
                  Launch Large Modal
                </button></li> -->
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
  <!-- Comment box template -->
  <div id="user-info" meta-user-id="<?=isset($user) ? $user['id'] : 0?>" hidden></div>
  <div id="comment-container" hidden>
    <div class="timeline-item" style="border-bottom: 1px groove rgba(46,94,2013,0.62);border-radius: 20px;border-top: 1px groove rgba(213,24,24,0.62);border-radius: 20px;">
      <span class="time"><i class="fas fa-clock"></i> -when- </span>
      <h3 class="timeline-header"><a href="<?=base_url()?>/user?id=-whoid-"> -who- </a> dijo:</h3>

      <div class="timeline-body">
        -what-
      </div>
      <div class="timeline-footer">
        <!-- <a class="btn btn-primary btn-sm">Read more</a>
        <a class="btn btn-danger btn-sm">Delete</a> -->
      </div>
      <br>
    </div>
  </div>
  <!-- /Comment box -->
  <!-- Modal image -->
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Large Modal</h4> -->
          <a href="#" class="btn btn-default" id="download-element" aria-label="Download" download>
            <i class="fas fa-download"></i>
          </a>
          <a href="#" class="btn btn-default" id="edit-element" aria-label="Edit" >
            <i class="fas fa-edit"></i>
          </a>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          

        </div>
        <div class="modal-body">
          <img id="image-container" src="#">
          <div id="description-image"></div>
          <br>
          <br>
          <br>
          <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label>Comentarios</label>
                  <textarea class="form-control" rows="3" placeholder="Agregue un comentario... " id="comment-add" style="height: 69px;"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  <button type="button" id="push-comment" class="btn btn-primary pull-right" onclick="event.stopPropagation();">Enviar</button>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  
                  <div id="comments-box"></div>


                </div>
              </div>
              
              
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-disclaimer">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Disclaimer</h4>
              
            </div>
            <div class="modal-body">
              <p>
                Al acceder al sitio estás de acuerdo con lo siguiente:
                <ul>
                  <li>Tengo al menos 18 años de edad</li>
                  <li>El material que puedo ver en ésta página es para mi uso personal y no voy a exponer menores a él</li>
                  <li>Deseo recibir o enviar material de éste sitio</li>
                  <li>Mirar, leer, descargar o cargar contenido en este sitio web no viola los estándares de mi comunidad</li>
                  <li>Deseo recibir el material que este sitio web ofrece</li>
                  <li>Solamente yo soy responsable por cualquier información que yo brinde a este sitio, incluídas imágenes, textos, multimedia, entre otros, por lo que éste sitio y sus asociados no tendrán implicaciones legales por cualquier información fraudulenta que yo brinde</li>
                  <li>Este modal de advertencia es constituye un acuerdo legal entre el sitio y su usuario</li>
                  <li>Si usted ha podido leer, entender y afirmar lo arriba mencionado entiende que este sitio puede tener contenido para adultos y no va de NINGUNA forma a exponer a menores de edad al mismo</li>
                  <li>Proveer una declaración falsa tiene implicaciones legales y se considera una ofensa criminal</li>
                </ul>
              </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" id="aceptar-disclosure">Aceptar</button>
              <a href="https://google.com" class="btn btn-default">Salir</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>