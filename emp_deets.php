<!DOCTYPE html>
<html>
  <head>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 3px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: white;
}
th{ background-color:#008080 ;
    color:white;}
#butt{ height:25px;
        width:50px;
        background-color:teal;
        color:white;
        font-size:18px;
        font-family:Arial;
        margin:20px;
        padding:10px;
        border-radius:20px;
        padding-top:20px;
        padding-left:25px;
        border:1px solid white;}
</style>
    <title>Employee details</title>
  </head>
  <body>
    <?php
    $link=mysqli_connect("localhost","root","","mercy");
    if($link==false){
      die("ERROR: Could not connect. " .mysqli_connect_error());
    }

    $query = "SELECT * from employee";
      $result = mysqli_query($link, $query);
      if (mysqli_num_rows($result) > 0) {
      ?>
        <table>
        <tr>
          <b><th>Employee ID</th></b>
          <b><th>Name</th></b>
          <b><th>Email </th></b>
          <b><th>Attendance</th></b>
          <b><th>Salary</th></b>
          <b><th>Contact no</th></b>
          <b><th>Address</th></b>
        </tr>
      <?php
      $i=0;
      $row="";
      while($row = mysqli_fetch_array($result)) {
      ?>
      <tr>
          <td><?php echo $row['empid']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['attendance']; ?></td>
          <td><?php echo $row['salary']; ?></td>
          <td><?php echo $row['contact_no']; ?></td>
          <td><?php echo $row['address']; ?></td>
      </tr>
      <?php
      $i++;
      }
      ?>
      </table>
       <?php
      }
      else{
          echo "No result found";
      }
      mysqli_close($link);
   ?>
</body>
</html>