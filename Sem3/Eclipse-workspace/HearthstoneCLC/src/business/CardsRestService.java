package business;

import java.util.List;

import javax.enterprise.context.RequestScoped;
import javax.inject.Inject;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import beans.Card;
import beans.Cards;
import beans.ResponseDataModel;

@Produces({"application/xml", "application/json" })
@Consumes({ "application/xml", "application/json" })
@RequestScoped
@Path("/cards")
public class CardsRestService
{
	@Inject
	CardBusinessInterface service;
    
    @POST
    @Path("/update")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces("text/plain")
    public ResponseDataModel updateCards(Cards cards)
    {
    	//JSONArray arr = new JSONArray(array);
    	System.out.println("Post read");
        /*List<Card> cardList = cards.getCards();
        service.create(cardList);*/
    	System.out.println(cards.getCards());
    	try
    	{
    		if (service.create(cards.getCards()))
    		{
    			ResponseDataModel response = new ResponseDataModel(0, "Succesful update", cards);
            	return response;
    		}
    		else
    		{
    			ResponseDataModel response = new ResponseDataModel(-1, "Update was not succesful", cards);
            	return response;
    		}
    	}
    	catch (Exception e)
    	{
    		ResponseDataModel response = new ResponseDataModel(-2, "Critical failure", cards);
        	return response;
    	}
    }
    
    @GET
	@Path("/get")
	@Produces(MediaType.APPLICATION_JSON)
    //@Produces("text/plain")
	public ResponseDataModel getCards()
	{
		ResponseDataModel response = getAll();
		return response;
    	//return "Hello from getCards";
	}
    
    private ResponseDataModel getAll()
	{
		Cards cards = new Cards();
		try
		{
			cards = service.getAll();
			
			ResponseDataModel response = new ResponseDataModel(0, "", cards);
			return response;
		}
		catch (Exception e2)
		{
			ResponseDataModel response = new ResponseDataModel(-2, "System Exception", new Cards());
			
			return response;
		}
	}
}