package beans;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;

@ManagedBean
@ViewScoped
public class Card {

	String name;
	int health;
	int manaCost;
	String cardType;
	
	//Default constructor
	public Card() {}
	
	public Card(String cardName, int health, int manaCost) {
		this.name = cardName;
		this.health = health;
		this.manaCost = manaCost;
	}

	//All getter and setter methods for class variables
	public String getName() {
		return name;
	}
	public void setName(String cardName) {
		this.name = cardName;
	}

	public int getHealth() {
		return health;
	}
	public void setHealth(int h)
	{
		this.health = h;
	}

	public int getManaCost() {
		return manaCost;
	}
	public void setManaCost(int manaCost) {
		this.manaCost = manaCost;
	}

}
