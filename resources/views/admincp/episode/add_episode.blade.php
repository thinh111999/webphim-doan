@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản Lý Tập Phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($episode))
                        {!! Form::open(['route'=>'episode.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['episode.update',$episode->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif

                        <div class="form-group">
                            {!! Form::label('movie_title', 'Phim', []) !!}
                            {!! Form::text('movie_title', isset($movie) ? $movie->title : '', ['class'=>'form-control','readonly']) !!}
                            {!! Form::hidden('movie_id', isset($movie) ? $movie->id : '') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Link phim', []) !!}
                            {!! Form::text('link', isset($episode) ? $episode->linkphim : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                        </div>
                       
                    @if(isset($episode))
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            {!! Form::text('episode', isset($episode) ? $episode->episode : '', ['class'=>'form-control','placeholder'=>'...',isset($episode) ? 'readonly' : '']) !!}                           
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            {!! Form::selectRange('episode', 1, $movie->sotap, $movie->sotap, ['class'=>'form-control']) !!}
                        </div>
                    @endif

                        <div class="form-group">
                            {!! Form::label('linkserver', 'Link Server', []) !!}
                            {!! Form::select('linkserver', $linkmovie, '', ['class'=>'form-control']) !!}
                        </div>

                        @if(!isset($episode))
                            {!! Form::submit('Thêm Tập Phim', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Tập Phim', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div> 
        </div>
{{-- Liệt kê phim --}}
        <div class="col-md-12">
            <div class="card">
                {{-- <a href="{{route('episode.create')}}" class="btn btn-primary">Thêm Tập Phim</a> --}}
                <table class="table table-responsive" id="tablephim">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Hình ảnh phim</th>
                        <th scope="col">Tập phim</th>
                        <th scope="col">Link phim</th>
                        <th scope="col">Server</th>
                        {{-- <th scope="col">Trạng thái</th> --}}
                        <th scope="col">Quản lý</th>
                    </tr>
                    </thead>
                    
                    <tbody>  {{-- class="order_position" --}}
                    @foreach($list_episode as $key => $episode)

                    <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$episode->movie->title}}</td>
                        <td><img width="100" src="{{asset('uploads/movie/'.$episode->movie->image)}}"></td>
                        <td><span class="badge badge-success" style="font-size: 20px" >{{$episode->episode}}</span></td>
                        <td style="width: 20%">{{$episode->linkphim}}</td>
                        <td>
                            @foreach($list_server as $key => $server_link)
                                @if($episode->server == $server_link->id) 
                                    {{$server_link->title}}
                                @endif
                            @endforeach
                        </td>
                        {{-- <td style="width: 20%">{!!$episode->linkphim!!}</td> --cách ghi này nhằm để chạy mã html trong csdl --}}
                        {{-- <td>
                        @if($episode->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                        </td> --}}
                        <td>
                            {!! Form::open(['method'=>'DELETE','route'=>['episode.destroy',$episode->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('episode.edit',$episode->id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection