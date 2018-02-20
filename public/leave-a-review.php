<?php

include('../includes/application_includes.php');
include('../templates/navbar.html');
$requestType = $_SERVER['REQUEST_METHOD'];


if ($requestType == 'GET') {
  // Display the form
  showForm();
}

elseif ($requestType == 'POST') {

  print_r($_POST);

  $userId = htmlspecialchars($_POST['userId'], ENT_QUOTES);
  $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
  $content = htmlspecialchars($_POST['content'], ENT_QUOTES);

  $sql = "insert into stories (userId, title, content) value ('" . $userId . "', '" . $title . "', '" . $content . "')";
  $db = connectToDb();
  $posts = $db->query($sql);
  //header('Location: /../index.php');

}


function showForm($data = null) {

  echo <<<postform

  <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

  <!-- Inline CSS based on choices in "Settings" tab -->
  <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

  <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
  <div class="bootstrap-iso">
   <div class="container-fluid">
    <div class="row">
     <div class="col-md-6 col-sm-6 col-xs-12">
      <form method="POST">
       <div class="form-group ">
        <label class="control-label requiredField" for="userId">
         Name
         <span class="asteriskField">
          *
         </span>
        </label>
        <input class="form-control" id="userId" name="userId" placeholder="ex. John Smith" type="text"/>
       </div>
       <div class="form-group ">
        <label class="control-label requiredField" for="title">
         Product
         <span class="asteriskField">
          *
         </span>
        </label>
        <input class="form-control" id="title" name="title" placeholder="ex. PG2" type="text"/>
       </div>
       <div class="form-group ">
        <label class="control-label requiredField" for="content">
         Review
         <span class="asteriskField">
          *
         </span>
        </label>
        <textarea class="form-control" cols="40" id="content" name="content" rows="10"></textarea>
       </div>
       <div class="form-group">
        <div>
         <button class="btn btn-primary " name="submit" type="submit">
          Submit
         </button>
        </div>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
postform;
}
