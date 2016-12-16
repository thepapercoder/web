<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/10/2016
 * Time: 10:36 AM
 */

class Training_Session extends Model
{
    private $variableType = "isss";
    protected $id;
    protected $time;
    protected $place;
    protected $info;
    protected $type;

    public static function Delete($obj)
    {
        $id = $obj->getId();
        $sqlReportPlayer = "DELETE FROM `training_session` WHERE `training_session`.`id` = ".$id;
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
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

}