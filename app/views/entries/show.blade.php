@extends('layouts.master')
@section('page_title')
{{$entry->title}}
@stop
@section('styles')
{{ HTML::style('assets/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.css')}}
@stop
@section('content')
        <ul class="breadcrumb" style="margin-top: 14px">
          <li><a href="{{route('index')}}"><i class="glyphicon glyphicon-home"></i></a></li>
          <li><a href="{{ route('users.show',[$entry->author->slug]) }}">{{$entry->author->username}}</a></li>
        </ul>
       <header class="page-header">
            <h1>{{$entry->title}}</h1>
            <p><i class="glyphicon glyphicon-user"></i> <a href="{{ route('users.show', array($entry->author->slug)) }}">{{$entry->author->username}}</a>, publish on {{$entry->created_at}}</p>
       </header>
       @if( Auth::check() && (int) Auth::user()->id === (int) $entry->author->id)
            <section class="row">
                <ul id="entry-options" class="nav nav-tabs">
                    <li class="active">
                        <a href="#show-entry" data-toggle="tab">Show</a>
                    </li>
                    <li>
                        <a class="edit-entry" data-toggle="tab" href="#edit-entry" data-to="#edit-entry" data-url="{{route('entries.edit', [$entry->id])}}">Edit</a>
                    </li>
                    <li>
                        {{ Form::open(['method' => 'delete', 'route' => ['entries.destroy', $entry->id], 'role' => 'form', 'class' => 'form']) }}
                            <button type="submit" class="btn-danger btn"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                        {{ Form::close() }}
                    </li>
                </ul>

            </section>
       @endif
       <section class="row">
            <div class="inner col-md-12 tab-content">
                <article id="show-entry" class="content tab-pane fade active in">
                    <section class="content">
                        {{$entry->content}}
                    </section>
                </article>
                <section id="edit-entry" class="tab-pane fade in">

                </section>
            </div>
       </section>
@stop
@section('scripts')
{{ HTML::script(asset('assets/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.all.min.js')) }}

<script>
    (function(window, $){
        $(document).ready(function(){
            var modal = '#modal';

            $('ul#entry-options li a.edit-entry').each(function(){
              $(this).on('click', function (e) {
                e.preventDefault();
                var $this = $(this);
                var tab = $this.data('to');
                var url = $this.data('url');
                $.get(url, function (data) {
                  $(tab).html(data);
                  $this.tab('show');
                });
              });
            });

            UIButton.confirmationButton('#entry-options', '#destroy-entry');

            $('body').on('hide.bs.modal', modal, function(){
                $(modal).empty();
            });


        });

        $(document).ajaxComplete(function(event, xhr, settings){
            if(settings.type === 'GET'){
                $('textarea').wysihtml5({
                    toolbar: {
                    "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
                    "emphasis": true, //Italics, bold, etc. Default true
                    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                    "html": false, //Button which allows you to edit the generated HTML. Default false
                    "link": true, //Button to insert a link. Default true
                    "image": false, //Button to insert an image. Default true,
                    "color": false, //Button to change color of font
                    "blockquote": true, //Blockquote
                    "size": "default"//default: none, other options are xs, sm, lg
                    }
                });

                var $form = $('#edit-entry').find('form');

                UIForm.init($form, false);
                UIForm.validate(EntryValidator.rules, EntryValidator.messages);

                $(':input[name="title"]').on('keyup', function() {
                    $(':input[name="slug"]').val(
                    $(this).val()
                        .toLowerCase()
                        .replace(/[^\w ]+/g,'')
                        .replace(/ +/g,'-')
                    );
                });

            }
        });

    })(window, jQuery);
</script>
@stop