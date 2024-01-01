@extends('layouts.app')

@section('content')
<div class="modal" id="videoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><span id="video_title"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="video_desc"></p>
          <p id="video_link"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        border: 1px solid #cfcbcf;
        padding: 8px;
    }

    .table th {
        background-color: #e6d1d1;
        position: sticky;
        left: 0;
    }

    /* Cố định cột thứ tự bên trái */
    .table td:first-child {
        position: sticky;
        left: 0;
        background-color: #492323;
    }
    .table tr {
    border-bottom: 3px solid #000;
    }
</style>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
		{{-- <div class="card"> --}}
			{{-- <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm Phim</a> --}}
			<table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Tùy chỉnh</th>
                    <th scope="col">Tập phim</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Thời lượng phim</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $cate)
                    <tr>
                        <th scope="col">{{$key}}</th>
                        <td>{{$cate->title}}</td>
                        <td>
                            @foreach($cate->movie_genre as $gen)
                            <span class="badge badge-dark">{{$gen->title}}</span>
                            @endforeach
                            <a href="{{route('movie.edit',$cate->id)}}" class="btn btn-success btn-sm">Cập nhật</a>
                        </td> 

                        <td>
                            @foreach($cate->movie_category as $catego)
                            <span class="badge badge-dark">{{$catego->title}}</span>
                            @endforeach
                        </td>

                        <td>
                            Phim hot:
                            <select name="" id="{{$cate->id}}" class="phim_hot_choose">
                                @if($cate->phim_hot==0)
                                    <option value="1">Có</option>
                                    <option selected value="0">Không</option>
                                @else
                                    <option selected value="1">Có</option>
                                    <option value="0">Không</option>
                                @endif
                            </select>

                            <br> Định dạng:
                            @php
                                $options = array('0'=>'SD', '1'=>'HD', '2'=>'HDCam', '3'=>'Cam', '4'=>'FullHD', '5'=>'Trailer');
                            @endphp
                                <select id="{{$cate->id}}" class="resolution_choose">
                                    @foreach($options as $key => $resolution)
                                        <option {{$cate->resolution == $key ? 'selected' : ''}} value={{$key}}>{{$resolution}}</option>
                                    @endforeach
                                </select>

                            <br> Phụ đề:
                            <select name="" id="{{$cate->id}}" class="phude_choose">
                                @if($cate->phude==0)
                                    <option value="1">Phụ đề</option>
                                    <option selected value="0">Thuyết minh</option>
                                @else
                                    <option selected value="1">Phụ đề</option>
                                    <option value="0">Thuyết minh</option>
                                @endif
                            </select>

                            <br>Trạng thái:
                            <select name="" id="{{$cate->id}}" class="status_choose">
                                @if($cate->status==0)
                                    <option value="1">Hiển thị</option>
                                    <option selected value="0">Không hiển thị</option>
                                @else
                                    <option selected value="1">Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                @endif
                            </select>

                            <br>Quốc gia:
                            {{-- {{ $cate->country ? $cate->country->title : 'N/A' }} --}}
                            {!! Form::select('country_id', $country, $cate->country_id, ['class'=>'form-control country_choose', 'id'=>$cate->id]) !!}

                            <br>Thuộc phim:
                            <select name="" id="{{$cate->id}}" class="thuocphim_choose">
                                @if($cate->thuocphim==0)
                                    <option value="1">Phim lẻ</option>
                                    <option selected value="0">Phim bộ</option>
                                @else
                                    <option selected value="1">Phim lẻ</option>
                                    <option value="0">Phim bộ</option>
                                @endif
                            </select>

                            <br>Năm phim:
                            {!! Form::selectYear('year', 2000, 2023, isset($cate->year) ? $cate->year : '' , ['class'=>'select-year', 'id'=>$cate->id, 'placeholder'=>'--Năm phim--']) !!}
                            
                            <br>Top Views:
                            {!! Form::select('topview', ['0'=>'Ngày','1'=>'Tuần', '2'=>'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class'=>'select-topview', 'id'=>$cate->id, 'placeholder'=>'--Views--']) !!}

                            <br>Season:
                            <form method="POST">
                            @csrf
                                {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '' , ['class'=>'select-season', 'id'=>$cate->id]) !!}
                            </form>
                        </td>
                        <td>
                            <a href="{{route('add-episode',[$cate->id])}}" class="btn btn-success btn-sm">Thêm tập phim</a>
                            @foreach($cate->episode as $key => $epi)
                                <a class="show_video" 
                                data-movie_video_id="{{$epi->movie_id}}" 
                                data-video_episode="{{$epi->episode}}" 
                                style="color: aliceblue; cursor: pointer">
                                    <span class="badge badge-dark">{{$epi->episode}}</span>
                                </a>
                            @endforeach
                            Số tập: {{$cate->episode_count}}/{{ $cate->sotap}} Tập
                        </td> 
                {{----------------------------------------------------------------------------------}}      
                        <td>
                            <textarea class="tags_choose" name="tags" cols="30" rows="5">{{$cate->tags}}</textarea>
                            <button id="updateButton" class="btn btn-success btn-sm">UP</button>
                        </td>
                {{----------------------------------------------------------------------------------}}    
                        <td>
                            {{ $cate->thoiluong ? $cate->thoiluong : 'Chưa cập nhật' }}
                        </td>
        
                {{----------------------------------------------------------------------------------}}   
                        <td>
                            @php
                                $image_check = substr($cate->image,0,5);
                            @endphp
                            @if($image_check != 'https')
                                <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$cate->image)}}" alt="{{$cate->title}}" title="{{$cate->title}}"></figure>
                            @else
                                <figure><img class="lazy img-responsive" src="{{$cate->image}}" alt="error" title="{{$cate->title}}"></figure>
                            @endif
                            <input type="file" data-movie_id="{{$cate->id}}" id="file-{{$cate->id}}" class="form-control-file file_image" accept="image/*">
                            <span id="success_image"></span>
                        </td>
                {{----------------------------------------------------------------------------------}}   
                        <td>
                            {{$cate->ngaycapnhat}}
                        </td>
                {{----------------------------------------------------------------------------------}}   
                        <td> {{$cate->slug}}</td>  
    
                    <td>
                        {!! Form::open(['method'=>'DELETE','route'=>['movie.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('movie.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
			</table>
		{{-- </div> --}}
	    </div>
	</div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#movie">
	Thêm nhanh
</button>
<!-- Modal -->
<div class="modal fade" id="movie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		{!! Form::open(['route'=>'movie.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
			<div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Quản lý phim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        {{-- <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt Kê Danh Sách Phim</a>
                        <div class="card-header">Quản Lý Phim</div> --}}
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        {{-- title --}}
                            <div class="form-group">
                                {!! Form::label('title', 'Tên phim', []) !!}
                                {!! Form::text('title', isset($movie) ? $movie->title : '', ['class'=>'form-control','placeholder'=>'...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                            </div>
                        {{-- episode --}}
                            <div class="form-group">
                                {!! Form::label('sotap', 'Số tập phim', []) !!}
                                {!! Form::text('sotap', isset($movie) ? $movie->sotap : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                            </div>
                        {{-- Time to watch --}}
                            <div class="form-group">
                                {!! Form::label('thoiluong', 'Thời lượng phim', []) !!}
                                {!! Form::text('thoiluong', isset($movie) ? $movie->thoiluong : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                            </div>
                        {{-- english name --}}
                            <div class="form-group">
                                {!! Form::label('Tên tiếng anh', 'Tên tiếng anh', []) !!}
                                {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                            </div>
                        {{-- trailer --}}
                            <div class="form-group">
                                {!! Form::label('trailer', 'Trailer', []) !!}
                                {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                            </div>
                        {{-- link url --}}
                            <div class="form-group">
                                {!! Form::label('slug', 'Đường dẫn', []) !!}
                                {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class'=>'form-control','placeholder'=>'...','id'=>'convert_slug']) !!}
                            </div>
                        {{-- description --}}
                            <div class="form-group">
                                {!! Form::label('description', 'Mô tả phim', []) !!}
                                {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description']) !!}
                            </div>
                        {{-- tags --}}
                            <div class="form-group">
                                {!! Form::label('tags', 'Tags phim', []) !!}
                                {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...']) !!}
                            </div>
                        {{-- status --}}
                            <div class="form-group">
                                {!! Form::label('status', 'Trạng thái', []) !!}
                                {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($movie) ? $movie->status : '', ['class'=>'form-control']) !!}
                            </div>
                        {{-- sub --}}
                            <div class="form-group">
                                {!! Form::label('phude', 'Phụ đề', []) !!}
                                {!! Form::select('phude', ['0'=>'Vietsub','1'=>'Thuyết minh'], isset($movie) ? $movie->phude : '', ['class'=>'form-control']) !!}
                            </div>
                        {{-- quality --}}
                            <div class="form-group">
                                {!! Form::label('resolution', 'Định dạng', []) !!}
                                {!! Form::select('resolution', ['0'=>'SD','1'=>'HD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD','5'=>'Trailer'], isset($movie) ? $movie->resolution : '', ['class'=>'form-control']) !!}
                            </div>
                        {{-- category --}}
                            <div class="form-group">
                                {!! Form::label('Category', 'Danh mục', []) !!}
                                {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', ['class'=>'form-control']) !!}
                            </div>
                        {{-- thuộc phim bô hoặc lẻ --}}
                            <div class="form-group">
                                {!! Form::label('thuocphim', 'Thuộc loại phim (Bộ hay Lẻ)', []) !!}
                                {!! Form::select('thuocphim', ['0'=>'Phim Lẻ','1'=>'Phim Bộ'], isset($movie) ? $movie->thuocphim : '', ['class'=>'form-control']) !!}
                            </div>
                        {{-- country --}}
                            <div class="form-group">
                                {!! Form::label('Country', 'Quốc gia', []) !!}
                                {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class'=>'form-control']) !!}
                            </div>
                        {{-- genre --}}
                            <div class="form-group">
                                {!! Form::label('Genre', 'Thể loại', []) !!} <br>
                                    @foreach($list_genre as $key => $gen)
                                        @if(isset($movie)) <!-- Kiểm tra xem biến $movie đã được khai báo hay chưa -->
                                            {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                                        @else
                                            {!! Form::checkbox('genre[]', $gen->id,'') !!}		
                                        @endif
                                        {!! Form::label('genre', $gen->title) !!} <br>
                                    @endforeach                           
                            </div>
                        
                        {{-- hot movie --}}
                            <div class="form-group">
                                {!! Form::label('Hot', 'Phim hot', []) !!}
                                {!! Form::select('phim_hot', ['1'=>'Có','0'=>'Không'], isset($movie) ? $movie->phim_hot : '', ['class'=>'form-control']) !!}
                            </div>
                        {{-- image --}}
                            <div class="form-group">
                                {!! Form::label('Image', 'Hình ảnh', []) !!}
                                {!! Form::file('image', ['class'=>'form-control-file']) !!}
                                @if(isset($movie))
                                    <img width="150" src="{{asset('uploads/movie/'.$movie->image)}}">
                                @endif
                            </div>
                            {{-- @if(!isset($movie))
                                {!! Form::submit('Thêm Phim', ['class'=>'btn btn-success']) !!}
                            @else
                                {!! Form::submit('Cập Nhật Phim', ['class'=>'btn btn-success']) !!}
                            @endif --}}
                        
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {!! Form::submit('Thêm Phim', ['class'=>'btn btn-success']) !!}
                </div>
			</div>
		{!! Form::close() !!}
	</div>
</div>

@endsection

