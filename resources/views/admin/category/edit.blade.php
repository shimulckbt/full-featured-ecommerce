@extends('admin.admin_master')

@section('main_content')

<div class="container-full">
   <!-- Main content -->
   <section class="content">
      <div class="row">

         <div class="col-12">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{route('update.category',$category->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_icon" value="{{$category->category_icon}}">
                        <div class="form-group">
                           <h5>Category Name in English <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" id="category_name_en" name="category_name_en" class="form-control" value="{{$category->category_name_en}}">
                              @error('category_name_en')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Category Name in Mother Language <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" id="category_name_bn" name="category_name_bn" class="form-control" value="{{$category->category_name_bn}}">
                              @error('category_name_bn')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Category Icon <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="file" id="category_icon" name="category_icon" class="form-control">
                              @error('category_icon')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class=" text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info btn-md" value="Update">
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>

         </div>

         <!-- add category section end -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->

</div>

@endsection