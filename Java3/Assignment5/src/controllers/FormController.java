package controllers;

import beans.Order;
import beans.Orders;
import beans.User;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;

@ManagedBean
@ViewScoped
public class FormController {
	//User user;
	
	public String onSubmit(User user) {
		//Forward to Test Response View along with the User Managed Bean
		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("user", user);
		insertOrder();
		
		List<Order> orderList = getAllOrders();
		Orders orders = new Orders();
		orders.setOrders(orderList);
		
		
		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("orders", orders);
		
		return "TestResponse.xhtml";
	}
	
	private List<Order> getAllOrders()
	{
		//setting up a connection and the planned sql statement
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String user = "postgres";
		String pass = "root";
		String sql = "SELECT * FROM testapp.orders";
		List<Order> orders = new ArrayList<Order>();
		try
		{ //trying connection
			conn = DriverManager.getConnection(url, user, pass);
			
			if (conn != null)
			{
				System.out.print("Connection succesful");
			}
			//after a succesfull connection, creates a statement object and a resultset that is attained from executing the sql statement.
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			while(rs.next())
			{//adds all the orders to the list
				orders.add(new Order(rs.getString("ORDER_NO"),
						rs.getString("PRODUCT_NAME"),
						rs.getFloat("PRICE"),
						rs.getInt("QUANTITY")));
			}
			
			rs.close();
		}
		//catch a sql exception error, and prints out the stack trace to give information of the error
		catch (SQLException e)
		{
			e.printStackTrace();
		}
		finally
		{
			if (conn != null)
			{
				try
				{
					//closes the connection if there is one.
					conn.close();
				}
				catch (SQLException e)
				{
					e.printStackTrace();
				}
			}
		}
		//returns the list of all orders
		return orders;
	}
	private void insertOrder()
	{
		//initializes a new connection and information regarding the connection along with a sql statement.
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String user = "postgres";
		String pass = "root";
		String sql = "INSERT INTO testapp.orders(ORDER_NO, PRODUCT_NAME, PRICE, QUANTITY) VALUES('000002321', 'This is new', 25.00, 100)";
		try
		{
			//tries setting the connection to an actual connect rather than a null connection.
			conn = DriverManager.getConnection(url, user, pass);
			
			if (conn != null)
			{
				System.out.print("Connection succesful");
			}
			//create a statement and execute the sql statement through the statement object.
			Statement stmt = conn.createStatement();
			stmt.executeUpdate(sql);
		}
		catch (SQLException e)
		{
			e.printStackTrace();
		}
		finally
		{
			if (conn != null)
			{
				try
				{
					conn.close();
				}
				catch (SQLException e)
				{
					e.printStackTrace();
				}
			}
		}
	}
	
}
