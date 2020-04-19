package data;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.LocalBean;
import javax.ejb.Stateless;

import beans.Order;

@Stateless
@Local(DataAccessInterface.class)
@LocalBean
public class OrderDataService implements DataAccessInterface<Order>
{
	public OrderDataService()
	{
	}
	
	public List<Order> findAll()
	{
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String user = "postgres";
		String pass = "root";
		
		String sql = "SELECT * FROM testapp.orders";
		List<Order> orders = new ArrayList<Order>();
		try
		{
			conn = DriverManager.getConnection(url, user, pass);
			
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			while (rs.next())
			{
				orders.add(new Order(rs.getString("ORDER_NO"), rs.getString("PRODUCT_NAME"), rs.getFloat("PRICE"), rs.getInt("QUANTITY")));
			}
			
			rs.close();
		}
		catch (SQLException e)
		{
			e.printStackTrace();
		}
		finally
		{
			
			if(conn != null)
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
	
	public boolean create(Order order)
	{
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String user = "postgres";
		String pass = "root";
		
		String sql = "INSERT INTO testapp.orders(ORDER_NO, PRODUCT_NAME, PRICE, QUANTITY) VALUES('000000070', 'Trap Card', 9000.1, 100";
		try
		{
			conn = DriverManager.getConnection(url, user, pass);
			
			Statement stmt = conn.createStatement();
			stmt.executeUpdate(sql);
		}
		catch (SQLException e)
		{
			e.printStackTrace();
		}
		finally
		{
			
			if(conn != null)
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
		return true;
	}
	
	public boolean update(Order order)
	{
		return true;
	}
	
	public boolean delete(Order order)
	{
		return true;
	}
}
