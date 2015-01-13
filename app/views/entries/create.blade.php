@extends('layouts.master')
@section('page_title')
Create Entry
@stop
@section('styles')
{{ HTML::style('assets/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.css')}}
@stop
@section('content')
    <header>
        <h1>Create Entry</h1>
    </header>
    <section>
        {{Form::open(['method' => 'post', 'route' => 'entries.store', 'role' => 'form', 'class' => 'form'])}}
            {{Field::text('title')}}
            {{Field::textarea('content')}}
            {{Form::hidden('slug')}}
            {{Form::hidden('author_id', Auth::user()->id)}}
            {{Form::submit('Create', array('class' => 'btn btn-primary'))}}
        {{Form::close()}}
    </section>
@stop
@section('scripts')
{{ HTML::script(asset('assets/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.all.min.js')) }}

<script>
    (function(window, $){
        $(document).ready(function(){
            $('textarea').wysihtml5();

            var $form = $('form');

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
        });


    })(window, jQuery);
</script>
@stop