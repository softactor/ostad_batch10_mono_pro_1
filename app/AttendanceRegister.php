<?php

namespace App;

class AttendanceRegister
{

    public $totalAttendance = 0;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function markAttendance($name)
    {
        echo $name. ' is present';
    }

    
}
