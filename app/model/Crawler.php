<?php
/**
 * Created by PhpStorm.
 * User: kalen
 * Date: 16/6/25
 * Time: 下午9:14
 */

namespace App\Model;

class Crawler
{
    /**
     * @var $dao \App\Model\Dao
     */
    private $dao;

    function __construct($dao)
    {
        $this->dao = $dao;
    }

    function seam_classtable()
    {
        $info = $this->dao->get_seam_info();
        $request = \Requests::get("http://wx.ustb806.cn:8879/teach?pattern=classtable&uname=".$info['uname']."&passwd=".$info['passwd']);
        return $request->body;
    }

    function seam_semesters()
    {
        $info = $this->dao->get_seam_info();
        $request = \Requests::get("http://wx.ustb806.cn:8879/teach?pattern=semester&uname=".$info['uname']."&passwd=".$info['passwd']);
        return $request->body;
    }

    function seam_scores($semester)
    {
        $info = $this->dao->get_seam_info();
        $request = \Requests::get("http://wx.ustb806.cn:8879/teach?pattern=scores&uname=".$info['uname']."&passwd=".$info['passwd']."&semester=".$semester);
        return $request->body;
    }

    function seam_innovative_score1()
    {
        $info = $this->dao->get_seam_info();
        $request = \Requests::get("http://wx.ustb806.cn:8879/teach?pattern=innovative_score1&uname=".$info['uname']."&passwd=".$info['passwd']);
        return $request->body;
    }

    function seam_innovative_score2()
    {
        $info = $this->dao->get_seam_info();
        $request = \Requests::get("http://wx.ustb806.cn:8879/teach?pattern=innovative_score2&uname=".$info['uname']."&passwd=".$info['passwd']);
        return $request->body;
    }

    function library_borrowed_books()
    {
        $info = $this->dao->get_library_info();
        $request = \Requests::get("http://wx.ustb806.cn:8879/lib?&uname=".$info['uname']."&passwd=".$info['passwd']);
        return $request->body;
    }
    
}