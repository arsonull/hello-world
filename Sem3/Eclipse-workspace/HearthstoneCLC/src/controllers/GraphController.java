package controllers;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;

import org.primefaces.model.chart.Axis;
import org.primefaces.model.chart.AxisType;
import org.primefaces.model.chart.BarChartModel;
import org.primefaces.model.chart.ChartSeries;

import beans.Cards;
import business.CardBusinessInterface;

@ManagedBean
@ViewScoped
public class GraphController {
	
	//Call card business service
    @Inject
    CardBusinessInterface cardService;
    
    private BarChartModel manaModel;

    
    //method used to load all data
    public String loadCardData() {
    	System.out.println("Entered loadCardData() in GraphController");
    	
    	//int[] cardList;
    	Cards cards = new Cards();

		try {
	    	cards.setCardList(cardService.findAll());
			/*cardList = cardService.findAll();
			System.out.println("Length"+cardList[3]);
			System.out.println("Length"+cardList[4]);
			System.out.println("Length"+cardList[5]); */
	    	System.out.println("Mana Cost: "+cards.getCardList()[3]);
		}catch(Exception e) {
			System.out.println("=============> Exception in loadCardData()!!");
			throw e;
		}
    	createBarModel(cards);

		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("cards", cards );
		return "cardData.xhtml"; 
    }
    
    
    private BarChartModel initBarModel(Cards cardList) {
    	System.out.println("Entered initBarModel() in GraphController");

        BarChartModel model = new BarChartModel();

        ChartSeries manaCost = new ChartSeries();       
        manaCost.setLabel("CardManaCost");
        //first variable = mana cost
        //second variable = number of cards
        for (int cardNum : cardList.getCardList()) {
        	manaCost.set(cardNum+" Mana", cardList.getCardList()[cardNum]);
		}

        model.addSeries(manaCost);
        
        return model;
    }
    
    private void createBarModel(Cards cardList) {
    	System.out.println("Entered careateBarModel() in GraphController");

    	manaModel = initBarModel(cardList);
        
    	manaModel.setTitle("Bar Chart");
    	manaModel.setLegendPosition("ne");
        
        Axis xAxis = manaModel.getAxis(AxisType.X);
        xAxis.setLabel("Mana Cost");
        
        Axis yAxis = manaModel.getAxis(AxisType.Y);
        yAxis.setLabel("# of Cards");
        yAxis.setMin(0);
        yAxis.setMax(200);
    }  
    
    public BarChartModel getModel() {
        return manaModel;
    }
	
	
}
