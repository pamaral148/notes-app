Assignment2 Notes App URL: 

Step 1 | Score 5 | Click register on login page and complete email and password/password confirmation fields. Emails must be unique and password hash is stored in database.
Step 2 | Score 5 | Registration includes Captcha from Google Recaptcha service. We installed a Laravel package that provided functionality and then registered our URL.
Step 3 | Score 5 | Login page includes Reset password link that sends user an email containing reset instructions. Account is locked until user resets password.
Step 4 | Score 5 | After submitting registration, user is created but not activated. User receives an email containing an activation link and when they click the link, they are activated bys system.
Step 5 | Score 5 | After three consecutive fails, the system locks the email's account and sends a reset email for reactivation.
Step 6 | Score 5 | On Notes tab, user can create notes that are stored in database.
Step 7 | Score 5 | On TBD tab, user can create and complete TBD that are stored in database.
Step 8 | Score 5 | On Links tab, user can add and view hyperlinks that are stored in database.
Step 9 | Score 5 | On Images tab, user can upload images to database and view thumbnail or full size image. Images are retrieved from database and stored in user-specific temp directory on login. Directory and contents are destroyed on logout.
Step 10 | Score 5 | On Notes tab, users can click edit and edit the textarea to update a note.
Step 11 | Score 5 | On TBD tab, users can click edit and edit the textarea to update a TBD.
Ste 12 | Score 5 | On Links tab, users can click edit and edit the hyperlink text box.
Step 13 | Score 5 | After uploading four images, users are blocked from uploading more and receive a validation message explaining why the upload failed.
Step 14 | Score 5 | Users can only upload jpeg and gif MIME type (*.jpg, *.jpeg, *.gif)
Step 15 | Score 5 | Users can delete images on the Images tab by clicking delete icon.
Step 16 | Score 5 | Application creates user-specific temp directory for images on login and deletes it on logout. Images are stored in database.
Step 17 | Score 5 | Users logout by clicking Sign out
Step 18 | Score 5 | Remember me checkbox populated username field with using cookies, and unauthenticated users are redirected to register page using application filters file.
Step 19 | Score 5 | Use framework authentication package to ensure secure sessions.
Step 20 | Score 5 | Use cookie to track user activity on every request. If cookie is expired (20 min expiration), user is automatically logged out of application.

Total | Score 100 | Comp2920 Assignment2 Notes App    
