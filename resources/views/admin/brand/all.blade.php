@extends('admin.admin_master')

@section('main_content')

<div class="container-full">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="d-flex align-items-center">
         <div class="mr-auto">
            <h3 class="page-title">Data Tables</h3>
            <div class="d-inline-block align-items-center">
               <nav>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                     <li class="breadcrumb-item" aria-current="page">Tables</li>
                     <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Data Table With Full Features</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Tiger Nixon</td>
                              <td>System Architect</td>
                              <td>Edinburgh</td>
                              <td>61</td>
                              <td>2011/04/25</td>
                              <td>$320,800</td>
                           </tr>
                           <tr>
                              <td>Garrett Winters</td>
                              <td>Accountant</td>
                              <td>Tokyo</td>
                              <td>63</td>
                              <td>2011/07/25</td>
                              <td>$170,750</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>

            <!-- datatable with csv,excel,pdf file -->

            <!-- <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Hover Export Data Table</h3>
                  <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Michael Bruce</td>
                              <td>Javascript Developer</td>
                              <td>Singapore</td>
                              <td>29</td>
                              <td>2011/06/27</td>
                              <td>$183,000</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div> -->

         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->

</div>

@endsection