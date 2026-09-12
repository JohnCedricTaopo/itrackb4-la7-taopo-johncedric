Question
Q1. Explain the order you placed your featured route and your detail route in, and what would happen if you swapped them.

I placed my featured route before my detail route because the detail route uses {id}, which can also match the word featured. If I switched their order, Laravel might treat featured as an id and open the wrong method instead of showing my featured page.


Q2. What happens when someone visits an id that does not exist in your data, and what did you write to make that happen?


When a visitor enters an id that is not included in my data, the website displays a 404 error page. I made this happen by checking the id with isset() and using abort(404) when no matching item was found.


Q3. Why do your links use route names instead of typed URLs? Give one concrete thing that would break if they did not.

I used named routes so I do not have to repeat URLs in all my Blade files. If I typed the URL manually and later renamed the list route, the old link would still point to the previous address and would no longer work.
## Lab Activity 4 Notes

This activity uses one shared Blade layout for the project pages. The layout contains the common HTML structure, Bootstrap stylesheet, navigation, site heading, and student name. The individual pages extend the layout and fill the title and content sections.

The list page uses @forelse to show the characters or an empty message, @if to display different rarity styles, and $loop->iteration to number the rows.

## Lab Activity 5 Notes

This activity reorganized the project into a resource controller. The controller contains the seven conventional Laravel action names, while the working list and detail behavior remain in index and show. The featured and filter actions remain as separate custom methods.

The routes use one resource line. The line is restricted to index and show because the other five resource methods are not implemented yet. The custom featured and filter routes are written above the resource route so they are not treated as character ids.