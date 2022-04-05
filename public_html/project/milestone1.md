
<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Jonathan Grossman(jg836)</td></tr>
<tr><td> <em>Generated: </em> 4/4/2022 10:23:02 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone1-deliverable/grade/jg836" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161444680-a9c4de4c-2276-4c20-b4ba-83ca58f2e2e5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>validation errors<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161445499-d1d6d277-16c0-4886-8b5f-1861292f946c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>empty field<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161445539-fe9a8e74-e946-4363-930f-5fef53507fca.pn"/></td></tr>
<tr><td> <em>Caption:</em> <p>password length validation<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161444766-7f3d1418-ad78-4ee3-b90a-a8f8f94cf94f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user DB<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/28">https://github.com/jgwentworth92/IT-202-006/pull/28</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/27">https://github.com/jgwentworth92/IT-202-006/pull/27</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/6">https://github.com/jgwentworth92/IT-202-006/pull/6</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>There is a form created and then the validation function is passed into<br>it, it will return true or false. The client-side JS validation function will<br>catch if there any invalid usernames,password, and emails. it will create and display<br>a flash message if there is an error. If there are no error,<br>there is php code that will first hash the password. It then create<br>a table for the new user  in 001_create_table_users sql database table. It<br>also associates a unique ID with each user creates. Finally flashes a message<br>that registration was successful. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161444918-8f2f2e05-8a37-438a-9875-3916fe27cb86.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>bad username<br></p>
</td></tr>
<tr><td><img width="768px" src="bad email and not long enough password"/></td></tr>
<tr><td> <em>Caption:</em> <p><a href="https://user-images.githubusercontent.com/95505687/161445047-681ea29b-62e3-4cff-8e29-1f9649634180.png">https://user-images.githubusercontent.com/95505687/161445047-681ea29b-62e3-4cff-8e29-1f9649634180.png</a><br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161445427-c944b1ae-a07d-441b-8490-37ac7647221d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>empty field<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161447093-60140d87-324d-41ad-be08-fb789176dcd8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>successful login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/30">https://github.com/jgwentworth92/IT-202-006/pull/30</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/31">https://github.com/jgwentworth92/IT-202-006/pull/31</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/27">https://github.com/jgwentworth92/IT-202-006/pull/27</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/32">https://github.com/jgwentworth92/IT-202-006/pull/32</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>First the form will make sure a field is not empty and also<br>password is correct length. The  JS validation then determine if a username<br>or email has been entered by checking if it includes an @ symbol,<br>then checks if valid username or email . the is_valid_username check to make<br>sure the username only contains numbers or letters and returns true or false.<br>the isValidEmail function use regex to check if valid email. If there are<br>no errors,  The PHP code will look in the database  where<br>the username/email entered matches entries in the tables and then call the password_verify<br>function to make sure the entered password matches the one associated with the<br>entered info.  password_verify is a built function that compares two password hashes<br>and returns true or false. after passing these, the user will be routed<br>to the home page. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161447644-56ede442-db2a-4c03-ad3a-939fc8861ae9.png""/></td></tr>
<tr><td> <em>Caption:</em> <p>logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161447698-2c4919f5-857f-46b1-806f-21551ebfeb4f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>cant access home.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/7">https://github.com/jgwentworth92/IT-202-006/pull/7</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/33">https://github.com/jgwentworth92/IT-202-006/pull/33</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/32">https://github.com/jgwentworth92/IT-202-006/pull/32</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>When the user logout, it calls the reset_session() function,  in the function<br>session_unset will unregister a session variable and then session_destroy() will destroy all data<br>assosiated the current session. The session is then reset.  If a user<br>is not logged they will only be able to access login and register<br>because the three if statements in nav.php will check if someone is logged<br>in or not. The function is_logged_in will check if their are session variable<br>currently assosiated with a username and if not, a user will only be<br>able to access login and register.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161447698-2c4919f5-857f-46b1-806f-21551ebfeb4f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>cant acccess home,gets redirected back to login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161666978-4dee672e-2173-4cda-8675-c3ff780fb262.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>role access validation<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161450936-f585b64e-e2c4-4592-9eca-991eb17bf21c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>role table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161450986-5048a243-504c-4a9b-bd3c-10e5d6e1c6a2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>userrole table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/32">https://github.com/jgwentworth92/IT-202-006/pull/32</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/24">https://github.com/jgwentworth92/IT-202-006/pull/24</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The function is_logged_in check if a user is logged in by checking if<br>current session variable is tied with a username. if they are not, the<br>current session will be unset and destroyed, they will then be redirected back<br>to the login page.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>after user successfully logins, the  php function hasrole()  takes the username<br>linked to the current session id.  the for each loop through all<br>of the values roles and see if any of them are associated with<br>the username.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/f2c037/000000?text=Partial"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161447698-2c4919f5-857f-46b1-806f-21551ebfeb4f.png"/></td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161444090-cc8175dd-adcc-4175-b9f5-7f7bf9bc2f1a.png"/></td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/26">https://github.com/jgwentworth92/IT-202-006/pull/26</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>I got rid of the 50% radious on the box from the form<br>and change the colors of everything.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161445539-fe9a8e74-e946-4363-930f-5fef53507fca.pn"/></td></tr>
<tr><td> <em>Caption:</em> <p>user friendly message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/7">https://github.com/jgwentworth92/IT-202-006/pull/7</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>flash. php creates a div container and then when flash is called it<br>takes a string as an argument. it will then display the message in<br>the string in the container.  Also manipulates so the flash will appear<br>as the first index of nav and will make it appear toward the<br>top of the screen. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161452189-b76a8b41-8345-4287-abf7-3f4e1f5dd88f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user profile<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/33">https://github.com/jgwentworth92/IT-202-006/pull/33</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>when the user goes to the profile page, a form is created in<br>PHP. Using the PHP function &quot;SE&quot; safe echo we pull the data for<br>the username and email from the user database.  Safe echo Takes an<br>array, a key, and a default value and will return the value from<br>the array if the key exists or the default value.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161452483-e8b92da5-80ce-46eb-80bd-a681592cbc9a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>validation messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161452843-882ecfb9-4819-45e8-9d10-fefd1863c4ed.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>pass too short validation.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161452920-8e55fb1d-cc62-4e59-86a3-1aa9f53b30ac.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161453116-75b4f863-ec63-4ec5-b65a-2241b0403f26.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/33">https://github.com/jgwentworth92/IT-202-006/pull/33</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>First the data entered by the user has to do some validation checks<br>client and server-side. if there are no errors , the PDO statement ;prepare()&#39;<br> will run.  It will take the current user id associated with<br>the current session and search for a password linked to passed in id<br>in the user DB.   If current password entered by user match<br>what is in the database, the program will then update the password with<br>the new one entered.  Similar update logic is applied to update either<br>the user username or email. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161634815-08b3dd00-2ef2-40c0-80b3-665a0b355a03.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>md proposal updated pic<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/161666640-82a66cf0-50b5-4696-b1d4-53ea2339d6ce.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>closed issues<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone1-deliverable/grade/jg836" target="_blank">Grading</a></td></tr></table>
