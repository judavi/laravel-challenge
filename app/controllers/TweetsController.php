<?php
/**
 * Created by PhpStorm.
 * User: perseus
 * Date: 12/01/15
 * Time: 4:10 PM
 */

class TweetsController extends \BaseController{

    public function hideTweet($tweet_id){

        if(Request::ajax()){
            $tweet = Tweet::create(['tweet_id' => $tweet_id]);

            return Response::json(true);
        }
    }

    public function IsTweetHide($tweet_id, $twitter_account){

        if(Request::ajax()){
            $hide = Tweet::where('tweet_id', '=', $tweet_id)->first();

            $is_the_user = isset(Auth::user()->twitter_account) == $twitter_account ? true : false;

            if(is_null($hide)){
                return Response::json([
                    'success' => true,
                    'id' => $tweet_id,
                    'is_the_user' => $is_the_user,
                    'is_auth' => Auth::check()
                ]);
            }else{
                return Response::json([
                    'success' => false,
                    'id' => $tweet_id,
                    'is_the_user' => $is_the_user,
                    'is_auth' => Auth::check()
                ]);
            }
        }
    }

    public function showTweet($tweet_id){

        if(Request::ajax()){
            $tweet = Tweet::where('tweet_id', '=', $tweet_id)->destroy();

            return Response::json(true);
        }
    }

    public function twitterCallback() {
        if(Session::has('oauth_request_token')) {
            $request_token = array(
                'token' => Session::get('oauth_request_token'),
                'secret' => Session::get('oauth_request_token_secret'),
            );

            Twitter::set_new_config($request_token);

            $oauth_verifier = FALSE;
            if(Input::has('oauth_verifier')) {
                $oauth_verifier = Input::get('oauth_verifier');
            }

            // getAccessToken() will reset the token for you
            $token = Twitter::getAccessToken( $oauth_verifier );
            if( !isset( $token['oauth_token_secret'] ) ) {
                return Redirect::to('/')->with('flash_error', 'We could not log you in on Twitter.');
            }

            $credentials = Twitter::query('account/verify_credentials');
            if( is_object( $credentials ) && !isset( $credentials->error ) ) {
                // $credentials contains the Twitter user object with all the info about the user.
                // Add here your own user logic, store profiles, create new users on your tables...you name it!
                // Typically you'll want to store at least, user id, name and access tokens
                // if you want to be able to call the API on behalf of your users.

                // This is also the moment to log in your users if you're using Laravel's Auth class
                // Auth::login($user) should do the trick.

                return Redirect::to('/')->with('flash_notice', "Congrats! You've successfully signed in!");
            }
            return Redirect::to('/')->with('flash_error', 'Crab! Something went wrong while signing you up!');
        }
    }

}