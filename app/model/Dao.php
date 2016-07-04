<?php
/**
 * Created by PhpStorm.
 * User: kalen
 * Date: 16/6/25
 * Time: 下午9:19
 */

namespace App\Model;
use Core\Model;

class Dao extends Model
{
    private $user;
    const TAB_USER = "users";
    const TAB_TEACH_INFO = "seam_infos";
    const TAB_LIB_INFO = "library_infos";

    function __construct($user)
    {
        parent::__construct();
        $this->user = $user;
    }

    private function insert_user($user){
        $this->db->where ('openId', $user['id']);
        $this->db->get(self::TAB_USER);
        if ($this->db->count > 0) return;

        $data = array(
            'openId' => $user['id'],
            'nickname' => $user['nickname'],
            'avatar' => $user['avatar']
        );
        $this->db->insert(self::TAB_USER, $data);
    }

    function add_library_info($uname, $passwd){
        $data = array(
            "openId" => $this->user['id'],
            "uname" => $uname,
            "passwd" => $passwd
        );
        $this->db->insert(self::TAB_LIB_INFO, $data);
    }

    function add_seam_info($uname, $passwd){
        $data = array(
            "openId" => $this->user['id'],
            "uname" => $uname,
            "passwd" => $passwd
        );
        $this->db->insert(self::TAB_TEACH_INFO, $data);
    }

    function delete_seam_info(){
        $this->db->where('openId', $this->user['id']);
        $this->db->delete(self::TAB_TEACH_INFO);
    }

    function get_library_info(){
        $this->db->where('openId', $this->user['id']);
        $infos = $this->db->get(self::TAB_LIB_INFO);
        if ($this->db->count == 1){
            return $infos[0];
        }else{
            return false;
        }
    }

    function delete_library_info(){
        $this->db->where('openId', $this->user['id']);
        $this->db->delete(self::TAB_LIB_INFO);
    }

    function get_seam_info(){
        $this->db->where('openId', $this->user['id']);
        $infos = $this->db->get(self::TAB_TEACH_INFO);
        if ($this->db->count == 1){
            return $infos[0];
        }else{
            return false;
        }
    }
}

