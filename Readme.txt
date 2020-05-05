Team:

Nishanth Bysani - 1001774644
Sampada Grover -  1001768624

Project Information:

Website for a restaurant called "Ibras"

Pages:

Registro:
The customer or admin must register to the website using the Registration form by providing required information. Each of the fields are validated using HTML5, Javascript and PHP validation. In case of data not similar to the requirements, the user is requested to re-enter the data.

Once a user registers, based on the usertype, the user will be redirected to "/adminhome" if he is an admin or if he is a customer, he will be redirected to "/customerhome".

Iniciar Session:

Existing customer or admin logins to their respective dashboards using their email address and password. HTML5, Javascript and PHP validations are performed to cross check the information.

Admin Pages:

1. /adminhome - This page is the dashboard for the admin with information regarding the monthly & daily income and orders.
2. /adminmenu - All the menu items available in the 'menu' table are retrieved and displayed. Also new menu items can be added to the list along with deletion.
3. /adminenquiry - Gives a list of enquiries made by users on the website. Gives a filter to check 'pending' or 'completed' rows.
4. /admininventory -  Retrieves a list of all available items in the inventory.
5. /adminprofile - retrieves the customer profile and can be updated as required.
6. /admintimesheet - retrieves the staffs clock in and total clocked time.
7. /adminreview - retrieves all the feedbacks provided by the customer for the order made.
8. /adminusers- list of all current users in the ibras database.

Customer Pages:

1./customerhome - This page displays the list of all the menu items that the customer can order. The customer can add items to the cart by clicking 'add to cart'.
2. /customercart - This page displays the list of all the cart items that the customer selected in the previous page. The customer can also remove the items from the cart. Customer clicks - 'Order' button to make the order.
3. /customerorders - This page displays the list of all the previous orders or order history of the current customer.
4. /customerfeedback - This page provides the customer the option to provide feedback to past orders.
5. /customerprofile - Customer can update his profile information from here.


Additional content:
1. Used chartjs for displaying the monthly and daily orders,income and profits to the admin.

SQL Script:
The project includes the SQL script file named 'ibrasproject5.sql'
	.env =>
			DB_DATABASE=ibrasproject5
			DB_USERNAME=root
			DB_PASSWORD=