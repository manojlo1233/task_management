<?php

    class Crud {
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insert_user($username, $password, $full_name, $phone, $email, $birth_date, $is_active, $role_id) {
            try {
                $sql = "INSERT 
                INTO users (username, password, full_name, phone, email, birth_date, is_active, role_id)
                VALUES 
                (:username, :password, :full_name, :phone, :email, :birth_date, :is_active, :role_id)";

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

        public function get_all_users() {
            try {
                $sql = "SELECT * from users";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo "</br>".$e->getMessage();
                return false;
            }
        }
    }

?>