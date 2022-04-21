<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Jonathan Grossman(jg836)</td></tr>
<tr><td> <em>Generated: </em> 4/18/2022 11:43:24 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-2-shop-project/grade/jg836" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone2 branch </li>
<li>Create a new markdown file called milestone2.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone2.md link (from Milestone2) into the proposal.md file under each milestone2 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone2.md</li>
<li>Add/commit/push the changes to Milestone2</li>
<li>PR Milestone2 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 3</li>
<li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on github and everywhere else.
Images are only accepted from dev or prod, not local host.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163661766-ba0a93db-ea44-474b-b76f-76825d92d9f2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>admin create page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163661791-00f86a9d-e058-4523-8cb2-bd17d9f4cc46.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>product table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>first the getcolumn()  functions retrieve the different of columns of the table<br>it is given as an argument. Then the for each loop creates a<br>input on the form for each column it retrieved from the table. The<br>echo_input_map() function each insures that each field on the form has the correct<br>data type. After the form is submitted, the save_Date() function is called to<br>insert the new item into the product db.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/49">https://github.com/jgwentworth92/IT-202-006/pull/49</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//admin/add_item.php">https://jg836-prod.herokuapp.com/project//admin/add_item.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163662282-34a27d4b-a066-41ed-ac22-f8ff4cf802f2.png""/></td></tr>
<tr><td> <em>Caption:</em> <p>shop page not logged in<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163662381-5d6982e2-304d-462c-b824-27ecc7b0b380.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filter for shop<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code (ensure ucid and date is shown)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163662476-1fc4e37f-44df-4892-9f2e-2182b6dd51aa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>sort code part 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163662518-5b6f2c1c-9d2d-4759-8915-1d75ce05d121.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>sort code part  2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163662566-3cb9ac03-4560-4c7d-b031-aa816d6964bc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>sort code part 3<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>There is a base query that pulls all of the information to show<br>for each item like name, image, category, etc. The base query is then<br>dynamically updated with other query conditions depending on what filters the user chooses<br>to use.  There is a for each loop that runs and then<br>binds the required variables for each param that has been passed in. Then<br>I combine my base query with my dynamic query and this is what<br>allows for my filter to be additive and work on top of each<br>other.  <br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/53">https://github.com/jgwentworth92/IT-202-006/pull/53</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/58">https://github.com/jgwentworth92/IT-202-006/pull/58</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//viewproducts.php">https://jg836-prod.herokuapp.com/project//viewproducts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163744601-9ee3f89b-daaa-4f50-b68f-062dd5b43030.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>admin shop page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <p>user types into the search bar which is a form. the value is<br>then saved to a variable using safe echo. I then tell query to<br>pull stuff where name = what the user typed in and the results<br>are saved to an array. I then use a for each loop with<br>the result array to display each results in a table.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/49">https://github.com/jgwentworth92/IT-202-006/pull/49</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//admin/list_items.php">https://jg836-prod.herokuapp.com/project//admin/list_items.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a sceenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163745493-a9b0b009-dd09-4223-bd29-e9deff9490a0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>edit on shop page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a sceenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163745917-cae75788-7c2a-48d7-a59c-1881d4d78223.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>product detail edit button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a sceenshot showing the edit button visible to the Admin on the Admin Product List Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163745979-133aea26-7163-4dc4-81d2-c8de4030953a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>admin edit product list<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163747033-1ed6e7eb-3216-4806-a919-ab8975cea7f0.gif"/></td></tr>
<tr><td> <em>Caption:</em> <p>before/after product edit<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>I use get url function to have it appear as link on the<br>required page if an admin is logged. I then pass the item id<br>in get url function. The edit function will then take the item id<br> and pull all results from the product database related to that id.<br>I then use the get_column function to get each column from the product<br>table and then use  the input map function to make each entry<br>has the correct data type. I use a for each loop to display<br>the result from the array in a form. When the user clicks submit,<br>I use isset to make sure submit has been pressed and then use<br>the update_Data function to update the products with the changes made by the<br>user.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/50">https://github.com/jgwentworth92/IT-202-006/pull/50</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/56">https://github.com/jgwentworth92/IT-202-006/pull/56</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//admin/edit_item.php?id=3">https://jg836-prod.herokuapp.com/project//admin/edit_item.php?id=3</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163745493-a9b0b009-dd09-4223-bd29-e9deff9490a0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>item detail button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163745917-cae75788-7c2a-48d7-a59c-1881d4d78223.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>detail page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>I use the get_url() function and then pass item ID when the user<br>clicks the link. I then use that item id to query the data<br>to display the required details of the items. I then use a for<br>each loop and then safe echo with the keys like category ,image, etc<br>to display the details of the item on a card. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/62">https://github.com/jgwentworth92/IT-202-006/pull/62</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//item_details.php?id=3">https://jg836-prod.herokuapp.com/project//item_details.php?id=3</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163747459-3a31f33a-ffc0-467d-9f5c-5d6513715e65.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>cart success<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163744755-694db073-76d1-4252-b4eb-5b948fb9ea39.gif"/></td></tr>
<tr><td> <em>Caption:</em> <p>cart error message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td> <em>Response:</em> <p><a href="https://user-images.githubusercontent.com/95505687/163745002-635a9dce-5050-4719-afdd-01919e3913b4.png">https://user-images.githubusercontent.com/95505687/163745002-635a9dce-5050-4719-afdd-01919e3913b4.png</a><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>1 cart per user.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>The user would input the quantity they want to add to the cart<br>and then click the add to cart button on item detail page or<br>shop detail page. I have an isset on both pages to check if<br>the buttons are clicked, I then pass item_id and quantity to my add<br>to cart function on each page. I make sure that value is greater<br>then 0 on my item detail/shop page and then if it doesn&#39;t have<br>any errors it will insert a new entry into the cart table with<br>the quantity and  item id. I also get the user id and<br>use that in my insert query too.  If the item is already<br>in the users&#39; cart, it will simply add the quantity entered to the<br>existing quantity for that item.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/57">https://github.com/jgwentworth92/IT-202-006/pull/57</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/61">https://github.com/jgwentworth92/IT-202-006/pull/61</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View (show subtotal, total, and the link to Product Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163735965-f7cbe383-6925-42ed-99f5-778d066be65a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>product detail page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <p>I first do a select to pull the the required data from my<br>cart table where user_id matches the logged in users id. In that query<br>i also use a join so that i can pull data from the<br>product table. I  then set subtotal for each to be quantity from<br>the cart table multiplied by the cost of the item from the product<br>table.I then use a for each loop and safe each to display the<br>results from a query in dynamically generated cards for each result.  then<br>to calculate total price of the cart, i do another for each result<br>loop where I safe echo the item at x index with the key<br>subtotal and then each loop pass it will add it to my total<br>variable. After the loop finishes, it will display on the page . <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/59">https://github.com/jgwentworth92/IT-202-006/pull/59</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jg836-prod.herokuapp.com/project//cart.php">https://jg836-prod.herokuapp.com/project//cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163737876-566ea2f5-7b7a-40ad-abc1-18a6ea7a4624.gif"/></td></tr>
<tr><td> <em>Caption:</em> <p>before/after quantity update<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163737967-9a00426b-c2ea-41b1-9742-ebb28e062814.gif"/></td></tr>
<tr><td> <em>Caption:</em> <p>before and after gif<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163738100-cbc83d70-87b0-430a-838d-5c21067ffbb0.gif"/></td></tr>
<tr><td> <em>Caption:</em> <p>negative number handling <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <p>I use isset to first check if the button has been clicked, it<br>then passes the item_id  and quantity to the function. If the quantity<br>is 0, i have statement that will then set  my error boolean<br>to true and delete the entry instead, essentially using item id and user<br>id to find the correct item to delete. If the value is negative,<br>it will also proc an if statement that will flash an error message<br>and set my error boolean to true to stop the code. If their<br>are no errors, it will take user id, item id and quantity and<br>use that data to insert it in cart table adding it to the<br>current quantity of the entry in the table. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/59">https://github.com/jgwentworth92/IT-202-006/pull/59</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/jgwentworth92/IT-202-006/pull/61">https://github.com/jgwentworth92/IT-202-006/pull/61</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163735965-f7cbe383-6925-42ed-99f5-778d066be65a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163736000-48161a2e-0a3b-400c-b937-93a55bf6e6f4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163736135-c792ea87-2396-4375-8dbb-15d21f6029fe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163736281-7778acd3-5f74-434f-9ade-80e2c54e8f72.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <p>I have a button to delete a single item that mapped to each<br>item results on my cart page. If the user clicks the button, there<br>is an ISSET that checks to see if it is clicked . The<br>function will then use safe echo to get the line id of item<br>and use that id to find the item in a delete query, it<br>then flash&#39;s a success message. The delete all function work get url ,<br>the user clicks the link and then i do a query where i<br>delete everything matching the user id. it then flashes a success message and<br>redirects back to the cart page. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <em>Response:</em> <p><a href="https://github.com/jgwentworth92/IT-202-006/pull/63">https://github.com/jgwentworth92/IT-202-006/pull/63</a><br><a href="https://github.com/jgwentworth92/IT-202-006/pull/60">https://github.com/jgwentworth92/IT-202-006/pull/60</a><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163916371-6d93930a-0362-432f-bf62-b26bf78e3deb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>updated milestone 2 proposal<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/95505687/163732962-167f61ff-5ee8-4a93-97fc-132c0fd5ddc7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>completed issues.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-2-shop-project/grade/jg836" target="_blank">Grading</a></td></tr></table>