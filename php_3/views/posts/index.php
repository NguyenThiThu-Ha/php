<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    </head>
    <body>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "php3");
        $query = "SELECT * FROM data ORDER BY ID DESC";
        $result = mysqli_query($connect, $query);
        ?>
        <style>
        </style>
        <div id="info">  
                <h3 align="center">Manage</h3>
                <button onclick="location.href = 'index.php?controller=posts&action=addData'">New </button>
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>ID</td>
                                    <td>Thumb</td>
                                    <td>Title</td>
                                    <td>Status</td>
                                    <td>Action</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                        if ($row['status'] == 0) {
                            $row['status'] = 'Enabled';
                        } else {
                            $row['status'] = 'Disabled';
                        }
                        
                        echo "<td class='id'>" . $row['id'] . "</td>";
                        if (is_null($row['image'])) {
                            echo "<td></td>";
                        } else {
                            echo "<td class='img_src'><img src = " . $row['image'] . " width='150px' /></td>";
                        }

                        echo "<td class='title'>" . $row['title'] . "</td>";
                        echo '<td class="status">' . $row['status'] . "</td>";
                        echo '<td style=> <a href="./index.php?controller=posts&action=showPost&id='.$row['id'].'">Show </a>|<a href="index.php?controller=posts&action=editData&id=' . $row['id'] . '"> Edit </a>|<a href="index.php?controller=posts&action=deleteData&id=' . $row['id'] . '"> Delete</a> </td>';                                                                     

                        
                        echo "</tr>";
                    }  
                          ?>  
                     </table>  
                </div>  
           </div>
    </body>
</html>
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
