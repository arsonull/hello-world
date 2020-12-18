package controllers;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;
import javax.interceptor.Interceptors;

import beans.Cards;
import business.CardBusinessInterface;
import util.LoggingInterceptor;

@Interceptors(LoggingInterceptor.class) //allows for this class to be intercepted
@ManagedBean
@ViewScoped
public class GraphController {
	
    @Inject
    CardBusinessInterface cardService;
    
    //method used to load all data
    public String loadCardData() {
    	System.out.println("Entered loadCardData() in GraphController");
    	
    	//int[] cardList;
    	Cards cardList = new Cards();

		try {
			//Call card business service and populate local cardList
	    	cardList.setCardList(cardService.findAll());

	    	//System.out.println("Mana Cost: "+cardList.getCardList()[3]);
		}catch(Exception e) {
			System.out.println("=============> Exception in loadCardData()!!");
			throw e;
		}
		//place cardList on requestMap to use within the view
		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("cardsList", cardList );
		return "cardData.xhtml"; 
    }
	
	
}
