<?php

    class Crud {
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insert($username, $password, $full_name, $phone, $email, $birth_date, $is_active, $role_id) {
            try {
                $sql = "INSERT 
                INTO users
                VALUES 
                (0, :username, :password, :full_name, :phone, :email, :birth_date, :is_active, :role_id)";

                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->bindparam(':full_name', $full_name);
                $stmt->bindparam(':phone', $phone);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':birth_date', $birth_date);
                $stmt->bindparam(':is_active', $is_active);
                $stmt->bindparam(':role_id', $role_id);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "</br>".$e->getMessage();
                return false;
            }
        }
    }

?>