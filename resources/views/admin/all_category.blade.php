@extends('admin.layouts.admin_master')

@section('title','home')

@section('sidebar')

@include('admin.layouts.sidebar_menu')

@endsection


@section('content')


    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Category</h3>
              </div>

           
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">

                 <table class="table table-striped">
    <thead>
      <tr style="font-size: 20px;">
        <th>No</th>
        <th>Category Name</th>
        <th>Category Image</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr style="font-size: 16px;">
        <td><br>John</td>
        <td><br>Doe</td>
        <td><img alt="..." width="70px" height="60px"  src="{{asset('/storage/img.jpg')}}" class="profile_img"></td>
        <td><br> <button type="button" class="btn btn-info">Update</button></td>
        <td><br><button type="button" class="btn btn-danger">Danger</button></td>
      </tr>
      <tr style="font-size: 16px;">
       <td><br>John</td>
        <td><br>Doe</td>
        <td><img alt="..." width="70px" height="60px"  src="{{asset('/storage/img.jpg')}}" class="profile_img"></td>
        <td><br> <button type="button" class="btn btn-info">Update</button></td>
        <td><br><button type="button" class="btn btn-danger">Danger</button></td>
      </tr>
      <tr style="font-size: 16px;">
        <td><br>John</td>
        <td><br>Doe</td>
        <td><img alt="..." width="70px" height="60px"  src="{{asset('/storage/img.jpg')}}" class="profile_img"></td>
        <td><br> <button type="button" class="btn btn-info">Update</button></td>
        <td><br><button type="button" class="btn btn-danger">Danger</button></td>
      </tr>
    </tbody>
  </table>


             </div>
            </div>

         
        </div>
      </div>
        <!-- /page content -->



   <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

   <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

   <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>

   <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>

   <script src="{{ asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
   
    
   <script src="{{ asset('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>

   <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

   <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
   
    
   <script src="{{ asset('vendors/google-code-prettify/src/prettify.js') }}"></script>


   <script src="{{ asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>


   <script src="{{asset('vendors/switchery/dist/switchery.min.js')}}"></script>

    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>

    <script src="{{asset('vendors/autosize/dist/autosize.min.js')}}"></script>

    <script src="{{asset('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>


   <script src="{{ asset('vendors/starrr/dist/starrr.js') }}"></script>

  
   

   


   <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>


   


   <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

   <script src="{{ asset('build/js/custom.min.js') }}"></script>


@endsection

@section('footer')
  @include('admin.layouts.footer')
@endsection



