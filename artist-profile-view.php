<?php
include('db.php');
  $uploadpro_dir = 'uploadpro/';
?>


          <div class="card-deck" style="position: fixed; margin-top: 0px;
          margin-bottom: 0px; margin-right: 0px; margin-left: 0px;">
          <?php
                 $sql = "select * from admin where idadmin=".$id." ";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 $adid=$row['idadmin']; 
                 $un=$row['username'];
                 $pass=$row['password'];
                 $em=$row['email'];
                 $fn=$row['fname'];
                 $mn=$row['mname'];
                 $ln=$row['lname'];
                 $gen=$row['gender'];
                 $bd=$row['bday'];
               ?>

     
            <div class="card profile-card-5 bg-artist">
            <div class="container">  
              <div class="row justify-content-center">   
                <div class="col-md-6">
                  <div class="card-img-block">
                    <input type="hidden" name="id" value="<?php echo $adid; ?>">
                    <img src="<?php echo $uploadpro_dir.$row['aprofilepic']; ?>" alt="Image" class="card-img-top rounded-circle">

                  </div>
                       
                </div> 
                
                
              </div> 
                    <div class="row justify-content-center">
                      <div class="col-md-6 justify-content-center">
                  <div class="card-body pt-0">
                              <h5 class="card-title" style="text-align: center;
                              font-size: 30px"><?php echo $un ?></h5>
                        </div>
                        
                </div> 
                    </div>
            </div> 

              <div class="container"> 
                <div class="row">      
                  <div class="col-sm-4">
                        <div class="card-body pt-0">
                          
    <p class="card-text"><i class="fas">FIRST NAME</i><br>  <?php echo $fn ?>
    </p>
   
    
    <p class="card-text"><i class="fas">EMAIL</i><br>  <?php echo $em ?>
    </p>
                              </div>
                            </div>      
                  <div class="col-sm-4">
                    <div class="card-body pt-0">
              
                    
                    
                  
          
    <p class="card-text"><i class="fas">MIDDLE NAME</i><br>  <?php echo $mn ?>
    </p>
     <p class="card-text"><i class="fas">GENDER</i><br>  <?php echo $gen ?>
    </p>
    
                  </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card-body pt-0">
     <p class="card-text"><i class="fas">LAST NAME</i><br>  <?php echo $ln ?>
    </p>                
   
    <p class="card-text"><i class="fas">BIRTHDAY</i><br>  <?php echo $bd ?>
    </p>
                    </div>
                  </div>

                </div> 
              </div>
                

                </div>
                

<!-- Card -->

      </div>
  