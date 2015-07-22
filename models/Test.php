<?php


class Test extends AbstractModelBlog
{
    public $id;
    public $title;
    public $text;
    protected static $table = 'news';
    protected static $class = 'News';
}