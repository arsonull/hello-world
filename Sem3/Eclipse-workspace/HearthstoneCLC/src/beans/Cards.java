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
	
	public void add(Card c)
	{
		cards.add(c);
	}
	public List<Card> getCards()
	{
		return cards;
	}
	public void print()
	{
		for (int i = 0; i < cards.size(); i++)
		{
			System.out.println(cards.get(i).getName() + ", " + cards.get(i).getHealth() + ", " + cards.get(i).getManaCost());
		}
	}
}
