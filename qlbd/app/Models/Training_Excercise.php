<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/10/2016
 * Time: 10:37 AM
 */

class Training_Excercise extends Model
{
    private $variableType = "ii";
    protected $id;
    protected $eid;

    public static function getTrainingEx($id)
    {
        $sql = $sql = "SELECT `name`, `exercise`.`id` FROM `training_excercise`, `exercise` WHERE `training_excercise`.`eid` = `exercise`.`id` AND `training_excercise`.`id` = ".$id;
        $result = Database::getInstance()->query($sql);
        if ($result == false || $result->num_rows == 0)
        {
            return array();
        }
        else
        {
            $arrResult = array();
            while ($obj = $result->fetch_assoc())
            {
                array_push($arrResult, $obj);
            }
            return $arrResult;
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
    public function getEid()
    {
        return $this->eid;
    }

    /**
     * @param mixed $eid
     */
    public function setEid($eid)
    {
        $this->eid = $eid;
    }


}