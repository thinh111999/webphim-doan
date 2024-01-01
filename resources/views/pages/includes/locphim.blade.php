<form action="{{route('locphim')}}" method="GET">
   <style type="text/css">
      .stylish-filter{
         border: 0;
         background: #12171b;
         color: #fff;
      }
      .btn-filter{
            border: 0 #b2b7bb;
            background: #12171b;
            color: #fff;
            padding: 9px;
      }
   </style>
   <div class="col-md-2">
      <div class="form-group"> 
         <select class="form-control stylish-filter" name="order" id="exampleFormControlSelect1">
            <option value="">--Sắp xếp</option>
            <option value="ngaytao">Ngày đăng mới nhất</option>
            <option value="year">Năm sản xuất</option>
            <option value="title">Tên phim</option>
            <option value="topview">Lượt xem</option>
         </select>
      </div>
   </div>

   <div class="col-md-3">
      <div class="form-group">
         <select class="form-control stylish-filter" name="genre" id="exampleFormControlSelect1">
            <option value="">--Thể loại--</option> 
            @foreach($genre_home as $key => $gen_filter)
               <option {{(isset($_GET['genre']) && $_GET['genre'] == $gen_filter->id) ? 'selected' : ''}} value="{{$gen_filter->id}}">{{$gen_filter->title}}</option>                                         
            @endforeach
         </select>
      </div>
   </div>

   <div class="col-md-3">
      <div class="form-group">  
         <select class="form-control stylish-filter" name="country" id="exampleFormControlSelect1">
            <option value="">--Quốc gia--</option>
            @foreach($country_home as $key => $cou_filter)
               <option {{(isset($_GET['country']) && $_GET['country'] == $cou_filter->id) ? 'selected' : ''}} value="{{$cou_filter->id}}">{{$cou_filter->title}}</option>
            @endforeach
         </select>
      </div>
   </div>

   <div class="col-md-3">
      <div class="form-group">                                  
            @php
               if(isset($_GET['year'])){
                  $year = $_GET['year'];
               }else{
                  $year = null;
               }
            @endphp
         
         {!! Form::selectYear('year', 2000, 2023, $year, ['class'=>'form-control stylish-filter', 'placeholder'=>'--Năm phim--']) !!}                                
      </div>      
   </div>  
   <div class="col-md-1">
      <input type="submit" id="" class="btn btn-sm btn-default btn-filter" value="Lọc phim">
   </div>                           
</form>