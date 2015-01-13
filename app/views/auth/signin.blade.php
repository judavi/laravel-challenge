@extends('layouts.master')
@section('page_title')
Create an Account
@stop

@section('content')
<section class="row">
    <div class="col-md-6 col-md-offset-3">
        <header class="page-header">
            <h1>Sign in</h1>
        </header>
        <section>
            {{Form::open(['method' => 'post', 'route' => 'auth', 'role' => 'form', 'id'=> 'sign-in-form','class' => 'form'])}}
                {{Field::text('username')}}
                {{Field::password('password')}}
                <div class="form-group">
                    {{Form::submit('Sign in', array('class' => 'btn btn-primary'))}}
                </div>
            {{Form::close()}}
        </section>
    </div>
</section>

@stop
@section('scripts')

<script>
    (function(window, $){
        $(document).ready(function(){
            var $form = $('#sign-in-form');
            UIForm.init($form, false);
            UIForm.validate(CreateUserValidator.rules, CreateUserValidator.messages);
        });


    })(window, jQuery);
</script>
@stop