package business;

import java.util.List;

import javax.enterprise.context.RequestScoped;
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

@RequestScoped
@Path("/cards")
@Produces({"application/xml", "application/json" })
@Consumes({ "application/xml", "application/json" })
public class CardsRestService
{
	CardService service = new CardService();
    
    @POST
    @Path("/update")
    public void updateCards(Cards cards)
    {
        /*List<Card> cardList = cards.getCards();
        service.create(cardList);*/
    	Card[] cardArr = (Card[]) cards.getCards().toArray();
    	for (Card c : cardArr)
    	{
    		System.out.println(c.getName() + ", " + c.getHealth() + ", " + c.getManaCost());
    	}
    }
    
    @GET
	@Path("/get")
	@Produces(MediaType.APPLICATION_JSON)
	public ResponseDataModel getCards(@PathParam("title") String title, 
			@PathParam("artist") String artist, @PathParam("year") int year)
	{
		ResponseDataModel response = getAll();
		return response;
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