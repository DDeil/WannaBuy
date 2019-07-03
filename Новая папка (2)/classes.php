<?php

interface Publ{

    public function setData(array $Data);
}


abstract class Publication implements Publ{
    protected $ID;
    protected $title;
    protected $date;
    protected $short_content;
    protected $content;
    protected $author_name;
    protected $preview;
    protected $type;




    abstract public function printItem();

    /**
     * Publication constructor.
     * @param array|null $Data
     */


    public function __construct(array $Data = null)
    {
        foreach ($Data as $name => $value){

            $this->$name = $value;
        }
    }

    /**
     * Set class data
     */
    public function setData( array $Data)
    {
        foreach ($Data as $name => $value){

            $this->$name = $value;
        }
    }
}





class NewsPublication extends Publication{

    public function printItem(){

        return '<h1>'.$this->title.'</h1><p>'.$this->date.'</p>';
    }

}




class ArticlePublication extends Publication{


    public function printItem(){

        return '<h1>'.$this->title.'</h1><p>автор: '.$this->author_name.'</p>';
    }

}




class PhotoReportPublication extends Publication{


    public function printItem(){

        return '<h1>'.$this->title.'</h1><img src="'.$this->preview.'"/>';
    }

}