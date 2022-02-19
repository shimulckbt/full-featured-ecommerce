@extends('admin.admin_master')

@section('main_content')

<div class="container-full">
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-8">

            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All Subcategories</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th Width="5%">SL</th>
                              <th Width="15%">Category</th>
                              <th Width="15%">Subcategory En</th>
                              <th Width="15%">Subcategory Bn</th>
                              <th Width="20%">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php($i=1)
                           @foreach($subcategories as $subcategory)
                           <tr>
                              <td>{{$i++}}</td>
                              <td>{{$subcategory->category_id}}</td>
                              <td>{{$subcategory->subcategory_name_en}}</td>
                              <td>{{$subcategory->subcategory_name_bn}}</td>
                              <td>
                                 <a href="{{route('edit.subcategory',$subcategory->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                 <a href="{{route('delete.subcategory',$subcategory->id)}}" class="btn btn-danger btn-md" title="Delete Data" id="delete"><i class="fa fa-trash-o"></i></a>
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

         <!-- add subcategory section -->

         <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Subcategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <form method="post" action="{{route('create.subcategory')}}">
                        @csrf

                        <div class="form-group">
                           <h5>Select Category <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <select name="category_id" id="category_id" required="" class="form-control">
                                 <option value="" selected disabled>Select Category</option>
                                 @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                 @endforeach
                              </select>
                              @error('category_id')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Subcategory Name in English <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" id="subcategory_name_en" name="subcategory_name_en" class="form-control" required>
                              @error('subcategory_name_en')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group">
                           <h5>Subcategory in Mother Language <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="text" id="subcategory_name_bn" name="subcategory_name_bn" class="form-control" required>
                              @error('subcategory_name_bn')
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

         <!-- add subcategory section end -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->

</div>

@endsection