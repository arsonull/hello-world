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
            //add all cards to database
            boolean addCards = service.create(cards, conn);

            return addCards;
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
            //Make 2 users. One to call instance of loginDAO and return information back.
            int[] returnedList = service.findAll(conn);

            return returnedList;
        }catch(Exception e) {
            e.printStackTrace();
            //should not return null
            return null;
        }

    }
    
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
