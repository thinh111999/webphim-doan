@extends('layouts.app')
@section('content')
<!-- Modal chi tiết phim -->
<div class="modal fade" id="chitietphim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="content-title"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <span id="content-detail"></span>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

<!-- Modal tập phim-->
<div class="modal fade" id="tapphim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="content-episode"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <span id="content-detail-episode"></span>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>
{{-- Hiển thị thông tin trang --}}
<table class="table">
    <tr>
        <th scope="col-md-2">Tổng phim: {{ $resp['pagination']['totalItems'] }}</th>
        <th scope="col-md-2">Phim từng trang: {{ $resp['pagination']['totalItemsPerPage'] }}</th>
        <th scope="col-md-2">Trang hiện tại:
            <select class="form-control" name="page" id="exampleFormControlSelect">
                @for ($i = 1; $i <= $resp['pagination']['totalPages']; $i++)
                    <option value="{{ $i }}" {{ $i == $resp['pagination']['currentPage'] ? 'selected' : '' }}>
                        <b>{{ $i }}</b> 
                    </option>
                @endfor
            </select>
        </th>
        <th scope="col-md-2">Tổng trang: {{ $resp['pagination']['totalPages'] }}</th>
        <th scope="col-md-2">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm" name="keyword" id="keyword">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="searchBtn">Tìm kiếm</button>
                </div>
            </div>
        </th>
    </tr>
</table>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên phim</th>
            <th scope="col">Tên chính thức</th>
            <th scope="col">Hình ảnh phim</th>
            <th scope="col">Hình ảnh poster</th>
            <th scope="col">slug</th>
            <th scope="col">_Id</th>
            <th scope="col">Year</th>
            <th scope="col">Quản lý</th>
        </tr>
    </thead>
    <tbody class="order_position">
        @foreach($resp['items'] as $key => $res)
            <tr>
                <th scope="row">{{$key}}</th>
                <td> {{$res['name']}} </td>
                <td> {{$res['origin_name']}} </td>
                <td> <img src="{{$resp['pathImage'].$res['thumb_url']}}" height="150" width="100"> </td>
                <td> <img src="{{$resp['pathImage'].$res['poster_url']}}" height="150" width="100"> </td>
                <td> {{$res['slug']}} </td>
                <td> {{$res['_id']}} </td>
                <td> {{$res['year']}} </td>
                <td>
                    <button type="button" data-movie_slug="{{$res['slug']}}" class="btn btn-primary btn-sm leech_details" data-toggle="modal" data-target="#chitietphim">
                        Chi tiết phim nhanh gọn
                    </button>
                    <button type="button" data-movie_slug="{{$res['slug']}}" class="btn btn-success btn-sm leech_details_episode" data-toggle="modal" data-target="#tapphim">
                        Tập phim nhanh gọn
                    </button>
                    <a href="{{route('leech-detail', $res['slug'])}}" class="btn btn-primary btn-sm">Chi tiết phim</a>
                    <a href="{{route('leech-episodes', $res['slug'])}}" class="btn btn-dark btn-sm">Tập phim</a>
                    @php
                        $movie = \App\Models\Movie::where('slug', $res['slug'])->first();
                    @endphp
                    @if(!$movie)
                        <form method="POST" action="{{route('leech-store',$res['slug'])}}">
                            @csrf
                            <input type="submit" class="btn btn-success" value="Thêm Movie">
                        </form>   
                    @else
                        <form method="POST" action="{{route('movie.destroy',$movie->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Xóa Movie">
                        </form> 
                    @endif                    
                </td>
                {{-- <td>
                    {!! Form::open(['method'=>'DELETE','route'=>['category.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
                    {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    <br>
                    <a href="{{route('category.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
@push('scripts')
    <script>
        document.getElementById('searchBtn').addEventListener('click', function() {
            const keyword = document.getElementById('keyword').value;
            window.location.href = `{{ route('leech-search') }}?keyword=${keyword}`;
        });
    </script>
@endpush
@endsection
