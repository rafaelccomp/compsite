<?php


/**
 * Skeleton subclass for representing a row from the 'Professor' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Feb 14 12:38:37 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Professor extends BaseProfessor {

    public function getNameR(){
        $name = $this->getName();
        $var = "";
        for($i = 0; $i<15; $i++)
           $var.=$name[$i];

        return $var."...";
    }
} // Professor