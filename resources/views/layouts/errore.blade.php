@if(session()->has('msg'))
    
 <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('msg')}}
 </div>
@endif