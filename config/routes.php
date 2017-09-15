<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/login', function() {
    HelloWorldController::login();
  });
  
  $routes->get('/books', function() {
    HelloWorldController::list_books();
  });
  
  $routes->get('/categories', function() {
    HelloWorldController::categories();
  });
  
  $routes->get('/books/1', function() {
    HelloWorldController::book_intro();
  });

  $routes->get('/register', function() {
    HelloWorldController::register();
  });
  
  $routes->get('/categories/1', function() {
    HelloWorldController::category_list();
  });
  
  $routes->get('/toplists', function() {
    HelloWorldController::toplists();
  });
  
  $routes->get('/books/1/edit', function() {
    HelloWorldController::book_edit();
  });
  
  $routes->get('/categories/1/edit', function() {
    HelloWorldController::category_edit();
  });
  
  $routes->get('/categories/add', function() {
    HelloWorldController::category_add();
  });
  
  $routes->get('/books/add', function() {
    HelloWorldController::book_add();
  });
  
  $routes->get('/user/books', function() {
    HelloWorldController::users_books();
  });
