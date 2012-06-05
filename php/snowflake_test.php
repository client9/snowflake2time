<?php
require_once 'snowflake.php';

class SnowflakeTest extends PHPUnit_Framework_TestCase {

    function test_str2utc() {
        $stamp = str2utc("Mon May 21 22:16:35 +0000 2012");
        $this->assertEquals($stamp, 1337638595);
    }

    function test_snowflake2utc() {
        $utc = snowflake2utc(204697221847986177);
        $this->assertEquals($utc, 1337638595);
    }

    function test_snowflake2utcms() {
        $utc = snowflake2utcms(204697221847986177);
    }

    function test_diff() {
        $diff = snowflake2utcms(204697221847986177) - str2utcms("Mon May 21 22:16:35 +0000 2012");
        $this->assertEquals($diff, 436);
    }
}
