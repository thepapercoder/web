<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/10/2016
 * Time: 10:40 AM
 */

class Training_Coach extends Model
{
    private $variableType = "ii";
    protected $id;
    protected $cid;

    public static function getTrainingCoach($id)
    {
        $sql = $sql = "SELECT `name`, `user`.id FROM `training_coach`, `user` WHERE `training_coach`.`cid` = `user`.`id` AND `user`.`userType` = 'coach' AND `training_coach`.`id` = ".$id;
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
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * @param mixed $cid
     */
    public function setCid($cid)
    {
        $this->cid = $cid;
    }


}