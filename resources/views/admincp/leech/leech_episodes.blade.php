@extends('layouts.app')
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên phim</th>
            <th scope="col">Slug phim</th>
            <th scope="col">Tổng số tập</th>
            <th scope="col">Tập mới nhất</th>
            <th scope="col">Server Phim</th>
            <th scope="col">Server Embed</th>
            <th scope="col">Server M3U8</th>

            <th scope="col">Quản lý</th>
        </tr>
    </thead>
    <tbody class="order_position">
        @foreach($resp['episodes'] as $key => $res)
            <tr>
                <th scope="row">{{$key}}</th>
                <td> {{$resp['movie']['name']}} </td>
                <td> {{$resp['movie']['slug']}} </td>
                <td> {{$resp['movie']['episode_total']}} </td>
                <td> {{$resp['movie']['episode_current']}} </td>

                <td> {{$res['server_name']}} </td>
                <td>
                    @foreach($res['server_data'] as $key => $server_1)
                        <ul>
                            <li>Tập: {{$server_1['name']}}
                                <input type="text" class="form-control" value="{{$server_1['link_embed']}}">
                            </li>
                        </ul>
                    @endforeach
                </td>
                <td>
                    @foreach($res['server_data'] as $key => $server_2)
                        <ul>
                            <li>Tập: {{$server_2['name']}}
                                <input type="text" class="form-control" value="{{$server_2['link_m3u8']}}">
                            </li>
                        </ul>
                    @endforeach
                </td>
                <td>
                    <form method="POST" action="{{route('leech-episodes-store',$resp['movie']['slug'])}}">
                        @csrf
                        <input type="submit" class="btn btn-success ben-sm" value="Add Episode">
                    </form>  
                    <form method="POST" action="">
                        @csrf
                        <input type="submit" class="btn btn-danger ben-sm" value="Delete Episode">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
