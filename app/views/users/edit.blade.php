@extends('layouts.master')
@section('page_title')
Edit Account
@stop

@section('content')
    <div class="row messages">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <header class="page-header">
                <h1>Edit Basic information</h1>
            </header>
            {{Form::open(['id' => 'update-user','method'=> 'put', 'route'=>['users.update', $user->id], 'role' => 'form'])}}
                {{Field::text('username', $user->username)}}
                {{Field::text('email', $user->email)}}
                {{Field::text('twitter_account', $user->twitter_account)}}
                {{Form::hidden('slug')}}
                <div class="form-group">
                    {{Form::submit('Update', array('class' => 'btn btn-primary'))}}
                </div>
            {{Form::close()}}
        </div>
        <div class="col-md-6">
            <header class="page-header">
                <h1>Update your password</h1>
            </header>
            {{Form::open(['id' => 'update-password','method'=> 'post', 'route'=>['users_update_password', $user->id], 'role' => 'form'])}}
                {{Field::password('current_password')}}
                {{Field::password('new_password')}}
                {{Field::password('new_password_confirm')}}
                <div class="form-group">
                    {{Form::submit('Update password', array('class' => 'btn btn-primary'))}}
                </div>
            {{Form::close()}}
        </div>
    </div>
@stop
@section('scripts')
    <script>
        (function(window, $){
            $(document).ready(function(){
                var $updateForm = $('#update-user');
                var $updatePasswordForm = $('#update-password');

                UIForm.init($updateForm, true);
                UIForm.validate(UpdateUserValidator.rules, UpdateUserValidator.messages);

                UIForm.init($updatePasswordForm, true);
                UIForm.validate(updateUserPasswordValidator.rules, updateUserPasswordValidator.messages);

                $updateForm.find(':input[name="username"]').on('keyup', function() {
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