<?php

class Slider{
    
    public $SLid;
    public $Image;    
    public $Heading;    
    public $Message;    
    public function InsertSlider(Slider $slide){
        include('Includes/connection.php');                          
        $query_insert_slider = "INSERT INTO slider (Image,Heading,Message) VALUES('$slide->Image' , '$slide->Heading' , '$slide->Message')";                    
        $is_inserted_slider = mysqli_query($conn,$query_insert_slider);        
        if($is_inserted_slider)
        {
            echo "<script>alert('Slider Inserted Successfully')</script>";
            // echo"  <script>window.location.href = 'Login.php'</script>"; 
        }
        else{
            echo "<script>alert('fill all fields Correctly')</script>";
        }               
    }
    public function RecoverSlider(Slider $slide){        
        include('Includes/connection.php'); 
        $query_SLider = "SELECT * FROM slider ORDER BY SLid ASC";                    
        $run_query = mysqli_query($conn , $query_SLider);
        while($rd = mysqli_fetch_array($run_query))
        {           
         $slide->Image = $rd['Image'];
         $slide->Heading = $rd['Heading'];
         $slide->Message = $rd['Message'];     
            
           echo "<div class='carousel-item active'>
            <img src=$slide->Image class='d-block w-100' alt='...'/>
        ?>
          <div class='carousel-caption d-none d-md-block'>
            <h5>$slide->Heading</h5>
            <p>$slide->Message</p>
          </div>
        </div>";
        }
    }

}

?>