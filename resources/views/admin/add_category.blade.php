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
                <h3>Add Category</h3>
              </div>

            
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{url('addCategory')}}" method="POST" enctype="multipart/form-data">

                        {{csrf_field()}}
                   
                    
                     
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="category_name">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category Image</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="file" name="category_image">
                        </div>
                      </div>


                        <div class="form-group">
                        <div class="checkbox">
                            <label class="col-md-6 col-md-offset-3">
                              <input type="checkbox" class="flat" value="1" name="publish"><b> Publish</b>
                            </label>
                          </div>
                      </div>

                    
                       

                      
                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
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



