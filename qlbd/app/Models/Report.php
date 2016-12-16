<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/10/2016
 * Time: 10:41 AM
 */

class Report extends Model
{
    private $variableType = "issi";
    protected $id;
    protected $title;
    protected $content;
    protected $tid;

    public static function Delete($obj)
    {
        $id = $obj->getId();
        $sqlReportPlayer = "DELETE FROM `report` `report_player` `attribute` USING `report` INNER JOIN `report_player` INNER JOIN `attribute`
WHERE `report`.`id`=`report_player`.`id` AND `report_player`.`aid`=`attribute`.`id` AND `report`.`id` = ".$id;
        $result = Database::getInstance()->execute($sqlReportPlayer);
        if ($result == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * @return string
     */
    public function getVariableType()
    {
        return $this->variableType;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * @param mixed $tid
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
    }

}