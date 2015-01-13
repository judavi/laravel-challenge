@extends('layouts.master')
@section('content')
    <section class="col-md-offset-2 col-md-8">
        <section class="row latest-entries">
            <header class="page-header">
                <h1><i class="fa fa-newspaper-o"></i> Latest Entries</h1>
            </header>
            @foreach($entries as $entry)
                <article class="panel panel-default col-md-12">
                    <header>
                        <h1>{{$entry->title}}</h1>
                        <p class="text-muetd"><i class="glyphicon glyphicon-calendar"></i> {{ $entry->created_at }} by <a href="{{route('users.show', [$entry->author->slug])}}">{{ $entry->author->username }}</a> - <i class="fa fa-twitter"></i> <a href="{{ Twitter::linkUser($entry->author->twitter_account)}}" target="_blank">{{$entry->author->twitter_account}}</a></p>
                    </header>
                    <section>
                        <p>{{str_limit($entry->content, $limit = 120, $end = '...')}}</p>
                        <p>
                            <a href="{{ route('entries.show', [$entry->slug]) }}" class="btn btn-link pull-right">Read more</a>
                        </p>
                    </section>
                </article>
            @endforeach
            <ul class="nav nav-pills pull-right">
                {{--{{ $entries->links() }}--}}
            </ul>
        </section>
    </section>
    {{--<aside class="col-md-4">
        <section class="hotest-entries">
            <header>
                <h3><i class="fa fa-fire"></i> Hotest Entries</h3>
            </header>
            <ul class="list-unstyled">
                @foreach($entries as $entry)
                    <li><a href="{{ route('entries.show', [$entry->slug]) }}">{{ $entry->title }}</a></li>
                @endforeach
            </ul>
        </section>
    </aside>--}}
@stop