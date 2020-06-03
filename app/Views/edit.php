<div class="container-fluid">
<div class="row">
          <!-- right column -->
          
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Image descriptor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form  action="<?=base_url()?>/collection/update" method="POST">
                <div class="card-body">
                  <?php
                  if (array_key_exists("id", $newbies)) {
                    
                    $meta_ids = "";
                    foreach ($tags as $value) {
                      $meta_ids.= $value.",";
                    }
                    echo '<center><img src="'.$newbies["url"].'"></center>';
                    echo '
                    <label >Descripcion del archivo (para agregar un nuevo tag utiliza <b>#</b> ej. #giantess)</label>
                    <input class="form-control" type="text" name="description['.$newbies['id'].']" placeholder="Description" value="'.$newbies["description"].'">

                    <div class="form-group">
                      <label>Tags</label>
                      <select class="select2bs4" meta-data-ids="'.$meta_ids.'" multiple="multiple" name="tags['.$newbies['id'].'][]" data-placeholder="Select tags"
                              style="width: 100%;">
                        
                      </select>
                    </div>';
                  }
                  else
                    foreach ($newbies as $value) {
                       echo '<center><img src="'.$value["url"].'"></center>';
                       echo '<label >Descripcion del archivo (para agregar un nuevo tag utiliza <b>#</b> ej. #giantess)</label>
                    <input class="form-control" type="text"  name="description['.$value['id'].']" placeholder="Description">

                    <div class="form-group">
                      <label>Tags</label>
                      <select class="select2bs4" multiple="multiple" name="tags['.$value['id'].'][]" data-placeholder="Select tags"
                              style="width: 100%;">
                        
                      </select>
                    </div>';
                     } 
                  ?>
                    
                    <br>                  
                    
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
</div>