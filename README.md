### Registration
        - [X] A form must ask a user for registration details
            email (must be valid)
            username (required, add any other validation)
            password (required, add any other validation like min length, characters, etc)
            confirm password (required, must match password)
        - [X]Password and confirm password must match before anything happens
        - [X]Ensure email and username are unique
        - [X]Before insertion to the Users table password must be hashed via password_hash($password, PASSWORD_BCRYPT)
        - [X]On successful registration redirect the user to the login page
### Login
        - [X] A form must ask for login details
            either username or email (one input field should allow either)
                You'll need a way to determine if it's an email or a username and validate accordingly
                password (follows same rules as registration)
        - [X] All data should be valid before being sent out
        - [X] Find the single user by email or username
            Return their id, username, email, password
        - [X] Verify the password(hash) from the db compared to the password from the form
        - [] If there's a validation error or general error return the appropriate message
        - [X] If the password matches
            unset the password from the result set (we don't want it to leak from this scope/context)
            return the data pulled from the db
        - [X] Have the app store the user details in a session
            Make sure the session doesn't get lost between pages
            Set the session cookie to be secure and http only and set other flags to improve security
        - [X] On successful login redirect the user to a home/dashboard page
### Navigation bar
        - [X] include this nav on every page except logout
        - [X] include login, register, logout
            these must be functional
            The navigation state should change based on whether or not the user is logged in
                feel free to include any other links but use href="#" so it's there as a mockup for future features
### Home
        -[X] Have a basic navigation bar with mock links
        Display a welcome message to the user by username (i.e., Welcome, John Doe!);
        -[X] Redirect the user to login page if they are not logged in
### Logout
        -[X] Should destroy the session
        -[X] Redirect to login
