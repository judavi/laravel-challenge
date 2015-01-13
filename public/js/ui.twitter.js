var UITwitter = function () {
    var _container;
    var _url;

    var formatTweets = function (incoming_tweet) {
        $.each(incoming_tweet, function (i, item) {
            $.post(location.origin + '/is-tweet-hide/' + item.id+ '/'+item.user.screen_name, function (data) {
                var tweet = '';
                tweet += '<blockquote class="twitter-tweet" id="'+item.id+'">';
                tweet += '<p>' + item.text + '</p>';
                tweet += '<small>' + item.created_at + '</small>';
                tweet += '</blockquote>';
                $(tweet).appendTo(_container);

                if(Boolean(data.is_auth) && Boolean(data.is_the_user)){
                    console.log(data);

                    if( Boolean(data.success)){
                        $(hideButton(data.id)).appendTo('#'+data.id);
                    }else{
                        $(showButton(data.id)).appendTo('#'+data.id);
                    }
                }else{
                    console.log('No logueado');
                    if(!Boolean(data.success)) {
                        $('#' + data.id).hide();
                    }
                }
            });

        });
    };

    var hideButton = function (tweet_id) {
        return '<button class="btn btn-primary btn-xs pull-right hide-tweet" data-method="post" data-url="' + location.origin + '/hide-tweet/' + tweet_id + '">Hide the tweet</button>'
    };
    var showButton = function (tweet_id) {
        return '<button class="btn btn-primary btn-xs pull-right show-tweet" data-method="post" data-url="' + location.origin + '/show-tweet/' + tweet_id + '">Show the tweet</button>'
    };

    return {
        init: function (container) {
            _container = $(container);
            _url = _container.data('url');
            $.get(_url, function (data) {
                var tweets = JSON.parse(data);
                formatTweets(tweets);
            });

        }
    }
}
();
