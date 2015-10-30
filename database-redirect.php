<?php
session_start();
class Db {
    
    protected $con;
    private $host = "eu-cdbr-azure-west-c.cloudapp.net";
    private $user = "bbafb55bdffce4";
    private $pwd = "5a4ecc10";
    private $db = "TecLogLog";
    
    //Creates a PDO conection & sets error mode to exceptions
    public function __construct(){
    
        try { 
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pwd); 
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } 
        catch(PDOException $e) { 
            echo $e->getMessage();
        }
        
    }
    
    //sets the datab to null
    //The connection will be closed automatically when the script ends.
    public function disconect() {
        
        $this->con = null;
        
    }
    //create table if not exists
    public function createTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS notes (
                       id INT(11) AUTO_INCREMENT,
                       last_modified TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                       content text,
                       PRIMARY KEY(id)
                    );";
            $this->con->query($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //create table if not exists
    public function createadminTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS admin (
                       admin_id INT(11) AUTO_INCREMENT,
                       adminName VARCHAR(265) NOT NULL,,
                       username VARCHAR(265) NOT NULL,,
                       password VARCHAR(265) NOT NULL,,
                       salt VARCHAR(265) NOT NULL,,
                       PRIMARY KEY(admin_id)
                    );";
            $this->con->query($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    // function for drop notes table
    public function dropTable() {
        try {
            $sql = "DROP TABLE notes;";
            $this->con->query($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //function for create new notes and insert content 
    public function createNote($content) {
        try {
            $query = $this->con->prepare("INSERT INTO notes (content) VALUES (:content);");
            $query->bindParam(':content', $content);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //function for fetch all notes from table notes order by last modified date
    public function getNotes() {
        try{
            $query = $this->con->prepare("SELECT * FROM notes ORDER BY last_modified DESC;");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //function for get min id from notes table
    public function getMinId() {
        try{
            $query = $this->con->prepare("SELECT min(id) FROM notes;");
            $query->execute();
            return $query->fetch()[0];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //function for get max id from notes table
    public function getMaxId() {
        try{       
            $query = $this->con->prepare("SELECT max(id) FROM notes;");
            $query->execute();
            return $query->fetch()[0];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //function for findout is this id is valid in notes table
    public function isValid($id) {
        try{
            $query = $this->con->prepare("SELECT * FROM notes WHERE id = :id;");
            $query->bindParam(':id', $id);
            $query->execute();
            return count($query->fetchAll()) > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //function for delete notes from table notes for given id
    public function deleteNote($id) {
        try{          
            $query = $this->con->prepare("DELETE FROM notes WHERE id = :id;");
            $query->bindParam(':id', $id);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //update existing notes for given id
    public function updateNote($id, $newContent) {
        try{
            $query = $this->con->prepare("UPDATE notes
                                           SET content = :content,
                                               last_modified = CURRENT_TIMESTAMP
                                           WHERE id = :id");
            $query->bindParam(':id', $id);
            $query->bindParam(':content', $newContent);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //function for admin signup compare two password and create random salt & hash the password
    //and insert the vale into admin table where id will auto increments
    //and redirect to admin signin page for login 
       public function adminSignup($params) {
        try {
            $passone=$_POST['password1'];
            $passtwo=$_POST['password2'];

                if($passone == $passtwo)
                {
                        /******************************************************************************************/
                                define('SALT_LENGTH', 9);
                                $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
                                $password = $salt . hash("sha512", $salt . $passone);
                        /******************************************************************************************/
                        $query = $this->con->prepare("INSERT INTO admin (adminName,username,password,salt) VALUES (:fullname,:admin_username,:password1,:salt);");
                        $query->bindParam(':fullname', $params['fullname']);
                        $query->bindParam(':admin_username', $params['admin_username']);
                        $query->bindParam(':password1', $password);
                        $query->bindParam(':salt', $salt);
                        $query->execute();

                        //signup successfull redirect to signin page
                        header("location:admin_signin.php");
                }
                elseif ($passone != $passtwo) {
                    $_SESSION['admin_signup_error']="password are not matched";
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
     //function for admin signin check username and password from admin table
    //if user name or password are not matched so set error session and asked to try again
    //if login success so set  admin login session and redirect to admin index page
       public function adminSignin($signin_params) {
        try{
                
                $user_name=$_POST['admin_username'];
                $temp_password=$_POST['admin_password'];

            $query = $this->con->prepare("SELECT * FROM admin WHERE username = :admin_username;");
            $query->bindParam(':admin_username', $user_name);
            $query->execute();
            //return count($query->fetchAll()) > 0;
             $rowcount=$query->rowCount();
            //echo " No of records = ".$rowcount;  
            if($rowcount == 1)
            {
                
                //access the every single column of row
               $row = $query->fetch(PDO::FETCH_ASSOC);
               //access the data 
               $admin_id=$row['admin_id'];
               $password=$row['password'];
               $salt=$row['salt'];
               //password hash with salt for compare
                $checkpass = $salt . hash("sha512", $salt . $temp_password);
                if($password == $checkpass)
                {
                    //echo'password matched';
                    /****************************************************/
                        $_SESSION['admin_login']=$row['adminName'];
                    /****************************************************/
                    header('Location: admin_index.php');
                    
                }
            }
            else{
                $_SESSION['admin_login_error']="username or password are not matched";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }         
        
    }
    
}
?>

            