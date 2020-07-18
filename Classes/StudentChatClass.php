
<?php

class Chat{
    
    public $Cid;
    public $Message;    
    public $Sid;    
    public $Time;    
    public function InsertChat(Chat $chat){
        include('Includes/connection.php');                          
        $query_insert_chat = "INSERT INTO chat (Message,Sid,Time) VALUES('$chat->Message' , '$chat->Sid' , '$chat->Time')";                    
        $is_inserted_chat = mysqli_query($conn,$query_insert_chat);                              
    }
    public function GetAllChat(Chat $chat){
        include('Includes/connection.php');                          
        $query_get_chat = "SELECT * FROM studentreg";                    
        $is_get_chat = mysqli_query($conn,$query_get_chat);                
        while($rd1 = mysqli_fetch_array($is_get_chat))
        {                         
            $std_id = $rd1["Sid"];    
            $name = $rd1["SName"];    
            echo"
            <tr>            
            <td >$name</td>
            <td><a href='AdminChat.php?sid=$std_id' class='btn btn-info'>Chat</a></td>
          </tr>
            ";
        }            
    }
    public function InsertAdminChat(Chat $chat){
        include('Includes/connection.php');                          
        $query_insert_chat_admin = "INSERT INTO adminchat (Message,Sid,Time) VALUES('$chat->Message' , '$chat->Sid' , '$chat->Time')";                    
        $is_inserted_chat_admin = mysqli_query($conn,$query_insert_chat_admin);              
    }
    
}

?>
