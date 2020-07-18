<?php
date_default_timezone_set("Asia/Karachi");
// use \Datetime;
?>

<?php

class Announcement{        
            
    public $ANid;
    public $ATitle;    
    public $ADetails;        
    public $ATime ;
    public $ALink;    
    public function InsertAnnouncement(Announcement $a){
        $now = new DateTime();
        $time = $now->format('Y-m-d H:i:s');    // MySQL datetime format
        // echo $now->getTimestamp();    
        include('Includes/connection.php');                          
        $query_insert_ann = "INSERT INTO announcements (`ATitle`, `ADetails`, `ATime`, `ALink`) VALUES('$a->ATitle' , '$a->ADetails' , '$time' , '$a->ALink')";                    
        $is_inserted_ann = mysqli_query($conn,$query_insert_ann);        
        if($is_inserted_ann)
        {
            echo "<script>alert('Announcement Inserted Successfully')</script>";
            echo"  <script>window.location.href = 'AdminHome.php'</script>"; 
        }
        else{
            echo "<script>alert('fill all fields Correctly')</script>";
        }               
    }
    public function RecoverAnnouncement(Announcement $a){        
        include('Includes/connection.php'); 
        $query_ann = "SELECT * FROM announcements ORDER BY ANid ASC LIMIT 3";                    
        $run_query = mysqli_query($conn , $query_ann);
        while($rd = mysqli_fetch_array($run_query))
        {           
         $a->ATitle = $rd['ATitle'];
         $a->ADetails = $rd['ADetails'];
         $a->ATime = $rd['ATime'];     
         $a->ALink = $rd['ALink'];     
            
           echo "<div class='card' style='width: 18rem;'>
           <div class='card-body card-bodys'>
             <h5 class='card-title'>$a->ATitle</h5>
             <h6 class='card-subtitle mb-2 text-muted'>$a->ATime</h6>
             <p class='card-text'>$a->ADetails</p>
             <a href='$a->ALink' class='card-link'>News link</a>          
           </div>
         </div>";
        }
    }
    public function RecoverAnnouncementAll(Announcement $a){        
        include('Includes/connection.php'); 
        $query_ann = "SELECT * FROM announcements ORDER BY ANid ASC";                    
        $run_query = mysqli_query($conn , $query_ann);
        while($rd = mysqli_fetch_array($run_query))
        {           
         $a->ATitle = $rd['ATitle'];
         $a->ADetails = $rd['ADetails'];
         $a->ATime = $rd['ATime'];     
         $a->ALink = $rd['ALink'];     
            
           echo "<div class='card' style='width: 18rem;'>
           <div class='card-body card-bodys'>
             <h5 class='card-title'>$a->ATitle</h5>
             <h6 class='card-subtitle mb-2 text-muted'>$a->ATime</h6>
             <p class='card-text'>$a->ADetails</p>
             <a href='$a->ALink' class='card-link'>News link</a>          
           </div>
           </div>
         ";
        }
    }

}

?>