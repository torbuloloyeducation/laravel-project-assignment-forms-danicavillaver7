# Activity 2: Forms in Laravel - Answers
Name: Danica Marie M. Villaver  
IT 9a/L - 4541

---

## Task 1: Understand the Flow

When a user enters their email in the form and clicks submit, the form sends a POST request to the server.  
The server route receives the request, validates the email, and stores it in the session.  
After storing the email, the page reloads and dynamically displays all emails saved in the session.  
This allows users to see a list of emails they have submitted during the current session.


## xReflection Questions

1. What is the difference between GET and POST?
GET requests retrieve data and include parameters in the URL, while POST requests send data in the request body and are not visible in the URL.

2. Why do we use @csrf in forms?
@csrf generates a token to protect the form from cross-site request forgery attacks. It ensures the form is submitted only from your application.

3. What is session used for in this activity?
The session stores submitted emails so that they persist across page reloads during the user’s session.

4. What happens if session is cleared?
All stored emails are removed, and previously submitted emails will no longer appear on the page.