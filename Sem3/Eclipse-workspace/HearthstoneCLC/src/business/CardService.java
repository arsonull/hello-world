package business;

import java.sql.DriverManager;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.Stateless;
import javax.inject.Inject;

import dao.CardDAOInterface;
import beans.Card;
import beans.Cards;

@Stateless
@Local(CardBusinessInterface.class)
public class CardService implements CardBusinessInterface{
	
	@Inject
	CardDAOInterface<Card> service;

	@Override
    public boolean create(List<Card> cards) {
        // take the received card list and pass it to the DAO 
        System.out.println("Entered create() in CardService");

        java.sql.Connection conn = null;
        String url = "jdbc:mysql://localhost:3306/HearthstoneAPI";
        String username = "root";
        String password = "root";

        //try the connection
        try {
            //Connect to database
            conn = DriverManager.getConnection(url, username, password);    
	    	//boolean that returns whether the addCards process was a success or not
	    	boolean addCards = service.create(cards, conn);

			conn.close();
			
	    	if(addCards == true){	
                System.out.println("returning with true");
		    	return true;
	    	}else {
                System.out.println("returning with false");
	    		return false;
	    	}

        }catch(Exception e) {
            e.printStackTrace();
            //should not return false
            return false;
        }
    }

    @Override
    public int[] findAll() {
        // request findAllCards method from DAO to return an int[] about # of cards for each mana cost
        System.out.println("Entered findAll() in CardService");

        java.sql.Connection conn = null;
        String url = "jdbc:mysql://localhost:3306/HearthstoneAPI";
        String username = "root";
        String password = "root";

        //try the connection
        try {
            //Connect to database
            conn = DriverManager.getConnection(url, username, password);
            //returnedList will contain graph information about # of cards and mana cost
            int[] returnedList = service.findAll(conn);

            return returnedList;
        }catch(Exception e) {
            e.printStackTrace();
            //should not return null
            return null;
        }

    }
    
    @Override
    public Cards getAll()
    {
    	java.sql.Connection conn = null;
        String url = "jdbc:mysql://localhost:3306/HearthstoneAPI";
        String username = "root";
        String password = "root";
        
        try
        {
        	conn = DriverManager.getConnection(url, username, password);
        	
        	Cards cards = service.getAll(conn);
        	return cards;
        }
        catch (Exception e)
        {
        	e.printStackTrace();
        	return null;
        }
    }
	
}
