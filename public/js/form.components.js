var EntryValidator = {
    "rules": {
        title:{
            required: true
        },
        slug:{
            required: true
        }
    },
    "messages":{
        title:{
            required: "We need a title here!"
        },
        slug: {
            required: "This field can not be empty"
        }
    }
};

var CreateUserValidator = {
    "rules": {
        username:{
            required: true
        },
        email:{
            required: true,
            email:true
        },
        password:{
            required:true,
            minlength: 6,
            maxlength: 12
        },

        confirm_password:{
            required: true,
            equalTo: '#password'
        },
        twitter_account:{
            required:true
        }

    },
    "messages":{
        username:{
            required: 'We need a username here'
        },
        email:{
            required: 'We need your email',
            email:'We need a real email'
        },
        password:{
            required:'A password is required',
            minlength: 'Is a very short password',
            maxlength: 'Is a long password'
        },
        confirm_password:{
            required: 'You need to confirm the password',
            equalTo: 'The passwords do not match'
        },
        twitter_account:{
            required: 'A twitter account is necessary'
        }
    }
};

var UpdateUserValidator = {
    rules: {
        username: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        twitter_account: {
            required: true,
            twitter_username: true
        }

    },
    messages: {
        username: {
            required: 'The username can not be null'
        },
        email: {
            required: 'We need your email',
            email: 'We need a real email'
        },

        twitter_account: {
            required: 'A twitter account is necessary',
            twitter_username: 'that is not a valid twitter account'
        }
    }
};

var updateUserPasswordValidator = {

    rules: {
        current_password:{
            required: true
        },
        new_password:{
            required:true,
            minlength: 6,
            maxlength: 12
        },

        confirm_new_password:{
            required:true,
            minlength: 6,
            maxlength: 12
        }
    },

    messages:{
        current_password:{
            required: 'You need your current password'
        },
        new_password:{
            required:'A new password is required',
            minlength: 'Is a very short password',
            maxlength: 'Is a long password'
        },

        confirm_new_password:{
            required:'A new password is required',
            minlength: 'Is a very short password',
            maxlength: 'Is a long password'
        }
    }

};