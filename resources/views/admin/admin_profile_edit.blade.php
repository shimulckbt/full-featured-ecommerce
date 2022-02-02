@extends('admin.admin_master')

@section('main_content')

<div class="container-full">

   <!-- Main content -->
   <section class="content">

      <!-- Basic Forms -->
      <div class="box">
         <div class="box-header with-border">
            <h4 class="box-title">Admin Profile Edit</h4>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="row">
               <div class="col">
                  <form novalidate="">
                     <div class="row">
                        <div class="col-12">

                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>Email Field <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="text" name="name" class="form-control" required value="{{$editData->name}}">
                                       <div class="help-block"></div>
                                    </div>
                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required form.</small>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>Email Field <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="email" name="email" class="form-control" required value="{{$editData->email}}">
                                       <div class="help-block"></div>
                                    </div>
                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required form.</small>
                                    </div>
                                 </div>
                              </div>
                           </div>


                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>profile Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                       <input type="file" name="profile_photo_path" class="form-control" required="">
                                       <div class="help-block"></div>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-5">
                                 <img style="width: 100px;height: 100px;" src=" {{(!empty($adminData->profile_photo_path))?url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg')}}" alt="User Avater">
                              </div>

                           </div>

                           <div class=" text-xs-right">
                              <input type="submit" class="btn btn-rounded btn-info" value="Update">
                           </div>
                  </form>

               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->
</div>

@endsection