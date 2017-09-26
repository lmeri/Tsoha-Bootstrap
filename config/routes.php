<?php


  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->post('/login', function() {
    UserController::handle_login();
  });
  
  $routes->get('/login', function() {
    UserController::login();
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
  
  $routes->post('/books/:id/destroy', function($id){
    BooksController::destroy($id);
  });
  
  $routes->post('/books/:id/edit', function($id) {
      BooksController::update($id);
  });
  
  $routes->get('/books/:id/edit', function($id) {
      BooksController::edit($id);
  });
  
  $routes->get('/books/:id', function($id) {
      BooksController::bookintro($id);
  });
  
  $routes->post('/books', function(){
      BooksController::store();
  });
  
  $routes->get('/user/books', function() {
      UserController::usersbooks();
  });
  
  
  
  $routes->post('/books/:id', function($id){
    RatingController::store($id);
  });
  
  
  
  
  
//Kategoria reitit
  $routes->get('/categories', function() {
    CategoriesController::categorylist();
  });
  
  $routes->get('/categories/add', function() {
    CategoriesController::add();
  });
  
  $routes->post('/categories/:id/destroy', function($id){
    CategoriesController::destroy($id);
  });
  
  $routes->post('/categories/:id/edit', function($id) {
      CategoriesController::update($id);
  });

  $routes->get('/categories/:id/edit', function($id) {
      CategoriesController::edit($id);
  });
  
  $routes->get('/categories/:id', function($id) {
    BooksController::categorybooks($id);
  });

  $routes->post('/categories', function(){
    CategoriesController::store();
  });
  
  
