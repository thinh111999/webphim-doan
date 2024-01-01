@extends('layouts.app')
@section('content')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>

                <th scope="col">_id</th>
                <th scope="col">name</th>
                <th scope="col">slug</th>
                <th scope="col">origin_name</th>
                <th scope="col">content</th>

                <th scope="col">type</th>       
                <th scope="col">status</th>
                <th scope="col">thumb_url</th>
                <th scope="col">poster_url</th>
                <th scope="col">is_copyright</th>

                <th scope="col">sub_docquyen</th>
                <th scope="col">chieurap</th>
                <th scope="col">trailer_url</th>
                <th scope="col">time</th>
                <th scope="col">episode_current</th>

                <th scope="col">episode_total</th>
                <th scope="col">quality</th>
                <th scope="col">lang</th>
                <th scope="col">notify</th>
                <th scope="col">showtimes</th>

                <th scope="col">year</th>
                <th scope="col">view</th>
                <th scope="col">actor</th>
                <th scope="col">director</th>
                <th scope="col">genre</th>

                <th scope="col">country</th>
                <th scope="col">chieurap</th>
                <th scope="col">sub_docquyen</th>
            </tr>
        </thead>
        <tbody class="order_position">
            @foreach($resp_movie as $key => $res)
                <tr>
                    <th scope="row">{{$key}}</th>

                    <td> {{$res['_id']}} </td>
                    <td> {{$res['name']}} </td>
                    <td> {{$res['slug']}} </td>
                    <td> {{$res['origin_name']}} </td>
                    <td> {{$res['content']}} </td>

                    <td> {{$res['type']}} </td>
                    <td> {{$res['status']}} </td>
                    <td> <img src="{{$res['thumb_url']}}" height="150" width="100"> </td>
                    <td> <img src="{{$res['poster_url']}}" height="150" width="100"> </td>
                    <td> 
                        @if($res['is_copyright'] == true)
                            <b><span class="text text-success">True</span></b>
                        @else
                            <b><span class="text text-danger">False</span></b>
                        @endif
                    </td>
                    
                    <td> {{$res['sub_docquyen']}} </td>
                    <td> {{$res['chieurap']}} </td>
                    <td> {{$res['trailer_url']}} </td>
                    <td> {{$res['time']}} </td>
                    <td> {{$res['episode_current']}} </td>

                    <td> {{$res['episode_total']}} </td>
                    <td> {{$res['quality']}} </td>
                    <td> {{$res['lang']}} </td>
                    <td> {{$res['notify']}} </td>
                    <td> {{$res['showtimes']}} </td>

                    <td> {{$res['year']}} </td>
                    <td> {{$res['view']}} </td>
                    <td> 
                        @foreach( $res['actor'] as $actor)
                            <span class="badge badge-info">{{$actor}}</span>
                        @endforeach
                    </td>
                    <td> 
                        @foreach( $res['director'] as $director)
                            <span class="badge badge-info">{{$director}}</span>
                        @endforeach
                    </td>
                    <td> 
                        @foreach( $res['category'] as $category)
                            <span class="badge badge-info">{{$category['name']}} </span>
                        @endforeach
                    </td>
                    <td> 
                        @foreach( $res['country'] as $country)
                            <span class="badge badge-info">{{$country['name']}} </span>
                        @endforeach
                    </td>
                    <td> 
                        @if($res['chieurap'] == true)
                            <b><span class="text text-success">True</span></b>
                        @else
                            <b><span class="text text-danger">False</span></b>
                        @endif
                    </td>

                    <td> 
                        @if($res['sub_docquyen'] == true)
                            <b><span class="text text-success">True</span></b>
                        @else
                            <b><span class="text text-danger">False</span></b> 
                        @endif
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
