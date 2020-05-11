from dis import disco
from _datetime import date, time, timezone, tzinfo
from calendar import day_abbr, day_name, IllegalMonthError, month_abbr, month_name
from abc import _get_dump, _abc_init, _abc_instancecheck, _abc_register, _abc_subclasscheck, _reset_caches, _reset_registry

# Time
d = date
t = time
tz = timezone
tzi = tzinfo

# Calendar
d_a = day_abbr
d_n = day_name
ime = IllegalMonthError
m_a = month_abbr
m_n = month_name

# ABC
g_d = _get_dump