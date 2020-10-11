package assignment2a;

import java.util.ArrayList;
import java.util.List;

public class Subject 
{
	private List<Observer> observers = new ArrayList<Observer>();
	private int state;
	
	public int getState()
	{
		return state;
	}
	
	public void setState(int s)
	{
		if (this.state != s)
		{
			this.state = s;
			notifyAllObservers();
		}
	}
	
	public void attachObserver(Observer o)
	{
		observers.add(o);
	}
	
	private void notifyAllObservers()
	{
		for (Observer observer : observers)
		{
			observer.update();
		}
	}
}
