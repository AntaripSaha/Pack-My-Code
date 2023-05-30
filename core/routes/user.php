<?php

use Illuminate\Support\Facades\Route;

Route::namespace('User\Auth')->name('user.')->group(function () {

    Route::controller('LoginController')->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
        Route::get('logout', 'logout')->name('logout');
    });

    Route::controller('RegisterController')->group(function () {
        Route::get('register', 'showRegistrationForm')->name('register');
        Route::post('register', 'register')->middleware('registration.status');
        Route::post('check-mail', 'checkUser')->name('checkUser');
    });

    Route::controller('ForgotPasswordController')->prefix('password')->name('password.')->group(function () {
        Route::get('reset', 'showLinkRequestForm')->name('request');
        Route::post('email', 'sendResetCodeEmail')->name('email');
        Route::get('code-verify', 'codeVerify')->name('code.verify');
        Route::post('verify-code', 'verifyCode')->name('verify.code');
    });
    Route::controller('ResetPasswordController')->group(function () {
        Route::post('password/reset', 'reset')->name('password.update');
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    });
});

Route::middleware('auth')->name('user.')->group(function () {
    //authorization
    Route::namespace('User')->controller('AuthorizationController')->group(function () {
        Route::get('authorization', 'authorizeForm')->name('authorization');
        Route::get('resend-verify/{type}', 'sendVerifyCode')->name('send.verify.code');
        Route::post('verify-email', 'emailVerification')->name('verify.email');
        Route::post('verify-mobile', 'mobileVerification')->name('verify.mobile');
        Route::post('verify-g2fa', 'g2faVerification')->name('go2fa.verify');
    });

    Route::middleware(['check.status'])->group(function () {

        Route::get('user-data', 'User\UserController@userData')->name('data');
        Route::post('user-data-submit', 'User\UserController@userDataSubmit')->name('data.submit');

        Route::middleware('registration.complete')->namespace('User')->group(function () {

            Route::controller('UserController')->group(function () {
                Route::get('dashboard', 'home')->name('home');

                //2FA
                Route::get('twofactor', 'show2faForm')->name('twofactor');
                Route::post('twofactor/enable', 'create2fa')->name('twofactor.enable');
                Route::post('twofactor/disable', 'disable2fa')->name('twofactor.disable');

                //KYC
                Route::get('kyc-form', 'kycForm')->name('kyc.form');
                Route::get('kyc-data', 'kycData')->name('kyc.data');
                Route::post('kyc-submit', 'kycSubmit')->name('kyc.submit');

                //Report
                Route::any('deposit/history', 'depositHistory')->name('deposit.history');
                Route::get('transactions', 'transactions')->name('transactions');
                Route::get('sell/history', 'sellHistory')->name('sell.history');

                Route::get('referral', 'referral')->name('referral');
                Route::get('referral/commissions', 'commissionLogs')->name('referral.commissions.logs');
                Route::post('email-author', 'emailAuthor')->name('email.author');

                Route::get('attachment-download/{fil_hash}', 'attachmentDownload')->name('attachment.download');
            });

            //Profile setting
            Route::controller('ProfileController')->group(function () {
                Route::get('profile-setting', 'profile')->name('profile.setting');
                Route::post('profile-setting', 'submitProfile');
                Route::get('change-password', 'changePassword')->name('change.password');
                Route::post('change-password', 'submitPassword');
            });
            //Api Controller
            Route::controller('ApiController')->middleware('verify.purchase.code.api')->name('api.')->prefix('api')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('documentation', 'documentation')->name('documentation');
                Route::post('reset', 'reset')->name('reset');
                Route::post('whitelist/ip', 'whitelistIp')->name('whitelist.ip');
                Route::post('whitelist/ip/remove/{ip_id}', 'whitelistIpRemove')->name('ip.remove');
            });

            // Product
            Route::controller('ProductController')->name('product.')->prefix('product')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('add', 'add')->name('add');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('detail/{id}', 'detail')->name('detail');
                Route::get('resubmit/{id}', 'resubmit')->name('resubmit');
                Route::post('resubmit/store/{id}', 'resubmitStore')->name('resubmit.store');

                Route::get('download/{id}', 'download')->name('download');

                Route::post('comment/store/{id}', 'comment')->name('comment');
                Route::post('comment/reply/{id}', 'reply')->name('comment.reply');

                Route::get('reviews/{id}', 'reviews')->name('reviews');
                Route::post('review/report/{id}/{product_id}', 'report')->name('review.report');
            });
            Route::controller('ProductController')->group(function () {
                Route::get('product/hidden', 'hidden')->name('hidden.product');
            });
            // Withdraw
            Route::controller('WithdrawController')->prefix('withdraw')->name('withdraw')->group(function () {
                Route::middleware('kyc')->group(function () {
                    Route::get('/', 'withdrawMoney');
                    Route::post('/', 'withdrawStore')->name('.money');
                    Route::get('preview', 'withdrawPreview')->name('.preview');
                    Route::post('preview', 'withdrawSubmit')->name('.submit');
                });
                Route::get('history', 'withdrawLog')->name('.history');
            });

            Route::controller('CheckoutController')->group(function () {
                Route::post('checkout', 'checkout')->name('checkout');
            });

            Route::controller('PurchasedController')->group(function () {
                Route::get('purchased/history', 'purchasedHistory')->name('purchased.history');
                Route::get('purchased/download/{id}', 'download')->name('purchased.product.download');
                Route::get('purchased/invoice/{id}', 'invoice')->name('purchased.product.invoice');
                Route::post('purchased/review/{id}', 'review')->name('purchased.product.review');
            });
        });

        Route::middleware('registration.complete')->prefix('deposit')->name('deposit.')->controller('Gateway\PaymentController')->group(function () {
            Route::any('/', 'deposit')->name('index');
            Route::any('/payment', 'payment')->name('payment');
            Route::post('insert', 'depositInsert')->name('insert');
            Route::get('confirm', 'depositConfirm')->name('confirm');
            Route::get('manual', 'manualDepositConfirm')->name('manual.confirm');
            Route::post('manual', 'manualDepositUpdate')->name('manual.update');
        });
    });
});
