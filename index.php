<!-- connection File -->
<?php
  require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h3>Todo List Using Ajax and Php</h3>
  <div class="container mt-3">
    <h2>Table</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">
    Add Data
  </button>
    <table class="table table-bordered" id="employee_table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $get_data = mysqli_query($con,"SELECT * FROM ajax ORDER BY id DESC") or die("query error");
        while($row = mysqli_fetch_assoc($get_data)){
        ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><a href=""><img src="icons/edit.svg" width="30px;"></a></td>
          <td><a href=""><img src="icons/delete.svg" width="30px;"></a></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
      <h2>Stacked form</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body" style="0rem 1rem 1rem 1rem">
        <div class="container mt-3">
          <!-- Form Section -->
          <form method="post" id="insert_form">
            <div class="mb-3">
              <label for="pwd">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3 mt-3">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-success" />
          </form>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- The Modal Section :: End -->
<!-- Ajax Code -->
<script src="ajax.js"></script>
</body>
</html>
