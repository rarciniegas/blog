<!DOCTYPE html> 
<html> 
  <head> 
    <title>Blog</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
      <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
  </head> 
  <body> 
  <nav class="navbar navbar-expand-sm navbar-dark bg-primary mb-3">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
       </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
        </li>
      </ul>
      <ul class="navbar navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Category</a>
        </li>
      </ul>  
    </div>
</nav>
<div class="container">