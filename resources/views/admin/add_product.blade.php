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
                <h3>Add Product</h3>
              </div>

            
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
               
                  <div class="x_content">
                    @include('admin.layouts.errore')
                    <br />


                     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{url('addProduct')}}" method="POST" enctype="multipart/form-data">

                        {{csrf_field()}}
                   
                    
                     
                     


                      
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="category" class="form-control">
                            <option value="">Choose</option>
                            @foreach($cats as $cat)
                              <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                          
                          </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Product Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="product_category" class="form-control">
                            <option value="">Choose</option>
                            @foreach($pro_cats as $pro_cat)
                              <option value="{{$pro_cat->id}}">{{$pro_cat->pro_cat_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="product_name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Actual Price</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="Number" name="actual_price">
                        </div>
                      </div>

                        <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Offer Price(* optional)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="Number" name="offer_price">
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Size(* optional)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="size">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Colour(* optional)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="color">
                        </div>
                      </div>




                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Quantity</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="Number" name="quantity">
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product View Image(*Maximum size 2 mb)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="file" name="product_image">
                        </div>
                      </div>



                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product deatils Images(*Maximum size 2 mb)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="file" multiple="multiple" name="product_details_images[]">
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea  name="description"></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="checkbox">
                            <label class="col-md-6 col-md-offset-3">
                              <input type="checkbox" class="flat" value="1" name="publish"><b> Publish</b>
                            </label>
                          </div>
                      </div>

                       <div class="form-group">
                        <div class="checkbox">
                            <label class="col-md-6 col-md-offset-3">
                              <input type="checkbox" class="flat" value="1" name="new_arrivel"><b>Show as new arrivel</b>
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



