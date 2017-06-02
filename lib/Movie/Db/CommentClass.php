<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentClass
 */
class Comment {

    public $id;
    public $comment;
    public $date;
    public $member;
    public $postid;

    public function __construct($inId = null, $inComment = null, $inDate = null, $inMember = null, $inPostid = null) {
        $this->id = $inId;
        $this->comment = $inComment;
        $this->date = $inDate;
        $this->member = $inMember;
        $this->postid = $inPostid;
    }

}
