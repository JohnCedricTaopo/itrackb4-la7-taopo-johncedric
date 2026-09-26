## Lab Activity 6 Answers

### Q1. Why was no new route needed for the second filter?

I did not add another route because the router only looks at the path before the question mark. The URLs `/characters`, `/characters?element=Cryo`, and `/characters?element=Cryo&rarity=5` all have the same `/characters` path. The controller reads the extra values using the query string, so one index route can handle all of them.

### Q2. What would the URL look like if both filters were route parameters?

If I used route parameters, a year-or-rarity-only URL would need an empty placeholder for the first value, such as `/characters/filter/all/4` or `/characters/filter//4`, depending on how the route was designed. This is harder to read and would need more route patterns. The query-string design is better because I can send only the filter I need and combine filters easily with `&`.

### Q3. Which navigation pattern needed a change?

The detail-page case needed the pattern change because `/characters/3` is longer than `/characters`, so I used `characters*` to match the whole section. The filtered page did not need another change because `?element=Cryo` is a query string and does not change the path. The path is still `/characters`, so the same pattern already matches it.

### Q4. Why delete the old filter method but keep the empty store and update methods?

I deleted the old filter method because I already replaced it with a better query-string filter, so keeping it would leave two different filter systems in the project. I kept the empty store and update methods because they are unfinished resource-controller actions that will be used for future activities. They are placeholders for work that is still planned, while the old filter method is work that has already been replaced.