package assignment2a;

public class ObserverPatternDemo 
{
	public static void main(String[] args)
	{
		Subject subject = new Subject();
		
		new HexaObserver(subject);
		new BinaryObserver(subject);
		new DecimalObserver(subject);
		System.out.println("First state change: 15");
		subject.setState(15);
		System.out.println("Second change: 10)");
		subject.setState(10);
	}
	
}
