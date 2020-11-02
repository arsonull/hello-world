package business;

import java.util.List;

import beans.Card;
import beans.Cards;

public interface CardBusinessInterface {
	//method used for adding all cards into database
	public boolean create(List<Card> cards);
	//method used for finding all cards from database to populate our graphs
	public int[] findAll();
    public Cards getAll();

}
