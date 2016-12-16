<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/10/2016
 * Time: 10:39 AM
 */
class Training_Player extends Model
{
    private $variableType = "ii";
    protected $id;
    protected $pid;

    public static function getTrainingPlayer($id)
    {
        $sql = $sql = "SELECT `name`, `user`.id FROM `training_player`, `user` WHERE `training_player`.`pid` = `user`.`id` AND `user`.`userType` = 'player' AND `training_player`.`id` = ".$id;
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
    public function getid()
    {
        return $this->id;
    }

    /**
     * @param mixed $tid
     */
    public function setid($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param mixed $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }


}