SELECT finalfood.name, finalfood.type, finalfood.cal
FROM finalfood
LEFT OUTER JOIN finaldaily ON finaldaily.namefood = finalfood.name
where finaldaily.userid = :userid