@extends('admin.admin_master')

@section('main_content')

<div class="container-full">
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-8">

            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All Brands</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>SL</th>
                              <th>Brand En</th>
                              <th>Brand Bn</th>
                              <th>Image</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php($i=1)
                           @foreach($brands as $brand)
                           <tr>
                              <td>{{$i++}}</td>
                              <td>{{$brand->brand_name_en}}</td>
                              <td>{{$brand->brand_name_bn}}</td>
                              <td><img src="{{asset($brand->brand_image)}}" style="height: 40px; width:70;" alt="no image"></td>
                              <td>
                                 <a href="{{route('edit.brand',$brand->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                 <a href="{{route('delete.brand',$brand->id)}}" class="btn btn-danger btn-md" title="Delete Data" id="delete"><i class="fa fa-trash-o"></i></a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>

         </div>

         <!-- add brand section -->

         <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{route('brand.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <h5>Brand Name in English <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="brand_name_en" id="brand_name_en" name="brand_name_en" class="form-control" required>
                              @error('brand_name_en')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Brand Name in Mother Language <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="brand_name_bn" id="brand_name_bn" name="brand_name_bn" class="form-control" required>
                              @error('brand_name_bn')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Brand Image <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="file" id="brand_image" name="brand_image" class="form-control" required>
                              @error('brand_image')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class=" text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info btn-md" value="Add New">
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>

         </div>

         <!-- add brand section end -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->

</div>

@endsection