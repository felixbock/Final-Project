SELECT *
    FROM finalfood
    WHERE name = :searchterm OR type = :searchtype
    