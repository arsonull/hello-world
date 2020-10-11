package assignment2a;

public class DecimalObserver extends Observer
{
	public DecimalObserver(Subject subject)
	{
		this.subject = subject;
		this.subject.attachObserver(this);
	}
	
	@Override
	public void update()
	{
		System.out.println("Decimal String: " + Integer.toOctalString(subject.getState()));
	}
}