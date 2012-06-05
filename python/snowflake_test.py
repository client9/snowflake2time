#!/usr/bin/env python
import unittest

from snowflake import *
class SnowflakeTest(unittest.TestCase):

    def test_str2utc(self):
        stamp = str2utc("Mon May 21 22:16:35 +0000 2012")
        self.assertEquals(stamp, 1337638595)

    def test_snowflake2utc(self):
        utc = snowflake2utc(204697221847986177)
        self.assertEquals(int(utc), int(1337638595.44))

    def test_snowflake2utcms(self):
        utc = snowflake2utcms(204697221847986177)
        # danger floating point maths
        self.assertAlmostEqual(utc, 1337638595436)

    def test_diff(self):
       diff = snowflake2utcms(204697221847986177) - str2utcms("Mon May 21 22:16:35 +0000 2012")
       self.assertEquals(diff, 436)

if __name__ == '__main__':
    unittest.main()
