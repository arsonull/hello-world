package dao;

import java.util.List;

import beans.Card;
import beans.Cards;

public interface CardDAOInterface<Card> {
	
	public boolean create(List<Card> cards,  java.sql.Connection conn);
	public int[] findAll(java.sql.Connection conn);
	public Cards getAll(java.sql.Connection conn);
}
