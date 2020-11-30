<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/install', 'InstallController@index');
Route::post('/install', 'InstallController@install');
Route::get('/install/migrate', 'InstallController@migrate');

Route::namespace('Site')->group(
    function () {
        Route::get('/', 'HomeController@index');

        // user
        Route::get('users/activemail', 'UserController@activeMail');

        // member
        Route::get('member/activemail', 'MemberController@activeMail');
        Route::get('member/login', 'MemberController@login');
        Route::post('member/login', 'MemberController@handleLogin');
        Route::get('member/register', 'MemberController@register');
        Route::post('member/register', 'MemberController@handleRegister');
        Route::get('member/forgot', 'MemberController@forgot');
        Route::post('member/forgot', 'MemberController@handleForgot');
        Route::get('member/login-social/{provider}', 'MemberController@loginSocial');
        Route::get('member/callback/{provider}', 'MemberController@callbackSocial');

        Route::middleware(['auth.web'])->group(
            function () {
                // member
                Route::get('member', 'MemberController@index');
                Route::get('member/update-profile', 'MemberController@updateProfile');
                Route::post('member/update-profile', 'MemberController@handleUpdateProfile');
                Route::get('member/change-password', 'MemberController@changePassword');
                Route::post('member/change-password', 'MemberController@handleChangePassword');
                Route::get('member/my-bookmark-posts', 'MemberController@myBookmarkPost');

                Route::get('member/my-services', 'MemberController@myServices');
                Route::get('member/my-service-payment-status', 'MemberController@myServicePaymentStatus');
                Route::get('member/notifications', 'MemberController@notifications');
                Route::get(
                    'member/notification/{id}/make-read',
                    function () {
                        return redirect(base_url('member/notifications'));
                    }
                );
                Route::put('member/notification/{id}/make-read', 'MemberController@makeReadNotification');
                Route::get('member/logout', 'MemberController@logout');
            }
        );

        // post
        Route::get('/' . config('constant.URL_PREFIX_POST'), 'PostController@index');
        Route::get(
            '/' . config('constant.URL_PREFIX_POST') . '/{slugCategory}/{slugPost}.html',
            'PostController@view'
        );
        Route::get('/' . config('constant.URL_PREFIX_POST') . '/{slugPost}.html', 'PostController@view');
        Route::get('/' . config('constant.URL_PREFIX_POST') . '/{slugCategory}', 'PostController@index');
        Route::post('/' . config('constant.URL_PREFIX_POST') . '/bookmark', 'PostController@postBookmark');

        // page
        Route::get('/' . config('constant.URL_PREFIX_PAGE') . '/{slugCategory}', 'PageController@view');
        Route::get('404.html', 'PageController@notfound');
        Route::get('maintenance', 'PageController@maintenance');

        // tag
        Route::get('/' . config('constant.URL_PREFIX_TAG') . '/{slug}', 'TagController@index');
        Route::get('search', 'SearchController@index');

        // sitemap
        Route::get('sitemap.xml', 'SitemapController@index');

        // contact
        Route::post('contact/register-email', 'ContactController@registerEmail');
        Route::post('contact', 'ContactController@addContact');

        // comment
        Route::post('comment/create', 'CommentController@addComment');
    }
);