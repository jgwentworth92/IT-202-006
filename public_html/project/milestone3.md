<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> Jonathan Grossman(jg836)</td></tr>
<tr><td> <em>Generated: </em> 4/27/2022 2:22:04 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-3-shop-project/grade/jg836" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone3 branch </li>
<li>Create a new markdown file called milestone3.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone3.md link (from Milestone3) into the proposal.md file under each milestone3 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone3.md</li>
<li>Add/commit/push the changes to Milestone3</li>
<li>PR Milestone3 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 4</li>
<li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to purchase their cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://user-images.githubusercontent.com/95505687/165409753-e5038fe4-adb8-4f39-a282-93952778d481.png">https://user-images.githubusercontent.com/95505687/165409753-e5038fe4-adb8-4f39-a282-93952778d481.png</a> </td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165409807-d2d571cc-7991-45a8-bf4d-b3fed8d112a0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>order and orderItems table screenshots<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165409974-bffa6968-1dc8-4175-a4c9-90a7d5c19812.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>purchase form<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the purchase validation code (ensure your ucid and date are included) (Payment method, purchase value, shipping info)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165561034-004c44be-67f1-4ad9-a1ad-9b03bf72bd42.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot validation<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the UI (Price check, Quantity/Stock check)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165560352-d13acbd7-114a-4d75-9750-00022bd877ae.gif"/></td></tr>
<tr><td> <em>Caption:</em> <p>validation gif<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <p>First on the cart page when user click checkout, it will pull up<br>modal form. on submit it goes to order process page. I first concate<br>entered address details into one string. I save the entered total to a<br>variable and the payment type to a variable. I then do a select<br>statement to pull required data from product/cart table to do validation checks. <br>I then save the actual item price, current stock and actual total variables.<br>I check that against the data sent in, will set a has error<br>boolean to true if error found. I then start the PDO transaction, i<br>start a preprared PDO statement to insert into orders table and bind the<br>total cost, total, address and payment in the execute statement. The data is<br>inserted into the table and then using last insert id i save the<br>order id to a variable. I then use the order id variable to<br>insert data into the orderitems table. I also select the required data from<br>the user cart table for this insert. I then do an update on<br>product table and subtract the stock from the items entered by the user.<br> If no error have been found it will commit the changes ,<br>empty the cart and redirect to the order confirm page. If errors have<br>been found it will roll back everything and redirect back to the cart<br>page.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/78">https://github.com/jgwentworth92/IT-202-006/pull/78</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/80">https://github.com/jgwentworth92/IT-202-006/pull/80</a> </td></tr>
<tr><td> <em>Sub-Task 8: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project/order_process.php">https://jg836-prod.herokuapp.com/project/order_process.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165578980-d7946bf8-bffa-40f2-afb2-c1bb24e221ca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>order confirm<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <p>I send the order id in query param when the user is redirected<br>from the order process page. I then use the order id that was<br>passed in to select the required data from the order and orderitems tables.<br>I do a join to pull required data from both tables. I set<br>my subtotal to be quantity times the cost of the item. I then<br>use a for each loop of the results and display information for each<br>item in the order. at the top of the page i display the<br>total and payment type. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/81">https://github.com/jgwentworth92/IT-202-006/pull/81</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//orderconfirm.php?orderid=48">https://jg836-prod.herokuapp.com/project//orderconfirm.php?orderid=48</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165579858-e3666535-975b-4190-86c7-05dfecc0f859.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>order history<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165580814-be8384de-d09c-4117-a2aa-b4b883a3a642.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>order details<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <p>for a users order history,i take the user id and then select all<br>order that have the passed in user id. I then display the results<br>from the query in a table.For each of the rows in the table,<br>there is a link where the order id is passed in the query<br>params on the link so that the user can see the details of<br>the select order. I then use that  order id to select all<br>of the details from the orderitems table and display them in a table.<br>for each result aka item in the order,i add a link to the<br>item detail page of that item.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/issues/75">https://github.com/jgwentworth92/IT-202-006/issues/75</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//orderdetails.php?orderid=46">https://jg836-prod.herokuapp.com/project//orderdetails.php?orderid=46</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//OrderHistory.php">https://jg836-prod.herokuapp.com/project//OrderHistory.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165585605-7119d78a-b3f2-43fd-9c32-291df292c67a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>admin order history screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page) (from a user that's not the Store Owner)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165588603-4714ec41-35ab-45e1-a9f9-88b667f8a976.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>admin order detail screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <p>The only difference is that i select all orders from the order table<br>rather then order that match a user id on the user facing order<br>history table. In addition i also display the user id associated with the<br>order in this table. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/86">https://github.com/jgwentworth92/IT-202-006/pull/86</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/85">https://github.com/jgwentworth92/IT-202-006/pull/85</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//admin/admin_order_history.php">https://jg836-prod.herokuapp.com/project//admin/admin_order_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone3.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165593662-aa77a8f2-e99d-483d-808a-53f81b24c19f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>updated proposal<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/165594623-03d32e12-7e5e-459b-93f3-490345f5e283.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>closed issues kanban board screenshot<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-3-shop-project/grade/jg836" target="_blank">Grading</a></td></tr></table>