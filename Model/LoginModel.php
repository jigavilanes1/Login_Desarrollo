<?php
    include_once("../Config/Database.php");

    class Login {
        private $id;
        private $usuario;
        private $password;

        public function __construct()
        {            
        }

        public function setId($_ID) {
            $this->id = $_ID;
        }
        
        public function getId() {
            return $this->id;
        }
        
        public function setUsuario($_usuario) {
            $this->usuario = $_usuario;
        }
        
        public function getUsuario() {
            return $this->usuario;
        }        

        public function setPassword($_password) {
            $this->password = md5($_password);
        }
        
        public function getPassword() {
            return $this->password;
        }

        public function insertarLogin() {
            $conn = new DataBase();

            $sql = "insert into usuarios(id,usuario,password) values (null,?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("ss",$this->usuario,$this->password);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function BuscarUsuario() {
            $conn = new DataBase();

            $sql = "select * from usuarios where usuario = ? and password = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("ss",$this->usuario,$this->password);
            $stmt->execute();
            $result = $stmt->get_result();            
            while ($row = $result->fetch_assoc()) {                
                if($row != null) {
                    return true;
                }
            }            
        }
    }
?>