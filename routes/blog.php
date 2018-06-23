<?php

Route::group(['middleware' => ['web']], function ($router) {

    $router->get('/', "IndexController@index");
    $router->get('edit/{id}', "IndexController@edit");

    $router->post('ajaxsave' , 'IndexController@ajaxsave');
    $router->post('ajaxpublish' , 'IndexController@ajaxpublish');
});

?>