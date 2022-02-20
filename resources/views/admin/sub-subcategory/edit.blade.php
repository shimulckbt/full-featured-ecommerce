@extends('admin.admin_master')

@section('main_content')

<div class="container-full">
   <!-- Main content -->
   <section class="content">
      <div class="row">

         <div class="col-12">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Subcategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{route('update.subsubcategory',$subsubcategory->id)}}">
                        @csrf

                        <div class="form-group">
                           <h5>Select Category <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <select name="category_id" id="category_id" required="" class="form-control">
                                 @foreach($categories as $category)
                                 <option value="{{$category->id}}" {{$category->id == $subsubcategory->category_id ? 'selected' : ''}}>{{$category->category_name_en}}</option>
                                 @endforeach
                              </select>
                              @error('category_id')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Select SubCategory <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <select name="subcategory_id" id="subcategory_id" required="" class="form-control">
                                 @foreach($subcategories as $subcategory)
                                 <option value="{{$subcategory->id}}" {{$subcategory->id == $subsubcategory->subcategory_id ? 'selected' : ''}}>{{$subcategory->subcategory_name_en}}</option>
                                 @endforeach
                              </select>
                              @error('subcategory_id')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Sub-Subcategory In English <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" id="sub_subcategory_name_en" name="sub_subcategory_name_en" class="form-control" value="{{$subsubcategory->sub_subcategory_name_en}}">
                              @error('sub_subcategory_name_en')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Sub-SubCategory Name in Mother Language <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" id="sub_subcategory_name_bn" name="sub_subcategory_name_bn" class="form-control" value="{{$subsubcategory->sub_subcategory_name_bn}}">
                              @error('sub_subcategory_name_bn')
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