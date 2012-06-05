#!/usr/bin/env python

import time
import calendar

def str2utc(s):
    # parse twitter time string into UTC seconds, unix-style
    # python's bizarro world of dates, times and calendars
    return calendar.timegm(time.strptime(s, "%a %b %d %H:%M:%S +0000 %Y"))

def utc2snowflake(stamp):
    return ((stamp * 1000) - 1288834974657) << 22

def snowflake2utc(sf):
    return ((sf >> 22) + 1288834974657) / 1000.0

def str2utcms(s):
    return 1000 * calendar.timegm(time.strptime(s, "%a %b %d %H:%M:%S +0000 %Y"))

def snowflake2utcms(sf):
    return ((sf >> 22) + 1288834974657)

# really is the best way to get utc timestamp?
# (minus changing your box to be UTC)
def utcnow():
    calendar.timegm(datetime.datetime.utcnow().timetuple())
