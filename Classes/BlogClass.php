<?php
date_default_timezone_set("Asia/Karachi");
// use \Datetime;
?>

<?php

class Blog{        
            
    public $Bid;
    public $BTitle;    
    public $BDescription;        
    public $BImage ;
    public $BTime;    
    public function InsertBlog(Blog $a){
        $now = new DateTime();
        $time = $now->format('Y-m-d H:i:s');    // MySQL datetime format
        // echo $now->getTimestamp();    
        include('Includes/connection.php');                          
        $query_insert_blog = "INSERT INTO blog (BTitle,BDescription,BImage,BTime) VALUES('$a->BTitle' , '$a->BDescription' , '$a->BImage' , '$time')";                    
        $is_inserted_blog = mysqli_query($conn,$query_insert_blog);        
        if($is_inserted_blog)
        {
            echo "<script>alert('Blog Inserted Successfully')</script>";
            echo"  <script>window.location.href = 'AdminHome.php'</script>"; 
        }
        else{
            echo "<script>alert('fill all fields Correctly')</script>";
        }               
    }
    public function RecoverBlog(Blog $a){        
        include('Includes/connection.php'); 
        $query_blog = "SELECT * FROM blog ORDER BY Bid ASC LIMIT 3";                    
        $run_query = mysqli_query($conn , $query_blog);
        while($rd = mysqli_fetch_array($run_query))
        {           
         $a->BTitle = $rd['BTitle'];
         $a->BDescription = $rd['BDescription'];
         $a->BImage = $rd['BImage'];     
         $a->BTime = $rd['BTime'];     
            
         echo "<div class='card'>
         <img src='$a->BImage' class='card-img-top' alt='Blogs From Tutors Providers'>
         <div class='card-body card-bodys'>
           <h5 class='card-title'>$a->BTitle</h5>
           <p class='card-text'>$a->BDescription</p>
         </div>
         <div class='card-footer'>
           <small class='text-muted'>$a->BTime</small>
         </div>
       </div>";     
        }
    }
    public function RecoverBlogAll(Blog $a){        
        include('Includes/connection.php'); 
        $query_blog = "SELECT * FROM blog ORDER BY Bid ASC";                    
        $run_query = mysqli_query($conn , $query_blog);
        while($rd = mysqli_fetch_array($run_query))
        {           
            $a->BTitle = $rd['BTitle'];
            $a->BDescription = $rd['BDescription'];
            $a->BImage = $rd['BImage'];     
            $a->BTime = $rd['BTime'];     
            
            echo "<div class='card'>
         <img src='$a->BImage' class='card-img-top' alt=''>
         <div class='card-body'>
           <h5 class='card-title'>$a->BTitle</h5>
           <p class='card-text'>$a->BDescription</p>
         </div>
         <div class='card-footer'>
           <small class='text-muted'>$a->BTime</small>
         </div>
       </div>"; 
        }
    }

}

?>