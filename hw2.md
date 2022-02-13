<table><tr><td> <em>Assignment: </em> M2 PHP-HW</td></tr>
<tr><td> <em>Student: </em> Jonathan Grossman(jg836)</td></tr>
<tr><td> <em>Generated: </em> 2/13/2022 12:41:47 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/m2-php-hw/grade/jg836" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <p>Make sure you have the dev/prod branches created before starting this assignment.</p>
<p>Setup steps:</p>
<ol>
<li><code>git checkout dev</code> </li>
<li><code>git pull origin dev</code></li>
<li><code>git checkout -b M2-PHP-HW</code></li>
</ol>
<p>You&#39;ll have 3 problems to save for this assignment.</p>
<p>Each problem you&#39;re given a template <strong>Do not edit anything in the template except where the comments tell you to</strong>.</p>
<p>The templates are done in such a way to make it easier to capture the output in a screenshot (if it&#39;s still not able to fit well, you can zoom out in your browser).</p>
<p>You&#39;ll copy each template into their own separate .php files, immediately git add, git commit these files (you can do it together) so we can capture the difference/changes between the templates and your additions. This part is required for full credit.</p>
<p>HW steps:</p>
<ol>
<li>Open VS Code at the root of your repository folder (you should see the Procfile and all from the Heroku setup)</li>
<li>In VS Code create a new folder/directory in public_html called M2</li>
<li>Create 3 new files in this new M2 folder (problem1.php, problem2.php, problem3.php)</li>
<li>Paste each template into their respective files</li>
<li><code>git add .</code></li>
<li><code>git commit -m &quot;adding template baselines</code></li>
<li>Do the related work (you may do steps 8 and 9 as often as needed or you can do it all at once at the end)</li>
<li><code>git add .</code></li>
<li><code>git commit -m &quot;completed hw&quot;</code></li>
<li>When you&#39;re done push the branch<ol>
<li><code>git push origin M2-PHP-HW</code></li>
</ol>
</li>
<li>Go to heroku dev, and manually deploy the M2-PHP-HW branch</li>
<li>After it deploys go to <a href="https://ucid-dev.herokuapp.com/M2/problem1.php">https://ucid-dev.herokuapp.com/M2/problem1.php</a> (replace ucid with your ucid if you followed the setup instructions)</li>
<li>Update the URL to check that each problem file displays properly</li>
<li>Create the Pull Request with <strong>dev</strong> as base and <strong>M2-PHP-HW</strong> as compare</li>
<li>Create a new file in the M2 folder in VS Code called m2_submission.md</li>
<li>Fill out the below deliverable items, save the submission, and copy to markdown<ol>
<li>For this assignment you may get screenshots from your heroku dev instance, you do not need to move it to prod then come back and update it</li>
</ol>
</li>
<li>Paste the markdown into the m2_submission.md</li>
<li>add/commit/push the md file<ol>
<li><code>git add m2_submission.md</code></li>
<li><code>git commit -m &quot;adding submission file&quot;</code></li>
<li><code>git push origin M2-PHP-HW</code></li>
</ol>
</li>
<li>Merge the pull request from step 14</li>
<li>Create a new pull request with prod as base and dev as compare</li>
<li>Immediately create/merge/confirm, this is just to deploy it to prod and you don&#39;t need to adjust anything during this step</li>
<li>On your local machine sync the changes<ol>
<li><code>git checkout dev</code></li>
<li><code>git pull origin dev</code></li>
</ol>
</li>
<li>Submit the link to the m2_submission.md file from the prod branch to Canvas</li>
</ol>
<p><strong>Template Files</strong>
You can find all 3 template files in this gist: <a href="https://gist.github.com/MattToegel/48b48377eaa1937c886b7840c449750a">https://gist.github.com/MattToegel/48b48377eaa1937c886b7840c449750a</a> </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Problem 1 - Only output Odd values of the Array under "Odds output" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Clearly screenshot the output of Problem 1 showing the data and the code output in the proper part of the page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/153767134-cc84a62e-e41c-4a74-8b1a-2d43911b3fe2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>problem 1<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Describe how you solved the problem</td></tr>
<tr><td> <em>Response:</em> <p>I used a for loop to loop through the array. then if the<br>current value modules dividing by 2 was not equal to 0, then I<br>echo the number because it was odd.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Problem 2 - Only output the sum/total of the array values by assigning it to the $total variable (the number must end in 2 decimal places, if it ends in 1 it must have a 0 at the end) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Clearly screenshot the output of Problem 2 showing the data and the code output in the proper part of the page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/153767350-3bf1238b-b1c8-4075-8a26-92a6b3ace6c6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>problem 2<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Describe how you solved the problem</td></tr>
<tr><td> <em>Response:</em> <p>I used the built in array sum function to add the array values<br>together and then used the round function to set the decimal point to<br>two spaces<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Problem 3 - Output the given values as positive under the "Positive Output" message (the data otherwise shouldn't change) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Clearly screenshot the output of Problem 3 showing the data and the code output in the proper part of the page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/153767452-97efa830-2974-4932-bb07-4d369cbe87ce.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>problem 3<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Describe how you solved the problem</td></tr>
<tr><td> <em>Response:</em> <p>I used a foreach for loop to go through the array and then<br>used  the absolute value function in an echo statement at each index<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Misc Items </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add the prod URL for problem1.php (remember you can assume this based on how the domain gets built (i.e., ucid-prod.herokuapp.com/...)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/m2/problem1.php">https://jg836-prod.herokuapp.com/m2/problem1.php</a> </td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the prod URL for problem2.php (remember you can assume this based on how the domain gets built (i.e., ucid-prod.herokuapp.com/...)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/m2/problem2.php">https://jg836-prod.herokuapp.com/m2/problem2.php</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the prod URL for problem3.php (remember you can assume this based on how the domain gets built (i.e., ucid-prod.herokuapp.com/...)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/m2/problem3.php">https://jg836-prod.herokuapp.com/m2/problem3.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Pull Request URL for M2-PHP-HW to dev</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/3">https://github.com/jgwentworth92/IT-202-006/pull/3</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Talk about what you learned, any issues you had, how you resolve them</td></tr>
<tr><td> <em>Response:</em> <p>no issues<br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/m2-php-hw/grade/jg836" target="_blank">Grading</a></td></tr></table>
