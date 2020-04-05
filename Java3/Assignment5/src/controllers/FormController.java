package controllers;

import beans.Order;
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
		
		getAllOrders();
		
		return "TestResponse.xhtml";
	}
	
	private List<Order> getAllOrders()
	{
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String user = "root";
		String pass = "pass";
		String sql = "SELECT * FROM testapp.Orders";
		List<Order> orders = new ArrayList<Order>();
		try
		{
			conn = DriverManager.getConnection(url, user, pass);
			
			if (conn != null)
			{
				System.out.print("Connection succesful");
			}
			
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			while(rs.next())
			{
				orders.add(new Order(rs.getString("ORDER_NO"),
						rs.getString("PRODUCT_NAME"),
						rs.getFloat("PRICE"),
						rs.getInt("QUANTITY")));
			}
			
			rs.close();
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
		return orders;
	}
	
}
