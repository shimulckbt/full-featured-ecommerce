@extends('admin.admin_master')

@section('main_content')


<div class="container-full">
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-8">

            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All Categories</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>SL</th>
                              <th>Category En</th>
                              <th>Category Bn</th>
                              <th>Icon</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php($i=1)
                           @foreach($categories as $category)
                           <tr>
                              <td>{{$i++}}</td>
                              <td>{{$category->category_name_en}}</td>
                              <td>{{$category->category_name_bn}}</td>
                              <td><img src="{{asset($category->category_icon)}}" style="height: 40px; width:60;" alt="no icon"></td>
                              <td>
                                 <a href="{{route('edit.category',$category->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                 <a href="{{route('delete.category',$category->id)}}" class="btn btn-danger btn-md" title="Delete Data" id="delete"><i class="fa fa-trash-o"></i></a>
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

         <!-- add category section -->

         <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">

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