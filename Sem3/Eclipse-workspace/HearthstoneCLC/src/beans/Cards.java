package beans;

import java.util.ArrayList;
import java.util.List;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;

@ManagedBean
@ViewScoped
public class Cards{
	List<Card> cards;
	int[] manaList;

	public Cards(){
		cards = new ArrayList<Card>();
		manaList = new int[] {0,0,0,0,0,0,0,0,0,0};
	}
	
	public Cards(List<Card> cards){
		this.cards = cards;
		manaList = new int[] {0,0,0,0,0,0,0,0,0,0};
	}
	
	public void add(Card c){
		cards.add(c);
	}
	
	public List<Card> getCards(){
		return cards;
	}
	
	public int[] getCardList() {
		return manaList;
	}
	public void setCardList(int[] cardList) {
		this.manaList = cardList;
	}	
	
	public void print(){
		for (int i = 0; i < cards.size(); i++){
			System.out.println(cards.get(i).getName() + ", " + cards.get(i).getHealth() + ", " + cards.get(i).getManaCost());
		}
	}
	public String printInt(Long i){
        int I = Math.toIntExact(i);
        String cardInt = "" + manaList[I]+ "";
        return cardInt;
    }
}
