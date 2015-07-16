<?php


class News extends AbstractModelBlog
{
    public $id;
    public $title;
    public $text;
    protected static $table = 'news';
    protected static $class = 'News';
}