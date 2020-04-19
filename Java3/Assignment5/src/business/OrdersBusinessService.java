package business;

import java.util.ArrayList;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.LocalBean;
import javax.ejb.Stateless;
import javax.enterprise.inject.Alternative;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;

import beans.Order;

@Stateless
@Local(OrdersBusinessInterface.class)
@LocalBean
@Alternative
public class OrdersBusinessService implements OrdersBusinessInterface
{
	List<Order> orders = new ArrayList<Order>();
	
	public OrdersBusinessService() 
	{
		/*orders.add(new Order("0001","Legit Product", (float)12.53, 10));
		orders.add(new Order("0002","Also Legit Product", (float)17.20, 15));
		orders.add(new Order("0003","Roblox GF", (float)299.99, 3));
		orders.add(new Order("0004","Club Penguin Agent", (float)139.99, 7));
		orders.add(new Order("0005","Habbo Hotel Pool", (float)12.75, 8));
		orders.add(new Order("0006","Anti-pool Aids", (float)24.99, 1));
		orders.add(new Order("0007","Male Enhancement", (float)11.99, 30));
		orders.add(new Order("0008","White Male Self-Loathing", (float)69.42, 1337));
		orders.add(new Order("0009","Emmy trophy", (float)0.99, 100));
		orders.add(new Order("0010","Oscar Award", (float)1.99, 100));*/
	}
	
	public void test()
	{
		System.out.println("THIS IS FROM ORDERS BUSINESS SERVICE TEST");
	}

	public List<Order> getOrders() {
		return orders;
	}

	public void setOrders(List<Order> orders) {
		this.orders = orders;
	}
	
	
}
