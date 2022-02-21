<table><tr><td> <em>Assignment: </em> Init DB Setup</td></tr>
<tr><td> <em>Student: </em> Jonathan Grossman(jg836)</td></tr>
<tr><td> <em>Generated: </em> 2/20/2022 6:17:32 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/init-db-setup/grade/jg836" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <p>Reminder: Make sure you start in dev and it&#39;s up to date</p>
<ul>
<li>git checkout dev</li>
<li>git pull origin dev</li>
<li>git checkout -b ProjectSetup</li>
</ul>
<p>Steps:</p>
<ol>
<li>Create a new folder in public_html called Project</li>
<li>create a new folder in Project called sql</li>
<li>Create a new file in sql called init_db.php</li>
<li>Paste the content from <a href="https://gist.github.com/MattToegel/6a8310e3ac19fe505870e5ebfa8cf4ea">https://gist.github.com/MattToegel/6a8310e3ac19fe505870e5ebfa8cf4ea</a><ul>
<li>You will get errors if this is not in the proper location</li>
</ul>
</li>
<li>Create another file in sql called 001_create_table_users.sql</li>
<li>Paste the content from <a href="https://gist.github.com/MattToegel/f3b39da97fba38bd04fc7073ad0a627e">https://gist.github.com/MattToegel/f3b39da97fba38bd04fc7073ad0a627e</a> </li>
<li>Add/commit/push these to the new branch (if you haven&#39;t yet)</li>
<li>Create the pull request on github but do not complete it yet</li>
<li>Create a new folder in public_html called M4</li>
<li>Create a new file in the M4 folder called m4_submission.md</li>
<li>Fill out the below deliverables and paste the generated markdown in the file</li>
<li>Add/commit/push the new changes</li>
<li>Verify all of the files appear as expected in the ProjectSetup branch<ol>
<li>M4/m4_submission.md</li>
<li>Project/sql/init_db.php</li>
<li>Project/sql/001_create_table_users.sql</li>
</ol>
</li>
<li>Complete the merge/pull request from step 8</li>
<li>Create a new pull request from dev to prod and complete it</li>
<li>Go back to your local repo</li>
<li><code>git checkout dev</code></li>
<li><code>git pull origin dev</code></li>
<li>On github, navigate to the prod branch</li>
<li>Go to the M4 folder</li>
<li>Click the m4_submission.md</li>
<li>Paste that url to Canvas as the submission</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Verify Proper Setup </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Visit the init_db.php file in the browser on heroku dev and screenshot the working output (If it says blocked this is still valid)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/154868439-1776e850-306a-496b-af63-fb6ebdbf3478.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>init_db<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Go to your MySQL VS Code extension, click the new table that was generated, screenshot the table shown</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/154868493-947838ea-3b52-4bde-8a94-e4091bf16389.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>tables<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly talk about something you learned (from the readings is preferred over the slides/class)</td></tr>
<tr><td> <em>Response:</em> <p>I learned that when using sql databases you use select to select a<br>column of table. You use  the from keyword to specify what table<br>you are getting  and where to specify the condition if any when<br>retrieving data from a database. I learned that doing select * table table<br>will select everything from a table.  instead of the * you could<br>specify a specific column name and the select would pull everything with that<br>column name.  You could then do select distinct if you only wanted<br>to select unique entries and not pull redundant repeat data. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Talk about any issues or difficulties you had in any of the processes and how you resolved them. If you didn't have issues this HW mentions a recently resolved issue that wasn't discussed before. Otherwise, just mention "no issues"</td></tr>
<tr><td> <em>Response:</em> <p>no issues<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link (ProjectSetup to Dev)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/5">https://github.com/jgwentworth92/IT-202-006/pull/5</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Paste the direct link from heroku prod to the init_db.php file (i.e., https://mt85-prod.herokuapp.com/Project/sql/init_db.php)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project/sql/init_db.php">https://jg836-prod.herokuapp.com/project/sql/init_db.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/init-db-setup/grade/jg836" target="_blank">Grading</a></td></tr></table>