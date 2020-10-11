package beans;

public class Track
{
	String title;
	int number;
	
	public Track(String track, int number)
	{
		this.title = track;
		this.number = number;
	}
	public String getTitle()
	{
		return title;
	}
	public int getNumber()
	{
		return number;
	}
}
