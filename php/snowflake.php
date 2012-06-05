<?php
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

function str2utc($s)
{
    return strtotime($s); // , "%a %b %d %H:%M:%S +0000 %Y");
}

function str2utcms($s)
{
    return 1000 * strtotime($s); //, "%a %b %d %H:%M:%S +0000 %Y");
}

