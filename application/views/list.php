<!DOCTYPE html>
<html>
<head>
    <title>facebook data CRUD operation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
  <h1>Login Page</h1>
    <hr>
    <p>To get All posts with details OR store in database</p>
    <button class="btn btn-default">
        <a href="<?php echo base_url();?>index.php/Posts/fblogin">Login with Facebook</a>
    </button>
    <hr>
<div class="row">
    <div class="col-lg-12">           
        <h2>facebook data CRUD operation</h2>
     </div>
</div>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
      <tr><th>Post ID</th>
          <th>Page ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Image URL</th>
          <th>Likes</th>
          <th>Comments Counts</th>
          <th>Published Date</th>
          <th width="200px">Action</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $d) { ?>      
      <tr>

        <td><?php echo $d->post_id; ?></td> 
        <td><?php echo $d->page_id; ?></td> 
          <td><?php echo $d->title; ?></td>
          <td><?php echo $d->description; ?></td> 
          <td><?php echo $d->image_url; ?></td> 
          <td><?php echo $d->likes; ?></td> 
          <td><?php echo $d->comment_counts; ?></td> 
          <td><?php echo $d->published_date; ?></td>          
      <td>
        <form method="DELETE" action="<?php echo base_url('index.php/post_d/delete/'.$d->page_id);?>">
         <a class="btn btn-info btn-xs" href="<?php echo base_url('index.php/post_d/edit/'.$d->page_id) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
          <button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>
</div>
</body>
</html>