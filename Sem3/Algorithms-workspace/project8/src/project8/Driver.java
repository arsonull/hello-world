package project8;

public class Driver
{
	public static void main(String[] args)
	{
		Map map = new Map();
		map.display();
		map.getNeighbor(3);
		System.out.println("The distance between 0 and 7 is " + map.myGetDistance(0, 7));
	}
}
