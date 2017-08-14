# Login-Intranet
A PHP web app where an admin can login and create user accounts for general staff. General staff can then use their accounts to log in to the secure intranet area. This was one of my assignments for Web Programming with PHP.

1. Main index page, provides some dummy content, as an introduction to the intranet, plus the following links:
	i. Intranet: links to a secure page which provides access to module results via a login
	ii. Administrator: links to a registration page/form via admin password, which if successful, allows an administrator to set up new members of staff.

2. Log-in: A member of staff isable to log-in to the intranet by entering a valid username and password in a form.
3. Log-out: When a logged in member of staff logs-out of the system a message will be displayed to this effect.
4. Admin page: A page for the administrator to register new members of staff to allow them to login to the intranet. The data required for a member of staff to be registered as a user is:
	a. Title
	b. First name
	c. Surname
	d. Email
	e. Username
	f. Password (The administrator password should be “admin01”).
5. The secure intranet consists of the following:
	An intranet index page which links to 3 module results pages (data provided in the FMA resources folder in Moodle). These three pages should show module results for the following modules:
	a. Web Programming using PHP - P1 Results
	b. Introduction to Database Technology – DT Results
	c. Problem Solving for Programming – PfP Results

6. Users are able to browse between pages while maintaining their logged-in or out status, regardless of their browser settings. N.B. the module results pages should only be accessible if a member of staff has successfully logged in, otherwise only the index page should be available.

7. All pages display a link or form to log-in or out depending on the current user status. If the user is logged in, the page displays the username of the logged in user and if a user logs out they are redirected to the index page. A user navigating to any of the public content pages is able to view the content directly whether they are logged-in or logged-out. The pages clearly display the users status. If a logged out user tries to access the intranet pages, they should be politely requested to log-in.
