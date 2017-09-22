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
  
  $routes->get('/register', function() {
    HelloWorldController::register();
  });
  
//Kirja reitit

  $routes->get('/books', function() {
    BooksController::booklist();
  });

  $routes->get('/toplists', function() {
    BooksController::bestbooks();
  });
  
  $routes->get('/books/add', function() {
    BooksController::add();
  });
  
  $routes->get('/books/:id', function($id) {
      BooksController::bookintro($id);
  });
  
  $routes->get('/books/:id/edit', function($id) {
    HelloWorldController::book_edit($id);
  });
  
  $routes->post('/books', function(){
    BooksController::store();
  });
  
  $routes->get('/user/books', function() {
    HelloWorldController::users_books();
  });
  
  
  
//Kategoria reitit
  $routes->get('/categories', function() {
    CategoriesController::categorylist();
  });
  
  $routes->get('/categories/add', function() {
    CategoriesController::add();
  });
  
  $routes->get('/categories/:id', function($id) {
    BooksController::categorybooks($id);
  });

  $routes->get('/categories/:id/edit', function($id) {
    HelloWorldController::category_edit($id);
  });

  $routes->post('/categories', function(){
    CategoriesController::store();
  });
  
  
