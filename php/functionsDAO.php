<?php

require_once 'db/Postgres.php';
require_once 'dao/Advertising.php';
require_once 'dao/Content.php';
require_once 'dao/Content_type.php';
require_once 'dao/Promo.php';
require_once 'dao/Site.php';
require_once 'dao/Slider.php';
require_once 'dao/Slider_type.php';
require_once 'dao/Users.php';

class FunctionsDAO {

    public $db = null;

    function FunctionsDAO() {
        start_session();
        $this->db = new Postgres();
    }

    function getUser($email = false, $name = false, $id = false) {
        if ($email) {
            $sql = "SELECT DISTINCT * FROM users WHERE users.mail = {$mail}";
            $user = $this->db->fetchRow($sql);

            if ($user) {
                return $user;
            } else {
                return null;
            }
        } else if ($name) {
            $sql = "SELECT DISTINCT * FROM users WHERE users.name = {$name}";
            $user = $this->db->fetchRow($sql);

            if ($user) {
                return $user;
            } else {
                return null;
            }
        } else if ($id) {
            $sql = "SELECT DISTINCT * FROM users WHERE users.id = {$id}";
            $user = $this->db->fetchRow($sql);

            if ($user) {
                return $user;
            } else {
                return null;
            }
        } else {
            $sql = "SELECT DISTINCT * FROM users";
            $user = $this->db->fetchAll($sql);

            if ($user) {
                return $user;
            } else {
                return null;
            }
        }
    }

    function authUser($user) {
        $mail = $user->email;
        $passwd = md5($user->password);

        $sql = "SELECT * FROM users WHERE users.email = '{$user->email}' AND users.password =  '{$passwd}'";

        $user = $this->db->fetchRow($sql);

        if ($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;
            return true;
        } else {
            
        }
    }

    function getSiteFromUser($email = false, $name = false) {
        $user = null;

        if ($id) {
            $sql = "SELECT DISTINCT * FROM site WHERE site.id_user = {$id}";

            $site = $this->db->fetchRow($sql);
        } else {
            if ($email) {
                $user = $this->getUser($email);
            } else if ($name) {
                $user = $this->getUser($name);
            }

            $sql = "SELECT DISTINCT * FROM site WHERE site.id_user = {$user->id}";

            $site = $this->db->fetchRow($sql);
        }
    }

    function getContentFromUser($user, $id = false) {
        if ($id) {

            $sql = "SELECT * FROM content WHERE ";
        } else {
            
        }
    }

    function getPromoFromUser($user, $id = false) {
        
    }

}

?>
