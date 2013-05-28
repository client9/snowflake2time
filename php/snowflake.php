<?php
  /**
   * Twitter Snowflake ID to timestamp (and back)
   * https://github.com/client9/snowflake2time/
   * Nick Galbreath @ngalbreath
   *
   * Public Domain -- No copyright -- Cut-n-paste!
   *  But be kind and give credit
   */

  /**
   * NEWS FLASH: rereading the code for snowflake implies it's
   *   really 63-bits, so this should work with 64-bit signed integers in
   *   PHP without using bcmath.  Still need bcmath for 32 bit systems.
   *
   * Implementation notes: to simulate unsigned 64-bit behavior in
   * PHP, bcmath is used.  It's possible on 64-bit php to maybe just
   * use clever bit juggling, but it would not work in 32-bit.
   *
   * WARNING: Only tested on 64-bit php.  Please run unit tests on
   * 32-bit platforms and report back.
   *
   * phpunit snowflake_test.php
   *
   */

function utc2snowflake($stamp)
{
    bcscale(0);
    return bcmul(bcsub(bcmul($stamp, 1000), '1288834974657'), '4194304');
}

function snowflake2utc($sf)
{
    bcscale(0);
    return bcdiv(bcadd(bcdiv($sf, '4194304'), '1288834974657'), '1000');
}

function snowflake2utcms($sf)
{
    bcscale(0);
    return bcadd(bcdiv($sf, '4194304'), '1288834974657');
}

function snowflake2utcms_nonbc($sf)
{
    //Non BCMath version
    return number_format((($sf/'4194304')+ '1288834974657'),0,'.','');
}


function str2utc($s)
{
    return strtotime($s); // , "%a %b %d %H:%M:%S +0000 %Y");
}

function str2utcms($s)
{
    return 1000 * strtotime($s); //, "%a %b %d %H:%M:%S +0000 %Y");
}

