package controllers;

import java.util.List;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;

import org.primefaces.model.chart.Axis;
import org.primefaces.model.chart.AxisType;
import org.primefaces.model.chart.BarChartModel;
import org.primefaces.model.chart.ChartSeries;

import beans.Card;
import business.CardBusinessInterface;

@ManagedBean
@ViewScoped
public class GraphController {
	
    private BarChartModel model;
	//Call card business service
    CardBusinessInterface cardService;
    
    //method used to load all data
    public String loadCardData() {
		try {
			int[] cardList = cardService.findAll();
		}catch(Exception e) {
			System.out.println("=============> Exception in loadCardData()!!");
			throw e;
		}
		
		//FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("album", cardList );
		return "cardData.xhtml"; 
    }
    
    public GraphController() {
        model = new BarChartModel();
        
        ChartSeries boys = new ChartSeries();       
        boys.setLabel("Boys");
        //first variable = mana cost
        //second variable = number of cards
        boys.set("2004", 120);
        boys.set("2005", 100);
        boys.set("2006", 44);
        boys.set("2007", 150);
        boys.set("2008", 25);
        
        model.addSeries(boys);
        
        model.setTitle("Mana Cost Bar Chart");
        model.setLegendPosition("ne");
        
        Axis xAxis = model.getAxis(AxisType.X);
        xAxis.setLabel("Mana Cost");
        
        Axis yAxis = model.getAxis(AxisType.Y);
        yAxis.setLabel("# of Cards");
        
        yAxis.setMin(0);
        yAxis.setMax(200);
    }
    
    public BarChartModel getModel() {
        return model;
    }
    
    
    
    
    /* USE METHOD IF PROFESSOR ALLOWS FOR SENDING STRING TO IoT APPLICATION 
    //Method used to sent POST API method passing deck code to retrieve
    public void requestDeck(String string) {   	
    	//check if deck code already exists in database
    	//if yes
    	//retrieve deck information from database using deck code
    	//else
    	//send deck code to rest service
    	//retrieve information back then send info to business/data service to add to database
    	//Use that same information to populate a deck model 
    	//populate GraphController() with info to fill out the Graph Chart
    	//call new model and view sending deck back as model to populate Tabular Chart as well
    	
    }   */
	
	
}
