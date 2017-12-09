@extends('layouts.default')

@section('title','live首页')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <div class="page-header">
                   <h3>{{$name}}</h3>
               </div>
                <div class="containers">
                    @if(count($lives)>0)
                        @foreach($lives as $live)
                            <div class="live-list" style="border-bottom: 1px solid #eee">
                                <h4><a target="_blank" href="{{route('live.show',$live->id)}}">{{$live->title}}</a></h4>
                                <p>作者:{{ \App\User::findOrfail($live->user_id)->value('name') }}
                                    开始时间:{{ $live->start_time }}
                                    结束时间:{{ $live->end_time }}
                                </p>
                                <p>简介:{{mb_substr(strip_tags(trim($live->content)),0,10)}}...</p>
                            </div>
                        @endforeach
                    @else
                        <div>暂无符合条件数据</div>
                    @endif
                    {!! $lives->render() !!}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection
