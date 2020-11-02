package dao;

import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.Stateless;

import beans.Card;
import beans.Cards;

@Stateless
@Local(CardDAOInterface.class)
public class CardDAO implements CardDAOInterface<Card>{

	@Override
	public boolean create(List<Card> cards, Connection conn) {
		System.out.println("Entered create() in CardDAO");

		// Insert Cards received from IoT Application into database
		try {			
			Statement stmt1 = conn.createStatement();

			for (Card card : cards) {
				String sql1 = String.format("INSERT INTO CARDS(NAME, HEALTH, MANACOST) VALUES('%s', '%s', %d)", card.getName(), card.getHealth(), card.getManaCost());
				
				stmt1.executeUpdate(sql1);
			}
			
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
		
		// Return OK
		return true;
		
	}

	@Override
	public int[] findAll(Connection conn) {
		System.out.println("Entered findAll() in CardDAO");
		// multiple SQL statements to retrieve number of cards for each mana cost variable: Mana=1 ~ 50 cards.....
		
		int[] cardList = new int[] {0,0,0,0,0,0,0,0,0,0};
		try {
			
			// Execute SQL Query and loop over result set
			String sql1 = "SELECT * FROM CARDS";
			Statement stmt1 = conn.createStatement();
			java.sql.ResultSet rs1 = stmt1.executeQuery(sql1);
			
			while(rs1.next()) {
				// Get the card
				Card card = new Card(rs1.getString("CARDNAME"), rs1.getInt("HEALTH"), rs1.getInt("MANACOST")); 
				
				//switch case is used instead of writing 10 different SQL statements			
				switch(card.getManaCost()) {
					case 0: 
						cardList[0]++;
						break;
					case 1: 
						cardList[1]++;
						break;
					case 2: 
						cardList[2]++;
						break;
					case 3: 
						cardList[3]++;
						break;
					case 4: 
						cardList[4]++;
						break;
					case 5: 
						cardList[5]++;
						break;						
					case 6: 
						cardList[6]++;
						break;
					case 7: 
						cardList[7]++;
						break;
					case 8: 
						cardList[8]++;
						break;
					case 9: 
						cardList[9]++;
						break;
					case 10: 
						cardList[10]++;
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
				Card card = new Card(rs.getString("CARDNAME"), rs.getInt("HEALTH"), rs.getInt("MANACOST"));
				cards.add(card);
			}
			return cards;
		}
		catch (Exception e)
		{
			e.printStackTrace();
			return null;
		}
	}
	
}
