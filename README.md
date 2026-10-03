## Lab Activity 7 Answers

### Q1. Why does the form use POST instead of GET?

My form uses POST because it changes the character data. If it used GET, the values would be placed in the URL. When the browser is refreshed, it could repeat the request and save the same character again. POST followed by a redirect avoids that problem.

### Q2. What stops the saving code when validation fails?

The `$request->validate()` method checks the data before the saving code runs. If a rule fails, Laravel automatically redirects back to the form and stores the errors and old input in the session. The method stops at the validation line, so the save method is not reached.

### Q3. Why does the success message not appear on every page?

The message is displayed in the shared layout, so the layout can show it on any page. However, `with('success', ...)` creates a flash message that is stored for only the next request. After it is displayed once, Laravel removes it from the session, so it does not appear on every page.