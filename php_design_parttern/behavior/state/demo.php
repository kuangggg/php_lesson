<?php

interface Member
{
    public function position();
}

class bronze implements Member
{
    public function position()
    {
        return "< 100";
    }
}

class gold implements Member
{
    public function position()
    {
        return "100> < 300";
    }
}


