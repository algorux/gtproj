<div class="container-fluid">
<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Uploaded files</h3>
                <div class="float-right"> 
                  <button class="btn btn-success " id="btn-adder"><i class="fa fa-plus"></i></button>
                  <button class="btn btn-primary " id="btn-dismisser"><i class="fa fa-minus"></i></button>

                </div>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/gtproj/upload/" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label >Archivos</label>
                    <div id="form-file-container"></div>
                  </div>
                  
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

<!-- spooky scary skelletons -->
<div id="upload-sample" hidden>
  <div class="input-group" >
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="media[]"  >
      <label class="custom-file-label labless" >Select</label>
    </div>
    <!-- <div class="input-group-append">
      <span class="input-group-text" id="">Upload</span>
    </div> -->
  </div>
</div>