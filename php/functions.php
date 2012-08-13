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

class Functions {

    public $db = null;

    function Functions() {
        session_start();
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

    function authUser($login, $pass) {
        $passwd = md5($pass);

        $sql = "SELECT * FROM users WHERE users.username LIKE '{$login}' AND users.password LIKE '{$passwd}'";

        $ret = $this->db->fetchRow($sql);

        if (isset($ret->id)) {
            $_SESSION['id'] = $ret->id;
            $_SESSION['name'] = $ret->name;
            $_SESSION['username'] = $ret->username;
            $_SESSION['email'] = $ret->email;
            return true;
        } else {
            return false;
        }
    }

    function getSiteFromUser($id) {
        $sql = "SELECT DISTINCT * FROM site WHERE site.id_user = {$id}";

        $site = $this->db->fetchRow($sql);
        if (isset($site->id)) {
            return $site;
        } else {
            return null;
        }
    }

    function getContentFromUser($userid, $contentid = false, $typeid = false) {
        $site = $this->getSiteFromUser($userid);

        if ($contentid && $typeid) {
            $sql .= "
                INNER JOIN 
                    site.id 
                ON
                    content.id_site
                WHERE
                    content.id = {$contentid}
                AND
                    content.id_type = {$typeid}";

            $content = $this->db->fetchRow($sql);
        } else if ($contentid) {

            $sql = "
                SELECT DISTINC 
                    *
                FROM
                    content
                IINNER JOIN 
                    site.id 
                ON
                    content.id_site
                WHERE
                    content.id = {$contentid}
                AND
                    content.id_type = {$typeid}";

            $content = $this->db->fetchRow($sql);

            if ($content) {
                return $content;
            } else {
                return null;
            }
        } else if ($typeid) {
            
        } else {


            $sql = "
            SELECT DISTINCT 
                * 
            FROM 
                content 
            INNER JOIN 
                site.id 
            ON
                content.id_site 
            WHERE
                site.id = {$site->id}";

            $content = $this->db->fetchAll($sql);

            if ($content) {
                return $content;
            } else {
                return null;
            }
        }
    }

    function getPromoFromUser($user, $id = false) {
        
    }

}

?>
