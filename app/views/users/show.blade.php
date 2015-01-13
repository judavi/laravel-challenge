@extends('layouts.master')

@section('page_title')
    {{$user->username}}
@stop
@section('styles')
{{ HTML::style(asset('css/twitter.css')) }}
@stop
@section('content')
    <ul class="breadcrumb" style="margin-top: 14px;">
      <li><a href="{{route('index')}}"><i class="glyphicon glyphicon-home"></i></a></li>
    </ul>
    <section class="content row">
        <div class="col-md-8">
            <header class="user-header row" style="position: relative">
                <div class="col-md-7 ">
                    <h1><i class="fa fa-user"></i> {{ $user->username }}</h1>
                    <p class="text-muted"><i class="glyphicon glyphicon-envelope"></i> <a href="mailto:{{$user->email}}">{{$user->email}}</a> - <i class="fa fa-twitter"></i> <a href="{{ Twitter::linkUser($user->twitter_account)}}" target="_blank">{{$user->twitter_account}}</a></p>
                </div>
                @if( Auth::check() )
                    <div class="col-md-5" style="position:absolute; bottom: 0px;right:0px;">
                        <ul id="users-options" class="nav nav-pills ">
                            <li>
                                <a class="edit-user btn btn-link btn-xs" role="button" href="{{ route('users.edit',[$user->id]) }}"><i class="glyphicon glyphicon-edit"></i> Edit my profile</a>
                            </li>
                            <li>
                                {{Form::open(['method' => 'delete', 'route'=> ['users.destroy', $user->id], 'role'=> 'form', 'class' => 'form'])}}
                                    <button type="submit" class="btn btn-danger btn-sm"> <i class="glyphicon glyphicon-trash"></i> Delete my account</button>
                                {{ Form::close() }}
                            </li>
                        </ul>
                    </div>
                @endif
            </header>
            <header class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-newspaper-o"></i> Entries List</h2>
                </div>
            </header>
            <section class="all-entries row">
                <div class="inner col-md-12">
                    @foreach($entries as $entry)
                        <article class="panel panel-default col-md-12">
                            <header>
                                <h1>{{$entry->title}}</h1>
                                <p class="text-muetd"><i class="glyphicon glyphicon-calendar"></i> {{ $entry->created_at }}</p>
                            </header>
                            <section>
                                <p>{{str_limit($entry->content, $limit = 120, $end = '...')}}</p>
                                <p><a href="{{ route('entries.show', [$entry->slug]) }}" class="btn btn-link pull-right btn-sm">Read more</a></p>
                            </section>
                        </article>
                    @endforeach
                    <ul class="nav nav-pills">
                    {{ $entries->links() }}
                    </ul>
                </div>
            </section>
        </div>
        <aside class="col-md-4">
            <header class="page-header">
                <h3><i class="fa fa-twitter"></i> My lastest tweets</h3>
            </header>

            <section id="twitter-timeline" data-url="{{route('user.twitter.timeline', [$user->twitter_account])}}">

            </section>
        </aside>
    </section>
@stop
@section('scripts')
    {{ HTML::script(asset('js/ui.twitter.js'), ['type' => 'text/javascript']) }}
<script>
(function(window, $){
    $(document).ready(function(){
       UITwitter.init('#twitter-timeline');
            UIButton.ajaxButton('#twitter-timeline', 'button.hide-tweet');
            UIButton.ajaxButton('#twitter-timeline', 'button.show-tweet');

    });

})(window, jQuery);
</script>
@stop