package beans;  

import javax.annotation.PostConstruct;  
import java.io.Serializable;  
import javax.faces.bean.ManagedBean;
import javax.inject.Inject;

import org.primefaces.model.chart.PieChartModel;

import business.CardBusinessInterface;  

@ManagedBean  
public class PieBean implements Serializable {  
private PieChartModel pieModel;  

	@Inject 
	CardBusinessInterface service;
	
	Cards cardList1 = new Cards();

	@PostConstruct  
	public void init() {  
		loadData();
		
		createPieModels();  
	}  
	
	public PieChartModel getPieModel() {  
		return pieModel;  
	}  
	
	private void createPieModels() {  
		createPieModel();  
	}  
	
	private void createPieModel() {  
		pieModel = new PieChartModel();  
		
        for (int i = 0; i < cardList1.getCardList().length; i++) {
        	pieModel.set((i+1)+" Mana", cardList1.getCardList()[i]);
        	//System.out.println("Graph Card Add Test: " + cardList1.getCardList()[i]);
		}
        
		pieModel.setTitle("# of Cards per Mana Cost");
		pieModel.setLegendPosition("c");  
	}  
	
	private void loadData() {
		cardList1.cardList = service.findAll();
	}
	
} 