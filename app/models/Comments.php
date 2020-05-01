<?php

use Phalcon\Mvc\Model;

class Comments extends Model
{
    public $id;
    public $postid;
    public $user;
    public $comment;
}