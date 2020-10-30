package beans;

import java.util.ArrayList;
import java.util.List;

public class Cards
{
	List<Card> cards;
	
	public Cards()
	{
		cards = new ArrayList<Card>();
	}
	public Cards(List<Card> cards)
	{
		this.cards = cards;
	}
	
	public void addCard(Card c)
	{
		cards.add(c);
	}
	public List<Card> getCards()
	{
		return cards;
	}
}
