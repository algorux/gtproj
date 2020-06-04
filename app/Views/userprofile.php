<section class="col-lg-12 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-user mr-1"></i>
                  Perfil de <?=$username?>
                </h3>
                <div class="card-tools">
                  <!-- <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul> -->
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <?= $canedit ? '<form role="form" action="'.base_url().'/user/update/'.$id.'" method="POST" enctype="multipart/form-data">' : ''?>
                  <?php
                  if ($canedit == 1) {
                    
                  ?>
                  <div class="row">
                    <div class="input-group mb-3 col-md-6">
                      <input type="text" class="form-control" name="name" placeholder="Nombre" value="<?=$name?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          Nombre
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3 col-md-6">
                      <input type="text" class="form-control" name="lastname" placeholder="Apellido" value="<?=$lastname?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          Apellido
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-group mb-3 col-md-6">
                      <input type="text" class="form-control" name="email" placeholder="Email" value="<?=$email?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          Email
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3 col-md-6">
                      <select type="text" class="form-control" name="gender">">
                        <option disabled>Seleccione...</option>
                        <option value="m" <?= $gender == 'm' ? 'selected' : ''?>>Masculino</option>
                        <option value="f"<?= $gender == 'f' ? 'selected' : ''?>>Femenino</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          Género
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>Solo si desea cambiar el password, llene los campos, si no déjelos en blanco</p>
                  </div>
                  <div class="row">
                    <div class="input-group mb-3 col-md-6">
                      <input type="password" class="form-control" name="password" placeholder="password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          Password
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3 col-md-6">
                      <input type="password" class="form-control" name="confirm_password" placeholder="password" >
                      <div class="input-group-append">
                        <div class="input-group-text">
                          Confirme Password
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <button type="submit" class="btn btn-info">Actualizar</button>
                  </div>
                 <?php
                  }
                  else {
                    date_default_timezone_set ('America/Mexico_City');
                    $date = new DateTime($birthday);
                    $birthday = $date->format('j \d\e M');
                 ?>
                 <div class="row">
                   <div class="col-md-6 bg-">
                    <h3 >Nombre de usuario:</h3><h2><?=$username?></h2>
                  </div>
                  <div class="col-md-6">
                    <h3>Género:</h3><h2><?=$gender=='m' ? 'Masculino' : $gender == 'f' ? 'Femenino' : 'Prefiero no decirlo' ?></h2>
                  </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6">
                    <h3>Nombre:</h3><h2><?=$name == "" ? 'Prefiero no decirlo' : $name ?></h2>
                    </div>
                    <div class="col-md-6">
                      <h3>Apellido:</h3><h2><?=$lastname == "" ? 'Prefiero no decirlo' : $lastname ?></h2>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <h3>Cumpleaños:</h3><h2><?=$birthday == "" ? 'Prefiero no decirlo' : $birthday ?></h2>
                    </div>
                  </div>
                 

                 <?php
                 }
                 ?>
                  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            
          </section>