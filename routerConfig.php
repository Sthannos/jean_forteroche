<?php
$routerConfig = array (
    'frontend' => array(
        'home' => array(
            'method' => 'homePage'),
        'listPosts' => array(
            'method' => 'getPostsPublished'),
        'getPost' => array(
            'method' => 'getPostById',
            '_GetKey' => 'postId'),
        'addComment' => array(
            'method' => 'addComment',
            '_GetKey' => 'postId',
            '_PostKeys' => ['lastName', 'firstName', 'content']),
        'report' => array(
            'method' => 'reportComment',
            '_GetKey' => 'commentId'),
        'login' => array(
            'method' => 'login'),
        'connection' => array(
            'method' => 'connection',
            '_PostKeys' => ['login', 'password'])
    ),
    'backend' => array(
        'disconnection' => array(
            'method' => 'disconnection'),
        'writeNewPost' => array(
            'method' => 'writeNewPost'),
        'addPost' => array(
            'method' => 'addPost',
            '_PostKeys' => ['title', 'content', 'published']),
        'listPostsTitle' => array(
            'method' => 'listPostsTitle'),
        'editPost' => array(
            'method' => 'editPost',
            '_GetKey' => 'postId'),
        'updatePost' => array(
            'method' => 'updatePost',
            '_GetKey' => 'postId',
            '_PostKeys' => ['title', 'content', 'published']),
        'deletePost' => array(
            'method' => 'deletePost',
            '_GetKey' => 'postId'),
        'listCommentsReport' => array(
            'method' => 'listCommentsReport'),
        'deleteComment' => array(
            'method' => 'deleteComment',
            '_GetKey' => 'commentId'),
        'validComment' => array(
            'method' => 'validComment',
            '_GetKey' => 'commentId')
    )
);
