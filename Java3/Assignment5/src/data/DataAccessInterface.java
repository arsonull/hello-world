package data;

import java.util.List;

import beans.Order;

public interface DataAccessInterface <Order>
{
	public List<Order> findAll();
	
	public boolean create(Order order);
	public boolean update(Order order);
	public boolean delete(Order order);
}
