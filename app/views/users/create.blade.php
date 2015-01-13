@extends('layouts.master')
@section('page_title')
Create an Account
@stop

@section('content')
<section class="row">
    <div class="col-md-6 col-md-offset-3">
        <header class="page-header">
            <h1>Create a new account</h1>
        </header>
        <section>
            {{Form::open(['method' => 'post', 'route' => 'users.register', 'role' => 'form', 'id'=> 'sign-in-form','class' => 'form'])}}
                {{Field::text('username')}}
                {{Field::text('email')}}
                {{Field::password('password', ['id' => 'password'])}}
                {{Field::password('confirm_password')}}
                {{Field::text('twitter_account')}}
                {{Form::hidden('slug')}}
                <div class="form-group">
                    {{Form::submit('Create an Account', array('class' => 'btn btn-primary'))}}
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

            $form.find(':input[name="username"]').on('keyup', function() {
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
