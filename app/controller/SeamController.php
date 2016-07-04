<?php
/**
 * Created by PhpStorm.
 * User: kalen
 * Date: 7/3/16
 * Time: 12:38 AM
 */

namespace App\Controller;

use App\Ext\BaseController;
use App\Model\Crawler;
use App\Model\Dao;

class SeamController extends BaseController
{
    private $dao;

    function __construct()
    {
        parent::__construct();
        $this->check_oauth();
        $this->dao = new Dao($this->user);
    }

    function bind()
    {
        $data = [
            'result' => $this->dao->get_seam_info()
        ];
        $this->render('seam/bind.php', $data);
    }

    function check_bind()
    {
        $result = $this->dao->get_library_info();
        if ($result == false){
            $this->redirect_bind();
        }
    }

    function classtable()
    {
        $this->check_bind();
        $crawler = new Crawler($this->dao);
        $class_table = $crawler->seam_classtable();
        $table_change = array('nullnull'=>'地点未知', '<br/><br/>'=>'<hr>');
        $class_table = strtr($class_table, $table_change);
        $data = [
            'classtable' => $class_table
        ];
        $this->render('seam/classtable.php', $data);
    }

    function scores()
    {
        $this->check_bind();
        $crawler = new Crawler($this->dao);
        $semester = 'all';
        if (isset($_POST['XNXQ'])){
            $semester = $_POST['XNXQ'];
        }

        $data = [
            'semester' => $semester,
            'semesters' => $crawler->seam_semesters(),
            'scores' => $crawler->seam_scores($semester)
        ];
        $this->render('seam/scores.php', $data);
    }

    function innovative_credit()
    {
        $this->check_bind();
        $crawler = new Crawler($this->dao);
        $data = [
            'innovative_score1' => $crawler->seam_innovative_score1(),
            'innovative_score2' => $crawler->seam_innovative_score2(),
        ];
        $this->render('seam/innovative_credit.php', $data);
    }



    function add()
    {
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];
        if ($uname && $passwd){
            $this->dao->add_seam_info($uname, $passwd);
        }
        $this->redirect_bind();
    }

    function delete()
    {
        $this->dao->delete_seam_info();
        $this->redirect_bind();
    }

    private function redirect_bind()
    {
        $this->redirect('/index.php/seam/bind');
    }

}