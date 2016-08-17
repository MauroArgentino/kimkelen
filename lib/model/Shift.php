<?php 
/*
 * Kimkëlen - School Management Software
 * Copyright (C) 2013 CeSPI - UNLP <desarrollo@cespi.unlp.edu.ar>
 *
 * This file is part of Kimkëlen.
 *
 * Kimkëlen is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License v2.0 as published by
 * the Free Software Foundation.
 *
 * Kimkëlen is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kimkëlen.  If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
 */ ?>
<?php

class Shift extends BaseShift
{
  public function __toString()
  {
    return $this->getName();
  }

  public function countStudentsInDivisions($divisions)
  {
    $students = array();
    foreach ($divisions as $division)
    {
      foreach ($division->getStudentsIds() as $id)
      {
        $students[$id] = $id;
      }
    }
    return count($students);
  }

  public function getStudentIdsFromDivisions($divisions)
  {
    $student_ids = array();
    foreach ($divisions as $division)
    {
      foreach ($division->getStudentsIds() as $id)
      {
        $student_ids[$id] = $id;
      }
    }
    return $student_ids;
  }

  public function canBeDeleted(PropelPDO $con = null)
  {
    $criteria = new Criteria();
    $criteria->add(DivisionPeer::SHIFT_ID, $this->getId());
    
    return !(DivisionPeer::doCount($criteria));
  }
}