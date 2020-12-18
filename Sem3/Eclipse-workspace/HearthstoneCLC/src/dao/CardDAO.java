package dao;

import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.Stateless;
import javax.interceptor.Interceptors;

import beans.Card;
import beans.Cards;
import util.LoggingInterceptor;

@Interceptors(LoggingInterceptor.class) //allows for this class to be intercepted
@Stateless
@Local(CardDAOInterface.class)
public class CardDAO implements CardDAOInterface<Card>{

	@Override
	public boolean create(List<Card> cards, Connection conn) {
		System.out.println("Entered create() in CardDAO");
		int rs = 0;
		// Insert Cards received from IoT Application into database
		try {			
			Statement stmt1 = conn.createStatement();

			for (Card card : cards) {
				String sql1 = "INSERT INTO CARDS(NAME, HEALTH, MANACOST)VALUES('"+card.getName()+"', '"+card.getHealth()+"', '"+card.getManaCost()+"')";

		    	rs = stmt1.executeUpdate(sql1);

			}		
			stmt1.close();
			//if execute update incremented rs then the action was successful, return true
	    	if(rs == 1){		    	
		    	return true;
	    	}else {
	    		//otherwise exectueUpdate didn't work. Check logic above
	    		return false;
	    	}

		}catch(Exception e) {
    		e.printStackTrace();
    		return false;
	    }finally {
	    	if(conn != null) {
	    		try {
	    			conn.close();
	    		}catch(SQLException e){
	    			e.printStackTrace();
	    			return false;
	    		}
	    	}
	    }
		
	}

	@Override
	public int[] findAll(Connection conn) {
		System.out.println("Entered findAll() in CardDAO");
		// multiple SQL statements to retrieve number of cards for each mana cost variable: Mana=1 ~ 50 cards.....
		
		int[] cardList = new int[] {0,0,0};
		try {
			
			// Execute SQL Query and loop over result set
			String sql1 = "SELECT * FROM CARDS";
			Statement stmt1 = conn.createStatement();
			java.sql.ResultSet rs1 = stmt1.executeQuery(sql1);
			
			while(rs1.next()) {
				// Get the card
				Card card = new Card(rs1.getString("NAME"), rs1.getInt("HEALTH"), rs1.getInt("MANACOST")); 
				System.out.println("Card name: " + card.getName()+ " Mana: " + card.getManaCost());

				//switch case is used instead to increment number of cards found in each position			
				switch(card.getManaCost()) {
					case 1: 
						cardList[0]++;
						break;
					case 2: 
						cardList[1]++;
						break;
					case 3: 
						cardList[2]++;
						break;
				}
			}		
			
			rs1.close();
			stmt1.close();		
			
		}catch(Exception e) {
    		e.printStackTrace();
	    }finally {
	    	if(conn != null) {
	    		try {
	    			conn.close();
	    		}catch(SQLException e){
	    			e.printStackTrace();
	    		}
	    	}
	    }
		
		return cardList;
	}

	//this method is used to return all cards from DAO
	@Override
	public Cards getAll(Connection conn)
	{
		Cards cards = new Cards();
		
		String sql = "SELECT * FROM CARDS";
		try
		{
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			while(rs.next())
			{
				Card card = new Card(rs.getString("NAME"), rs.getInt("HEALTH"), rs.getInt("MANACOST"));
				cards.add(card);
			}
			//return a Cards objects which holds a list of card
			return cards;
		}
		catch (Exception e)
		{
			e.printStackTrace();
			return null;
		}
	}
	
}
