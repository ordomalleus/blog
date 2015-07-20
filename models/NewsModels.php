<?php


class NewsModels extends AbstractModelNews
{

    protected static $table = 'news';

    public $id;
    public $title;
    public $text;

}