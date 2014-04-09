#Not a function, but an example, to use in MySQL,
#go from (snowflake) Tweet ID to unix timestamp
# Remove the DIV 1000 for miliseconds.

SELECT
(
  (
    (tweetid DIV 4194304)
    +1288834974657
  )
  DIV 1000
)
FROM table
