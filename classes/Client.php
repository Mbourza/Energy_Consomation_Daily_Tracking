<?php 

class Client {

	private $_db,
            $_data,
            $_sessionName,
            $_isLoggedIn;

	public function __construct($client = null){

		$this->_db = DB::getInstance();
        
        $this->_sessionName = Config::get('session/session_name');
        
        if(!$client) {
            
            if(Session::exists($this->_sessionName)) {
                
                $client = Session::get($this->_sessionName);
                
                if($this->find($client)) {
                    
                    $this->_isLoggedIn = true;

                } else{ 
                    
                    //logout
                }
            }
            
        } else{
                
            $this->find($client);
        }
	}

	public function create($fields = array()){

		if(!$this->_db->insert('clients', $fields)) {

			throw new Exception('There Was A Problem Creating Account');
		}
	}
    
    public function find($client = null){
        
        if($client){
            
            $field = (is_numeric($client)) ? 'id_client' : 'email';
            $data  = $this->_db->get('clients', array($field, '=', $client));
            
            if($data->count()){  
                $this->_data = $data->first();
                return true;
            }
        }
        
        return false;
    }
    
    public function login($email = null, $password = null){
        
        $client = $this->find($email);
        
        if($client){
            
            if($this->data()->password === Hash::make($password, $this->data()->salt)){
                
                Session::put($this->_sessionName, $this->data()->nom_client);

                return true;
            }
        }

        return false;
    }
    
    public function logOut(){
        
        Session::delete($this->_sessionName);
    }
    
    public function data(){
        
        return $this->_data;
    }
    
    public function isLoggedIn(){
        
        return $this->_isLoggedIn;
    }
}



?>

