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
    <title>Supply daily products</title>
  </head>
  <body>
    <?php
    $link=mysqli_connect("localhost","root","","mercy");
    if($link==false){
      die("ERROR: Could not connect. " .mysqli_connect_error());
    }

    $query = "SELECT * from product";
      $result = mysqli_query($link, $query);
      if (mysqli_num_rows($result) > 0) {
      ?>
        <table>
        <tr>
          <b><th>Product Name</th></b>
          <b><th>Material</th></b>
          <b><th>Quantity</th></b>
          <b><th>Dimensions</th></b>
          <b><th>Specifications</th></b>
          <b><th>Time</th></b>
          <b><th>Allocate</th></b>
        </tr>
      <?php
      $i=0;
      $row="";
      while($row = mysqli_fetch_array($result)) {
      $x=$row['product_name'];
      ?>
      <tr>
          <td><?php echo $row['product_name']; ?></td>
          <td><?php echo $row['material']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td><?php echo $row['dimensions']; ?></td>
          <td><?php echo $row['specifications']; ?></td>
          <td><?php echo $row['timing']; ?></td>
          <?php echo '<td><a  role="button" style="text-decoration:none;" href="empp.php?id='.$x.'"> <div id="butt">  Allot</div> </a></td>';?> 
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