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

class LibraryController extends BaseController
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
            'result' => $this->dao->get_library_info()
        ];
        $this->render('library/bind.php', $data);
    }

    function borrowed_books()
    {
        $result = $this->dao->get_library_info();
        if ($result == false){
            $this->redirect_bind();
        }
        $crawler = new Crawler($this->dao);

        $data = [
            'borrowed_books' => $crawler->library_borrowed_books()
        ];
        $this->render('library/borrowed_books.php', $data);
    }

    function add()
    {
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];
        if ($uname && $passwd){
            $this->dao->add_library_info($uname, $passwd);
        }
        $this->redirect_bind();
    }

    function delete()
    {
        $this->dao->delete_library_info();
        $this->redirect_bind();
    }

    private function redirect_bind()
    {
        $this->redirect('/index.php/library/bind');
    }

}