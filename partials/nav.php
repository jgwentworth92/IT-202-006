<?php
require_once(__DIR__ . "/../lib/functions.php");
//Note: this is to resolve cookie issues with port numbers
$domain = $_SERVER["HTTP_HOST"];
if (strpos($domain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = true; //some people have issues with localhost for the cookie params
//if you're one of those people make this false

//this is an extra condition added to "resolve" the localhost issue for the session cookie
if (($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60 * 60,
        "path" => "$BASE_PATH",
        //"domain" => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
}
session_start();


?>
<!-- include css and js files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo get_url('styles.css'); ?>">
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<script type="text/javascript">
    $(window).load(function() {
      $('#exampleModal').modal('show');
    });
 </script>

   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (is_logged_in()) : ?>

                    <li class="nav-item"><a class="nav-link" href="<?php echo get_url('profile.php'); ?>">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_url('cart.php'); ?>">Cart</a></li>
                <?php endif; ?>
                <?php if (!is_logged_in()) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_url('login.php'); ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_url('register.php'); ?>">Register</a></li>
                <?php endif; ?>
                
                <?php if (has_role("Admin")) : ?>
                  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="rolesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin Roles
                        </a>
                        <ul class="dropdown-menu bg-warning" aria-labelledby="rolesDropdown">
                            <li><a class="dropdown-item" href="<?php echo get_url('admin/create_role.php'); ?>">Create</a></li>
                            <li><a class="dropdown-item" href="<?php echo get_url('admin/list_roles.php'); ?>">List</a></li>
                            <li><a class="dropdown-item" href="<?php echo get_url('admin/assign_roles.php'); ?>">Assign Role</a></li>
                            <li><a class="dropdown-item" href="<?php echo get_url('admin/add_item.php'); ?>">Add Product</a></li>
                            <li><a class="dropdown-item" href="<?php echo get_url('admin/list_items.php'); ?>">Admin Product List</a></li>
                            
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (is_logged_in()) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_url('logout.php'); ?>">Logout</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo get_url('viewproducts.php'); ?>">Products</a></li>
            </ul>
        </div>
    </div>
</nav>