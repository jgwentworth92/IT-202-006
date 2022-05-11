<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Shop Project</td></tr>
<tr><td> <em>Student: </em> Jonathan Grossman(jg836)</td></tr>
<tr><td> <em>Generated: </em> 5/11/2022 4:14:54 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-4-shop-project/grade/jg836" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone4 branch </li>
<li>Create a new markdown file called milestone4.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone4.md link (from Milestone4) into the proposal.md file under each milestone4 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone4.md</li>
<li>Add/commit/push the changes to Milestone4</li>
<li>PR Milestone4 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes</li>
<li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167751439-213021bf-a638-4b6a-bc88-7f8eab05b307.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>new user column.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167751566-e8380c49-46d7-4c0a-88a5-6b6b90be2da4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>profile edit update screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167751686-c8da1532-9cf5-4054-b28f-9191ae425c81.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>profile view<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/97">https://github.com/jgwentworth92/IT-202-006/pull/97</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//profile.php?id=7">https://jg836-prod.herokuapp.com/project//profile.php?id=7</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>if not logged in, user will only be able to see reviews from<br>users when clicked from the item detail page. I check the is_visible column<br>in the table and see if it matches the user id for current<br>session, if it does then the edit button will appear. If a profile<br>is private, it will redirect users back to login and say they cannot<br>view private profiles.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to rate a product they purchased </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Ratings table with some data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167752733-a9ee1cb1-8525-46bb-9761-7fdd68a8181c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>rating table.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Product Details page with comments/ratings and the form to add another and the average rating</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167752888-399ae68f-f201-4380-812e-30083220bd30.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user reviews screenshot<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167753007-eeb2aba6-37bb-4f77-bd95-a31459174c31.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>review form screenshot<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167753148-e01f9135-8153-4a87-a6aa-0b9103e7ad5b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>average rating<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of the error message for a user trying to rate/comment that hasn't purchased the product</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167754036-f7eaf03b-bd98-41e2-a67b-913e2ef2415c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>hidden button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/98">https://github.com/jgwentworth92/IT-202-006/pull/98</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to a product details page with ratings/comments</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//item_details.php?id=12">https://jg836-prod.herokuapp.com/project//item_details.php?id=12</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic being adding comment/rating and validations</td></tr>
<tr><td> <em>Response:</em> <p>First I check that the user is logged on . If they are<br>logged on I query my orderitem table to pull id where the user<br>id and item id matches, if the results from query are greater 1<br>it means the user has bought the item. I then set my boolean<br>bought_Chk to true. if the boolean is true, my leave review button will<br>appear, if the boolean is false, the button will be hidden.  If<br>the validation checks are passed, the user can enter the review text and<br>select how many stars to give the item. I then insert the stars<br>as a int and text with the item id into the rating DB.<br>I SE echo to get the variable from the form after submiting. I<br>then query the rating table to get the total value of all rating<br>for that item and then divide that value by the count of results<br>from the query. then i update the average rating column of the item<br>with the newly calculate average rating value.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167756250-7b54bf3a-2d94-45b6-9a89-a0cd47448511.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>order history pagination screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/95">https://github.com/jgwentworth92/IT-202-006/pull/95</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//OrderHistory.php">https://jg836-prod.herokuapp.com/project//OrderHistory.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied (ensure the calculated total price is clearly visible)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167758426-31a5a861-a527-44cc-9796-605e99e6a798.gif"/></td></tr>
<tr><td> <em>Caption:</em> <p>filter gif<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167758946-025a35d6-08d2-4b01-a074-d4b136740881.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>admin order history pagination<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/96">https://github.com/jgwentworth92/IT-202-006/pull/96</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the store owner's purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//admin/admin_order_history.php">https://jg836-prod.herokuapp.com/project//admin/admin_order_history.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the total price is calculated based on the filtered/paginated results</td></tr>
<tr><td> <em>Response:</em> <p>the filter and pagination are first applied to my query param. then the<br>results are added to the result array. I then loop through that array<br>and with each loop pass i get the subtotal , i then add<br>value to my total each pass in the loop.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Add pagination to Shop and any other product lists not covered </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot(s) of the newly paginated pages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167922047-2d47e1f4-71ed-42aa-8ced-17128b1437e6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>shop pagination<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/94">https://github.com/jgwentworth92/IT-202-006/pull/94</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related pages</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//viewproducts.php?page=2">https://jg836-prod.herokuapp.com/project//viewproducts.php?page=2</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Store Owner will be able to see all products out of stock </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the out of stock results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167924593-57603f8f-a550-4d38-b3d9-55e2e4699e50.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>out of stock screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/99">https://github.com/jgwentworth92/IT-202-006/pull/99</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//admin/list_items.php?itemName=&myb=0&order=asc&vis=on">https://jg836-prod.herokuapp.com/project//admin/list_items.php?itemName=&myb=0&order=asc&vis=on</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain your approach to this view</td></tr>
<tr><td> <em>Response:</em> <p>I have a switch and if turned on, it will set a boolean<br>to true. if that boolean is true, i update my param to only<br>query where stock is &lt;=0. this will then display every item that is<br>out of stock.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User can sort products by average rating on the shop page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing the sort in effect</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167933472-6c55b019-b758-47d4-812c-cbb6055f4c11.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>average rating sort screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Products table (or your implementation/approach to average rating)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167933731-7dc7238f-5a29-40fe-8344-b76e8bfc3efd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>product db avg screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/98">https://github.com/jgwentworth92/IT-202-006/pull/98</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//viewproducts.php?itemName=&myb=0&col=avg_rating&order=desc">https://jg836-prod.herokuapp.com/project//viewproducts.php?itemName=&myb=0&col=avg_rating&order=desc</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you implemented the average rating recording logic and how it applies to this sort on sho</td></tr>
<tr><td> <em>Response:</em> <p>Whenever the user leave a review on item details, i always query the<br>rating table right after and add all the rating together for that item,<br>i then divide that by the count of the results to get the<br>average. i then then update the item in product db with the new<br>average value. I got to sort by average price on my shop page<br>by adding it as a option in my order by array. if selected<br>it will order query by the average rating int in my product database<br>for each item.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone4.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167940787-084bf671-b186-405f-9f19-0eb36d7556ca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>updated proposal screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/167940453-4bb3819f-4530-436b-b5d8-a4ff6d74e06d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>updated project board.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-4-shop-project/grade/jg836" target="_blank">Grading</a></td></tr></table>
