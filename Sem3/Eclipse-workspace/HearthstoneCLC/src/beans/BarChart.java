package beans;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

import org.primefaces.model.charts.bar.BarChartModel;

import business.CardService;

@ManagedBean
@SessionScoped
public class BarChart
{
	private BarChartModel barModel;
	
	public BarChart()
	{
		
	}
	public BarChartModel getBarModel()
	{
		CardService service = new CardService();
		
		int[] manaList = service.findAll();
		return null;
	}
}
