package business;

import java.util.List;

import javax.faces.bean.RequestScoped;
import javax.inject.Inject;
import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;

import beans.Order;

@RequestScoped
@Path("/orders")
@Produces({"application/xml", "application/json"})
@Consumes({"application/xml", "application/json"})
public class OrdersRestService
{
	@Inject
	OrdersBusinessInterface service;
	
	@GET
	@Path("/getjson")
	@Produces(MediaType.APPLICATION_JSON)
	public List<Order> getOrdersAsJson()
	{
		return service.getOrders();
	}
	
	@GET
	@Path("/getxml")
	@Produces(MediaType.APPLICATION_XML)
	public Order[] getOrdersAsXml()
	{
		List<Order> orders = service.getOrders();
		return orders.toArray(new Order[orders.size()]);
	}
}
